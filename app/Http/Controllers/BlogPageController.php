<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    public function showBlogPage()
    {
        $all_data = Post::where('status', true) -> latest() -> paginate(2);
        return view('comet.blog', compact('all_data'));
    }

    /**
     * Blog Post Search
     */
    public function searchBlog(Request $request)
    {
        if( empty($request->search) ){
            $search = '';
        }else{
            $search = $request->search;
        }

        $all_data = Post::where('title', 'LIKE', '%'. $search .'%') -> orWhere('content', 'LIKE', '%' . $search . '%') -> latest() -> paginate(2);
        return view('comet.blog-search', compact('all_data'));
    }

    /**
     * Blog Post Search BY Category
     */
    public function searchBlogByCat($slug)
    {
        $all_data = Category::where('slug', $slug)->first();
        return view('comet.blog-category', [
            'all_data' => $all_data ->posts,
        ]);
    }

    /**
     * Blog Post Search BY Tag
     */
    public function searchBlogByTag($slug)
    {
        $all_data = Tag::where('slug', $slug)->first();
        return view('comet.blog-tag', [
            'all_data' => $all_data->posts,
        ]);
    }
}
