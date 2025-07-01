<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::latest()->paginate(10);
        return view('public.kegiatan-lab', compact('kegiatans'));
    }

    public function show(Kegiatan $kegiatan)
    {
        $kegiatan->increment('views_count');

        $relatedKegiatans = Kegiatan::where('id', '!=', $kegiatan->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $isLikedByUser = in_array($kegiatan->id, Session::get('liked_kegiatan', []));

        $comments = $kegiatan->comments()->latest()->get();

        return view('public.kegiatan-detail', compact('kegiatan', 'relatedKegiatans', 'isLikedByUser', 'comments'));
    }

    public function toggleLike(Request $request, Kegiatan $kegiatan)
    {
        $likedKegiatanIds = Session::get('liked_kegiatan', []);
        $message = '';
        $likedStatus = false;

        if (in_array($kegiatan->id, $likedKegiatanIds)) {
            $kegiatan->decrement('likes_count');
            $likedKegiatanIds = array_diff($likedKegiatanIds, [$kegiatan->id]);
            $likedStatus = false;
            $message = 'unliked';
        } else {
            $kegiatan->increment('likes_count');
            $likedKegiatanIds[] = $kegiatan->id;
            $likedStatus = true;
            $message = 'liked';
        }

        Session::put('liked_kegiatan', array_values($likedKegiatanIds));

        if ($kegiatan->likes_count < 0) {
            $kegiatan->likes_count = 0;
            $kegiatan->save();
        }

        $likesCount = $kegiatan->likes_count;

        return response()->json([
            'message' => 'Kegiatan ' . $message . ' successfully.',
            'status' => 'success',
            'likes_count' => $likesCount,
            'liked' => $likedStatus
        ]);
    }
}