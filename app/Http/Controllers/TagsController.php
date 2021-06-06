<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {

        return $tag->posts;
        return view('welcome',[
            'tag' =>$tag,
            'posts' => $tag->posts()->paginate(1)
        ] );
    }
}
