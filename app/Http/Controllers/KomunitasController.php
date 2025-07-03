<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komunitas;

class KomunitasController extends Controller
{

    public function index()
    {
        $komunitas = Komunitas::all();
        return $komunitas;
        // return $komunitas;
        return view('layout.navbar', compact('komunitas'));
    }

    public function show(Request $request, $id)
    {
        // $komunitas = Komunitas::where('name', $name)
        //     ->with(['komunitasAnggotas', 'komunitasAgendas'])
        //     ->firstOrFail();

        // return $id;
        $komunitas = Komunitas::where('id', $id)->with(['komunitasAnggotas', 'komunitasAgendas'])->firstOrFail();

        return view('public.komunitas-detail', [
            'komunitas' => $komunitas,
        ]);
    }
}
