<?php

namespace App\Http\Controllers\User;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::latest()->paginate(10);
        return view('public.kegiatan-lab', compact('kegiatans'));
    }

    public function show(Kegiatan $kegiatan)
    {
        return view('public.kegiatan-detail', compact('kegiatan'));
    }
}
