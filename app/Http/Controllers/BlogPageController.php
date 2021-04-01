<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    public function showBlogPage()
    {
        $all_data = Post::where('status', true)->get();
        return view('comet.blog', compact('all_data'));
    }
}
