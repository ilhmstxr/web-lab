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
        $research = Research::all();
        return $topic;
        return view('public.research', compact('category', 'topic', 'research'));
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
