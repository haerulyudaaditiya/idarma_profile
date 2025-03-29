<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::latest()->get();
        return view('news-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('news-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_category' => 'required|string|max:255|unique:news_categories,name_category',
        ]);

        NewsCategory::create([
            'id' => Str::uuid(),
            'name_category' => $request->name_category,
        ]);

        return redirect()->route('news-categories.index')->with('success', 'Kategori berita berhasil ditambahkan.');
    }

    public function edit(NewsCategory $newsCategory)
    {
        return view('news-categories.edit', compact('newsCategory'));
    }

    public function update(Request $request, NewsCategory $newsCategory)
    {
        $request->validate([
            'name_category' => 'required|string|max:255|unique:news_categories,name_category,' . $newsCategory->id,
        ]);

        $newsCategory->update([
            'name_category' => $request->name_category,
        ]);

        return redirect()->route('news-categories.index')->with('success', 'Kategori berita berhasil diperbarui.');
    }

    public function destroy(NewsCategory $newsCategory)
    {
        $newsCategory->delete();
        return redirect()->route('news-categories.index')->with('success', 'Kategori berita berhasil dihapus.');
    }
}
