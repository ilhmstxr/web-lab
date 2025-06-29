<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::latest()->paginate(10);
        return view('admin.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'tempat' => 'nullable|string|max:255',
            'poster' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        Kegiatan::create($validated);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'tempat' => 'nullable|string|max:255',
            'poster' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            if ($kegiatan->poster) {
                Storage::disk('public')->delete($kegiatan->poster);
            }
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $kegiatan->update($validated);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        if ($kegiatan->poster) {
            Storage::disk('public')->delete($kegiatan->poster);
        }

        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }

    public function show(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.show', compact('kegiatan'));
    }
}
