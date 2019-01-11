<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Post;
class PostsController extends Controller
{
    //
    function index(Post $post){
       $posts=$post->orderBy('updated_at','desc')->get();
       return view('posts')->withPosts($posts);
    }
    //search title the return posts with similar title
    function find(Request $req){
        $posts=Post::where('title',
            'like','%'.$req->search.'%')->get();
        return view('posts')->withPosts($posts);
    }
    //add new post
    function add(Request $request){
        
        //validation goes here
        $rules=[
            'title'=>'required|unique:post',
            'content'=>'required|max:255|min:100',
          ];
        // $messages = [
        //         'title.required'=>'Butangi hin title!',
        //         'content.required'=>'Butangi hin content'
        // ];
        $validator=Validator::make(
            $request->all()
            ,$rules
            // ,$messages
        );
        if($validator->fails()){
            return back()
            ->withErrors($validator)->withInput();
        }
        $post= Post::updateOrCreate($request->all());
        return redirect()->route('posts');
    }

    function new_post(){
        return view('post');
    }

    function edit($id){
        $post=Post::find($id);
        return view('post')->withPost($post);
    }


    function delete($id){
       $post=Post::find($id);
       $post->delete();
       return redirect()->route('posts');
    }
}
