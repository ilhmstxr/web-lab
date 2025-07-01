<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Comment;

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
        $isLikedByUser = $kegiatan->is_liked_by_user;

        $comments = $kegiatan->comments()->latest()->get();


        return view('public.kegiatan-detail', compact('kegiatan', 'relatedKegiatans', 'isLikedByUser', 'comments'));
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleLike(Request $request, Kegiatan $kegiatan)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $like = $kegiatan->likes()->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
            $message = 'unliked';
        } else {
            $kegiatan->likes()->create([
                'user_id' => $user->id,
            ]);
            $message = 'liked';
        }

        $likesCount = $kegiatan->likes()->count();

        return response()->json([
            'message' => 'Kegiatan ' . $message . ' successfully.',
            'status' => $message,
            'likes_count' => $likesCount
        ]);
    }
}