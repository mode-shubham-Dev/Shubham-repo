<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category', 'tags')->paginate(10);
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('dashboard.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $post = Post::create($validated);
        $post->tags()->attach($request->tags ?? []);

        return redirect()->route('posts.index')->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('category', 'tags'); 
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('dashboard.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $validated = $request->validated();

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $post->update($validated);
        $post->tags()->sync($request->tags ?? []);

        return redirect()->route('posts.index')->with('success', 'Post Updated Successfully');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->with(['category', 'tags'])->paginate(10);
        return view('dashboard.posts.trash', compact('posts'));
    }

    public function restore($id)
    {
       $post = Post::withTrashed()->findOrFail($id);
       $post->restore();

       return redirect()->route('posts.trashed')->with('success', 'Post restored successfully.');
    }

    public function forceDelete($id)
    {
       $post = Post::withTrashed()->findOrFail($id);
       $post->forceDelete();

       return redirect()->route('posts.trashed')->with('success', 'Post permanently deleted.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post Deleted Successfully');

    }
}
