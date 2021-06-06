<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        //return $category->posts;
        return view('welcome',[
            'category' =>$category,
            'posts' => $category->posts()->paginate(1)
        ] );
    }
}
