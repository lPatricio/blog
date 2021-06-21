<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PagesController extends Controller
{
    public function home(){

       $posts=Post::published()->paginate(1);

        return view('pages.home',compact('posts'));
    }

    public function about(){

        return view('pages.about');
    }

    public function archive(){

        return view('pages.archive');
    }

    public function contact(){

        return view('pages.contact');
    }
}
