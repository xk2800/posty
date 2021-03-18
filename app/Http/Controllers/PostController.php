<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function __construct(){

        $this->middleware(['auth'])->only(['store', 'destroy']); //set middleware but only for store & destroy method
    }

    public function index(){

        //$posts = Post::get(); //return all post in natural db order //laravel collection
        //$posts = Post::paginate(20);
        //$posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20);
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post){
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request){
        //dd('ok');
        $this->validate($request,[
            'body' => 'required'
        ]);

        //used at 1st
        /*Post::create([
            'user_id' => auth()->id(),
            'body' => $request->body
        ]);*/
        //2nd
        //auth()->user()->posts()->create();

        //METHOD 1
        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        //METHOD 2
        //$request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function destroy(Post $post){

        $this->authorize('delete', $post);
        $post->delete();

        return back();
    }
}
