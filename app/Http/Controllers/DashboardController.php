<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $totalPosts = Post::count();
    $recentPosts = Post::latest()->take(5)->get();

    return view('dashboard', compact('totalPosts', 'recentPosts'));
}
}
