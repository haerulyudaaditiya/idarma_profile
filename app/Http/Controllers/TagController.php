<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->get();
        return view('news-tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_tag' => 'required|string|unique:tags,name_tag|max:255',
        ]);

        Tag::create([
            'id' => Str::uuid(),
            'name_tag' => $request->name_tag,
        ]);

        return redirect()->route('news-tags.index')->with('success', 'Tag berhasil ditambahkan.');
    }

    public function edit(Tag $tag)
    {
        return view('news-tags.edit', compact('tags'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name_tag' => 'required|string|unique:tags,name_tag,' . $tag->id,
        ]);

        $tag->update([
            'name_tag' => $request->name_tag,
        ]);

        return redirect()->route('news-tags.index')->with('success', 'Tag berhasil diperbarui.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('news-tags.index')->with('success', 'Tag berhasil dihapus.');
    }
}
