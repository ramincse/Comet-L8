<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = Post::where('trash', false) -> get();
        $published = Post::where('trash', false) -> get() -> count();
        $trash = Post::where('trash', true) -> get() -> count();
        return view('admin.post.index', compact('all_data', 'published', 'trash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_call = Category::all();
        $all_tags = Tag::all();
        return view('admin.post.create', compact('all_call', 'all_tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);
        
        $image_uname = '';
        if( $request->hasFile('image') ){
            $img = $request->file('image');
            $image_uname = md5( time() . rand() ) . '.' . $img -> getClientOriginalExtension();
            $img->move( public_path('media/posts'), $image_uname );
        }

        $gall_images = [];
        if ($request->hasFile('post_gall')) {            
            foreach( $request->file('post_gall') as $post_gall ){
                $post_gall_uname = md5(time() . rand()) . '.' . $post_gall->getClientOriginalExtension();
                $post_gall->move(public_path('media/posts'), $post_gall_uname);
                array_push($gall_images, $post_gall_uname);
            }
        }

        //Video Link Formate
        $file_array = explode('/', $request->post_video);
        if (in_array('www.youtube.com', $file_array)) {
            $video_link = str_replace('watch?v=', 'embed/', $request->post_video);
        } elseif (in_array('vimeo.com', $file_array)) {
            $video_link = str_replace('vimeo.com/', 'player.vimeo.com/video/', $request->post_video);
        }else{
            $video_link = 'Link format not correct';
        }

        $post_featured = [
            'post_type'  => $request->post_type,
            'post_image' => $image_uname,
            'post_gall'  => $gall_images,
            'post_audio' => $request->post_audio,
            'post_video' => $video_link,
        ];

        $post_data = Post::create([
            'user_id'   => Auth::user()->id,
            'title'     => $request->title,
            'slug'      => Str::slug($request->title),
            'featured'  => json_encode($post_featured), 
            //json_encode($array,JSON_UNESCAPED_SLASHES); //JSON.stringfy(json); //json_decode($mystring, JSON_UNESCAPED_SLASHES);

            'content'   => $request->content,
        ]);

        $post_data -> categories() -> attach($request->cat);
        $post_data -> tags() -> attach($request->tag);

        return redirect()->route('post.index')->with('success', 'Post added successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_data = Post::find($id);
        $delete_data->delete();
        return redirect()->route('post.trash')->with('success', 'Post deleted successfull');
    }

    public function postTrashShow()
    {
        $all_data = Post::where('trash', true)->get();
        $published = Post::where('trash', false)->get()->count();
        $trash = Post::where('trash', true)->get()->count();
        return view('admin.post.trash', compact('all_data', 'published', 'trash'));   
    }

    public function postTrashUpdate($id)
    {
        $trash_data = Post::find($id);

        if( $trash_data->trash == false ){
            $trash_data->trash = true;
        }else{
            $trash_data->trash = false;
        }

        $trash_data -> update();
        return redirect()->route('post.index')->with('success', 'Post trashed successfull');
    }

    /**
     * Blog Post Status Update
     */
    public function postStatusUpdate($id)
    {
        $status_update = Post::find($id);

        if( $status_update->status == true){
            $status_update->status = false;
        }else{
            $status_update->status = true;
        }
        $status_update->update();
    }
}
