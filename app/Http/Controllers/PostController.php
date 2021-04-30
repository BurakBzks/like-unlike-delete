<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function pos()
    {

        $posts=Post::with(['user','likes'])->paginate(3);
        return view('pages.post',compact('posts'));
    }
    public function show(Post $post)
    {
        return view('show',[
            'post' => $post
        ]);
    }

    public function post(Request $request)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);
        $request->user()->posts()->create($request->only('body'));

        return back();
    }
    public function del(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return back();

    }
}
