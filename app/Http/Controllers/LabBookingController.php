<?php

namespace App\Http\Controllers;

use App\Models\LabBooking;
use App\Models\labSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class LabBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  // =================================================================
        // #1. DEFINISI PETA & VARIABEL DASAR
        // =================================================================
        $dayMap = [1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 4 => 'Kamis', 5 => 'Jum\'at'];
        // Nama lab harus cocok persis dengan yang ada di kolom `LabName` pada tabel bookings
        $labNames = ['Lab SSI', 'Lab MSI'];
        $daysOfWeek = array_values($dayMap);

        // =================================================================
        // #2. AMBIL DATA MENTAH DARI DATABASE
        // =================================================================

        // Ambil SEMUA KEMUNGKINAN slot jadwal dari tabel master
        $schedules = LabSchedule::all();

        // Ambil booking untuk rentang waktu yang relevan
        $startRange = now()->startOfMonth();
        $endRange = now()->addMonths(2)->endOfMonth();
        $bookings = LabBooking::whereBetween('bookingDate', [$startRange, $endRange])->get();

        // =================================================================
        // #3. PROSES DATA BOOKING
        // =================================================================

        // A. Data untuk JavaScript di Form Booking (`schedule_id-YYYY-MM-DD`)
        $bookedSlotsForJs = $bookings->map(function ($booking) {
            return $booking->schedule_id . '-' . $booking->bookingDate->format('Y-m-d');
        })->toArray();

        // B. Lookup Table untuk membangun Tabel Jadwal Mingguan (`sesi-hari-lab`)
        $bookedSlotsForGrid = [];
        foreach ($bookings as $booking) {
            // Hanya proses booking yang tanggalnya berada di minggu ini
            if ($booking->bookingDate->isSameWeek(now())) {
                $schedule = $booking->schedule; // Ambil relasi schedule
                if ($schedule) {
                    $key = "{$schedule->session}-{$schedule->day_of_week}-{$booking->LabName}";
                    $bookedSlotsForGrid[$key] = true;
                }
            }
        }

        // =================================================================
        // #4. BANGUN GRID JADWAL DENGAN LOGIKA TERBALIK
        // =================================================================
        $sessionDetails = [];
        $scheduleGrid = [];

        // Loop melalui semua kemungkinan jadwal sebagai template
        foreach ($schedules as $schedule) {
            $session = $schedule->session;
            $dayName = $dayMap[$schedule->day_of_week] ?? null;

            if (!$dayName) continue;

            // Untuk setiap slot jadwal, kita perlu mengisi status untuk SETIAP lab
            foreach ($labNames as $labName) {
                // Buat kunci unik untuk slot ini dan lab ini
                $lookupKey = "{$schedule->session}-{$schedule->day_of_week}-{$labName}";

                // Cek apakah slot ini ada di dalam daftar yang sudah di-booking
                $isBooked = isset($bookedSlotsForGrid[$lookupKey]);

                // Tentukan status berdasarkan hasil pengecekan
                $status = $isBooked
                    ? ['title' => 'Digunakan', 'color' => '#ef4444'] // Merah
                    : ['title' => 'Tersedia', 'color' => '#22c55e']; // Hijau

                // Isi grid dengan status yang sudah ditentukan
                $scheduleGrid[$session][$dayName][$labName] = $status;
            }

            // Isi detail sesi (nama dan jam) hanya sekali
            if (!isset($sessionDetails[$session])) {
                $sessionDetails[$session] = [
                    'name' => 'Sesi ' . $session,
                    'time' => Carbon::parse($schedule->start_time)->format('H.i') . '-' . Carbon::parse($schedule->end_time)->format('H.i')
                ];
            }
        }

        ksort($sessionDetails);

        // =================================================================
        // #5. KIRIM SEMUA DATA YANG DIBUTUHKAN KE VIEW
        // =================================================================
        return view('public.lab-booking', [
            'schedules'      => $schedules,
            'bookedSlots'    => $bookedSlotsForJs,
            'sessionDetails' => $sessionDetails,
            'scheduleGrid'   => $scheduleGrid,
            'daysOfWeek'     => $daysOfWeek,
            'labNames'       => $labNames,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return "data masuk";

        // return $request;
        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'phoneNumber'       => 'required|string|max:20',
            'institution'       => 'required|string|max:255',
            'purpose'           => 'required|string|max:255',
            'lab'               => ['required', 'string', Rule::in(['Lab SSI', 'Lab MSI'])], // Memastikan nilainya valid
            'bookingDate'       => 'required|date|after_or_equal:today',
            'session_start'     => 'required|integer',
            'session_end'       => 'required|integer|gte:session_start',
            'requiredEquipment' => 'nullable|string', // Pastikan nama ini cocok dengan form
        ]);

        $labName = $validated['lab'];

        // Ambil detail waktu dari sesi awal dan akhir
        $startSchedule = LabSchedule::find($validated['session_start']);
        $endSchedule = LabSchedule::find($validated['session_end']);

        if (!$startSchedule || !$endSchedule) {
            return redirect()->back()->withErrors(['msg' => 'Sesi yang dipilih tidak valid.']);
        }
        $sessionTimeDescription = Carbon::parse($startSchedule->start_time)->format('H:i') . ' - ' . Carbon::parse($endSchedule->end_time)->format('H:i');

        // Gunakan Transaksi Database untuk keamanan data
        DB::beginTransaction();
        try {
            // Loop dari ID sesi awal hingga ID sesi akhir
            for ($current_schedule_id = $validated['session_start']; $current_schedule_id <= $validated['session_end']; $current_schedule_id++) {

                // Cek konflik jadwal untuk setiap sesi
                $isAlreadyBooked = LabBooking::where('schedule_id', $current_schedule_id)
                    ->where('bookingDate', $validated['bookingDate'])
                    ->where('LabName', $labName) // Pengecekan sekarang menyertakan nama lab
                    ->exists();

                if ($isAlreadyBooked) {
                    DB::rollBack();
                    $conflictingSession = LabSchedule::find($current_schedule_id);
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['msg' => 'Maaf, Sesi ' . $conflictingSession->session . ' di ' . $labName . ' pada tanggal tersebut sudah dipesan.']);
                }

                LabBooking::create([
                    'name'              => $validated['name'],
                    'phoneNumber'       => $validated['phoneNumber'],
                    'institution'       => $validated['institution'],
                    'purpose'           => $validated['purpose'],
                    'bookingDate'       => $validated['bookingDate'],
                    'LabName'           => $labName, 
                    'schedule_id'       => $current_schedule_id,
                    'sessionTime'       => $sessionTimeDescription,
                    'status'            => 'pending',
                    'requiredEquipment' => $validated['requiredEquipment'],
                ]);
            }

            // return "data masuk";
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Untuk debugging, Anda bisa log error: \Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['msg' => 'Terjadi kesalahan sistem saat memproses booking.']);
        }

        return redirect()->back()->with('success', 'Pemesanan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LabBooking $labBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LabBooking $labBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LabBooking $labBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LabBooking $labBooking)
    {
        //
    }
}
