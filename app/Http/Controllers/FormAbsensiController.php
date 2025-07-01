<?php

namespace App\Http\Controllers;

use App\Models\FormAbsensi;
use Illuminate\Http\Request;

class FormAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('public.form-absensi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|max:50',
            'nama' => 'required|string|max:100',
            'status' => 'required|string|max:20',
            'entry_date' => 'required|date',
            'laboratorium' => 'required|string|max:100',
            'tujuan' => 'required|string|max:255',
        ]);

        // Simpan ke database
        FormAbsensi::create($validated);

        // Redirect dengan flash message
        return redirect()->route('Absensi.index')->with('success', 'Data absensi berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormAbsensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormAbsensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormAbsensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormAbsensi $absensi)
    {
        //
    }
}
