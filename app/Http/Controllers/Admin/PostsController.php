<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    public function index(){
        $posts=Post::all();

        return view('admin.posts.index',compact('posts'));

    }

 /*   public function create(){

        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.posts.create',compact('categories','tags'));
    }*/

    public function store(Request $request){
        $this->validate($request,['title'=>'required']);

        $post=Post::create( $request->only('title') );

        return redirect()->route('admin.posts.edit',$post);
    }

    public function edit(Post $post){

        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.posts.edit',compact('categories','tags','post'));

    }
    public function update(Post $post, StorePostRequest $request){

        $post->update($request->all());
        $post->syncTags($request->get('tags'));

        return redirect()
               ->route('admin.posts.edit',$post)
               ->with('flash','La publicacion ha sido guardada.');
    }

    public function destroy(Post $post){

        $post->delete();
        return redirect()
               ->route('admin.posts.index')
               ->with('flash','La publicacion ha sido eliminada.');
    }

  /*  public function validatePost($request)
    {
        return  $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'category'=>'required',
            'excerpt'=>'required',
            'tags'=>'required'
            ]);
    }*/
}
