<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Dashboard method
    public function dashboard() {
        $totalPosts = Post::count();
        $recentPosts = Post::latest()->take(5)->get();
        
        return view('dashboard', compact('totalPosts', 'recentPosts'));
    }

    public function index() {
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post) {
        return view('show', compact('post'));
    }

    public function edit(Post $post) {
        return view('edit', compact('post'));
    }

    public function update(Request $request, Post $post) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = $post->image;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post) {
        if ($post->image) {
            $imagePath = public_path('images/') . $post->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}