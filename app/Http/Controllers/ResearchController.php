<?php

namespace App\Http\Controllers;

use App\Models\Research;
use App\Models\ResearchCategory;
use App\Models\ResearchTopic;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = ResearchCategory::all();
        $topic = ResearchTopic::all();
        // $research = Research::all();
        $research = Research::latest()->paginate(9);
        // return $topic;
        return view('public.research', compact('category', 'topic', 'research'));
    }


    public function filter(Request $request)
    {
        // Mulai query dasar
        $query = Research::query();

        // Filter berdasarkan kategori jika ada yang dipilih
        if ($request->has('categories') && !empty($request->categories)) {
            $query->whereIn('category_id', $request->categories);
        }

        // Filter berdasarkan topik jika ada yang dipilih
        if ($request->has('topics') && !empty($request->topics)) {
            $query->whereIn('topic_id', $request->topics);
        }

        // Ambil hasil yang sudah difilter dengan paginasi
        $research = $query->latest()->paginate(9);

        // Kembalikan view partial yang hanya berisi daftar riset
        // Ini penting agar kita tidak me-render ulang seluruh halaman
        return view('public.partials._research_list', compact('research'))->render();
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
    public function show(Research $research)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Research $research)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Research $research)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Research $research)
    {
        //
    }
}
