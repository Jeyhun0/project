<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'nullable',
            'img' => 'required|url',
            'author' => 'required',
            'category_id' => 'required|exists:categories,id',
            'created_at' => 'required|date|date_format:Y-m-d H:i:s',
        ]);

//        Post::create($request->all());

//        $post = new Post();
//        $post->title = $request->title;
//        $post->text = $request->text;
//        $post->img = $request->img;
//        $post->author = $request->author;
//        $post->category_id = $request->category_id;
//        $post->created_at = $request->created_at;
//
//        $post->save();
//
//        return redirect()->route('admin.posts.create')->with('success', 'Post added successfully!');

    }
    public function creat(Request $request)
    {
        $post = new Post;
        $post->author = $request->input('author');
        $post->img = $request->input('img');
        $post->text = $request->input('text');
        $post->category_id = $request->input('category_id');


        $post->save();

        return view('admin.post.postadd');
}

    public function add()
    {
        $datalist = Post::all();
        //print_r($datalist);
        //exit();
        return view('admin.post.postadd', ['datalist' => $datalist]);


    }
    public function destroy($id)
    {
        $post = Post::find($id)->delete();





        return redirect()->route('admin.posts');
    }
}
