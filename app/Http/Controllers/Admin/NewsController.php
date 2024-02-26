<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10); // Lấy danh sách tin tức phân trang
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'title' => 'required|unique:news|max:100',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create news
        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        
        // Upload image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $news->image = $path;
        }

        $news->save();

        return redirect()->route('news.index')->with('ok', 'News created successfully.');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'title' => 'required|unique:news,title,'.$id.'|max:100',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        // Update news
        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->content = $request->content;

        // Upload image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $news->image = $path;
        }

        $news->save();
        
        return redirect()->route('news.index')->with('ok', 'News updated successfully.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('news.index')->with('ok', 'News deleted successfully');
    }

    public function show($id)
{
    $news = News::all();
    return view('home.nshow', compact('news'));
}
}