<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $tags=Tag::latest()->get();
        $posts=Post::latest()->get();
        return view('posts.index',compact('posts'),compact('tags'));
    }

  public  function postsTrashed()
  {

      $posts=Post::onlyTrashed()->where('user_id',Auth::id())->get();
      return view('posts.trashed',compact('posts'));

  }
    public function create()
    {
        //
        $tags=Tag::all();
        if($tags->count()==0)
        {
           return redirect()->route('tag.create');
        }
        return view('posts.create',compact('tags'));
    }


    public function store(Request $request)
    {
        // bring the name from models
        $request->validate([
           'title'=>'required',
            'content'=>'required',
            'tags'=>'required',
            'photo'=>'required|image'
        ]);
           //save photo on public folder and change the name
        $photo=$request->photo;
        $newPhoto=time().$photo->getClientOriginalName();
        $photo->move('uploads/posts',$newPhoto);

         $post=Post::create([
            'user_id'=>Auth::id(),
             'title'=>request('title'),
             'content'=>request('content'),
             'photo'=>'uploads/posts/'.$newPhoto,
             'slug'=>str_slug($request->title)
         ]);

         $post->tag()->attach($request->tags);

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
        $tags=Tag::all();$posts = auth()->user()->posts()->latest()->get();
       //$post=Post::findOrFail($id);
        $post=Post::where('id',$id)->where('user_id',Auth::id())->first();
        if($post === null)
        {
            return  redirect()->back();
        }
        return view('posts.edit',compact('post'),compact('tags'));

    }


    public function update(Request $request, $id)
    {
        //
        $post=Post::findOrFail($id);

        $request->validate([
            'title'=>'required',
            'content'=>'required',
//            'photo'=>'required|image' not required for edit
        ]);

        if($request->has('photo')) {
            $photo=$request->photo;
            $newPhoto=time().$photo->getClientOriginalName();
            $photo->move('uploads/posts',$newPhoto);
           $post->photo='uploads/posts/'.$newPhoto;
        }

        $post->title=$request->title;
        $post->content=request('content');
        $post->save();
        $post->tag()->sync($request->tags);
        return redirect('/');

    }


    public function destroy($id)
    {
        //
//        $post=Post::findOrFail($id);
        $post=Post::where('id',$id)->where('user_id',Auth::id())->first();
        if($post === null)
        {
            return  redirect()->back();
        }
        $post->delete();
        return redirect()->back();
    }

    public function hdelete($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
         return redirect('/');
    }

    public function restore($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->back();
    }


    public function myPosts()
    {
        $posts = auth()->user()->posts()->latest()->get();
        // $jobs = Job::where('user_id', Auth::user()->id)->latest()->simplePaginate(8);
        return view('posts.myposts',compact('posts'));
    }
}
