<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {

        $posts=Post::all();
        return view('posts.index',compact('posts'));
    }

  public  function postsTrashed()
  {

      $posts=Post::onlyTrashed()->get();
      return view('posts.trashed',compact('posts'));

  }
    public function create()
    {
        //
        return view('posts.create');
    }


    public function store(Request $request)
    {
        // bring the name from models
        $request->validate([
           'title'=>'required',
            'content'=>'required',
            'photo'=>'required|image'
        ]);
           //save photo on public folder and change the name
        $photo=$request->photo;
        $newPhoto=time().$photo.getClientOrginaName();
        $photo->move('uploads/posts'.$newPhoto);

         $post=Post::create([
            'user_id'=>Auth::id(),
             'title'=>request('title'),
             'content'=>request('content'),
             'photo'=>'uploads/posts'.$newPhoto,
             'slug'=>str_slug($request->title)
         ]);

         return redirect('/');

    }


    public function show($slug)
    {
        //
         $post=Post::where('slug',$slug)->first();
        return view('posts.show',compact('post'));
    }


    public function edit($id)
    {
        //
        $post=Post::findOrFail($id);
        return view('posts.edit',compact('post'));

    }


    public function update(Request $request, $id)
    {
        //
        $post=Post::findOrFail($id);

        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'photo'=>'required|image'
        ]);

        if($request->has('photo')) {
            $photo=$request->photo;
            $newPhoto=time().$photo.getClientOrginaName();
            $photo->move('uploads/posts'.$newPhoto);
           $post->photo='uploads/posts'.$newPhoto;
        }

        $post->title=$request->title;
        $post->content=request('content');
        $post->save();

        return redirect('/');

    }


    public function destroy($id)
    {
        //
        $post=Post::findOrFail($id);
        $post->delete();
        return redirect('/');
    }

    public function hdelete($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->foreceDelete();
         return redirect('/');
    }

    public function restore($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->back();
    }
}
