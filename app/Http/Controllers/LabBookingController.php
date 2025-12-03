<?php

namespace App\Http\Controllers;

use App\Models\LabBooking;
use App\Models\LabSchedule;
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
    {
        // Data sederhana untuk dropdown di view
        $labNames = ['Lab SSI', 'Lab MSI'];

        return view('public.lab-booking', [
            'labNames' => $labNames,
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
        // Metode ini tidak lagi digunakan karena form dikirim langsung ke Google Sheets.
        // Dibiarkan kosong atau bisa dihapus jika tidak diperlukan.
        return redirect()->back()->with('success', 'Fitur ini telah dipindahkan ke Google Sheets.');
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
