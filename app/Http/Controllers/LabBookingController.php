<?php

namespace App\Http\Controllers;

use App\Models\LabBooking;
use App\Models\labSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LabBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $schedules = labSchedule::all();

        // 1. Definisikan pemetaan hari dari angka ke nama
        $dayMap = [
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jum\'at',
        ];

        // Buat daftar hari untuk header kolom
        $daysOfWeek = array_values($dayMap);

        // 2. Siapkan array kosong untuk diproses
        $sessionDetails = [];
        $scheduleGrid = [];

        // 3. Proses data mentah menjadi format yang siap ditampilkan
        foreach ($schedules as $schedule) {
            $session = $schedule->session;
            // Dapatkan nama hari dari mapping, jika tidak ada, lewati
            if (!isset($dayMap[$schedule->day_of_week])) {
                continue;
            }
            $dayName = $dayMap[$schedule->day_of_week];

            // Isi grid dengan data status dan warna
            $scheduleGrid[$session][$dayName] = [
                'title' => $schedule->title,
                'color' => $schedule->color,
            ];

            // Isi detail sesi (nama dan jam), hanya jika belum ada.
            // Ini untuk menghindari duplikasi data di setiap perulangan.
            if (!isset($sessionDetails[$session])) {
                $sessionDetails[$session] = [
                    'name' => 'Sesi ' . $session,
                    // Format waktu menjadi HH.MM
                    'time' => Carbon::parse($schedule->start_time)->format('H.i') . '-' . Carbon::parse($schedule->end_time)->format('H.i')
                ];
            }
        }

        // 4. Urutkan detail sesi berdasarkan kuncinya (nomor sesi)
        ksort($sessionDetails);

        $startmonth = Carbon::now()->startOfMonth();
        $endmonth = Carbon::now()->endOfMonth();
        $bookings = LabBooking::whereBetween('bookingDate', [$startmonth, $endmonth])
            ->with('schedule')
            ->get();

        $bookedSlots = $bookings->map(function ($booking) {
            return $booking->schedule_id . '-' . $booking->bookingDate->format('Y-m-d');
        })->toArray();

        // dd($bookedSlots);
        return view('public.lab-booking', compact('schedules', 'bookedSlots', 'sessionDetails', 'scheduleGrid', 'daysOfWeek'));
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
        //
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
