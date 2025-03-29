<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Tag;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with(['category', 'tags'])->latest()->get();
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        $news->load(['category', 'tags']);
        return view('news.show', compact('news'));
    }

    public function create()
    {
        $categories = NewsCategory::all();
        $tags = Tag::all();
        return view('news.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'news_category_id' => 'required|exists:news_categories,id',
            'title' => 'required|string|unique:news,title|max:255',
            'content' => 'required|string',
            'cover' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tags' => 'required|array|min:1',
            'tags.*' => 'exists:tags,id',
        ]);

        $coverPath = $request->file('cover')->store('news_covers', 'public');

        $news = News::create([
            'news_category_id' => $validated['news_category_id'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'cover' => $coverPath,
        ]);

        // Simpan relasi tag
        if ($request->has('tags')) {
            $news->tags()->sync($request->tags);
        }

        return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(News $news)
    {
        $categories = NewsCategory::all();
        $tags = Tag::all();
        return view('news.edit', compact('news', 'categories', 'tags'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'news_category_id' => 'required|exists:news_categories,id',
            'title' => 'required|string|max:255|unique:news,title,' . $news->id,
            'content' => 'required|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        // Jika ada file cover baru diupload
        if ($request->hasFile('cover')) {
            if (Storage::disk('public')->exists($news->cover)) {
                Storage::disk('public')->delete($news->cover);
            }

            $news->cover = $request->file('cover')->store('news_covers', 'public');
        }

        $news->update([
            'news_category_id' => $validated['news_category_id'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'cover' => $news->cover,
        ]);

        // Update relasi tag
        $news->tags()->sync($request->tags);

        return redirect()->route('news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news)
    {
        if (Storage::disk('public')->exists($news->cover)) {
            Storage::disk('public')->delete($news->cover);
        }

        $news->tags()->detach(); // Hapus relasi tag dari pivot
        $news->delete();

        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus.');
    }
}
