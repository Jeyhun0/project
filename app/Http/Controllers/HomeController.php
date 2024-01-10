<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::query()->get()->all();
        $posts = Post::query()->get()->all();
        return view('front.pages.index', compact('posts', 'categories'));
    }



    public function select($category_name)
    {
        $categories = Category::query()->get()->all();
        $category = Category::query()->where('name', $category_name)->first();
        $posts = $category->posts;
        $posts = Post::query()->where('id', $category->id)->get();
        return view('front.pages.index  ', compact('posts', 'categories'));

    }


    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }



}

