<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryAdd extends Controller
{
    public function add()
    {
        $datalist = Category::all();
        //print_r($datalist);
        //exit();
        return view('admin.products.categoryadd', ['datalist' => $datalist]);
    }

    public function create(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return view('admin.products.categoryadd');


    }

    public function destroy($id)
    {
        $category = Category::find($id)->delete();





         return redirect()->route('admin.products');
        }


}
