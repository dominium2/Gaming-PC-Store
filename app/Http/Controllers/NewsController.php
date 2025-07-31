<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display the news page.
     */
    public function index()
    {
        $news = News::orderBy('post_date', 'desc')->get(); // Fetch all news posts, latest first
        return view('news.news', compact('news')); // Update to 'news.news'
    }

    /**
     * Display the form to create a news post.
     */
    public function create()
    {
        return view('news.create-news'); // Update to 'news.create-news'
    }

    /**
     * Store a new news post in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        $picture = $request->file('picture') ? file_get_contents($request->file('picture')->getRealPath()) : null;

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'picture' => $picture,
            'post_date' => now(),
        ]);

        return redirect()->route('news.manage')->with('status', 'News post created successfully.');
    }

    /**
     * Display the form to edit a news post.
     */
    public function edit(News $news)
    {
        return view('news.edit-news', compact('news')); // Pass the news post to the view
    }

    /**
     * Update an existing news post in the database.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        if ($request->hasFile('picture')) {
            $news->picture = file_get_contents($request->file('picture')->getRealPath());
        }

        $news->title = $request->title;
        $news->content = $request->content;
        $news->save();

        return redirect()->route('admin.dashboard')->with('status', 'News post updated successfully.');
    }

    /**
     * Delete a news post from the database.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.dashboard')->with('status', 'News post deleted successfully.');
    }

    /**
     * Display the manage news page.
     */
    public function manage()
    {
        $news = News::all(); // Fetch all news posts
        return view('news.manage-news', compact('news'));
    }
}
