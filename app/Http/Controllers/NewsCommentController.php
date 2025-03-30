<?php

namespace App\Http\Controllers;

use App\Models\NewsComment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsCommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'news_id' => 'required|exists:news,id',
            'name' => 'required|string|max:255',
            'comment' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:news_comments,id',
        ]);

        if ($request->filled('parent_id')) {
            $parent = NewsComment::find($request->parent_id);

            if ($parent && $parent->parent_id !== null) {
                // Balasan terhadap balasan (3 tingkat) tidak diperbolehkan
                return back()->withErrors('Balasan hanya diperbolehkan 1 tingkat.');
            }
        }

        NewsComment::create([
            'id' => Str::uuid(),
            'news_id' => $request->news_id,
            'name' => $request->name,
            'comment' => $request->comment,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim.');
    }

    public function destroy(NewsComment $newsComment)
    {
        // Hapus juga reply-nya (jika ada)
        foreach ($newsComment->replies as $reply) {
            $reply->delete();
        }

        $newsComment->delete();

        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }
}
