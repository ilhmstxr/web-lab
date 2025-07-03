<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use App\Models\Page;
use App\Models\Sop; // Import model Sop
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komunitas = Komunitas::all();
        return view('public.index', compact('komunitas'));
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
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        //
    }

    /**
     * Menampilkan halaman panduan.
     */
    public function panduan()
    {
        return view('public.panduan');
    }

    /**
     * Menampilkan halaman Standar Operasional Prosedur (SOP) Laboratorium.
     */
    public function sop(Request $request)
    {
        $query = Sop::query();

        // Ambil parameter 'lab' dari URL
        $labType = $request->query('lab');

        // Jika parameter 'lab' ada, filter SOP berdasarkan jenis lab
        if ($labType) {
            $query->where('lab_type', $labType);
        }

        $sops = $query->get();

        // Teruskan data SOP dan jenis lab yang aktif ke view
        return view('public.sop-lab', compact('sops'));
    }
}