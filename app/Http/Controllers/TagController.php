<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        //
        $tags=Tag::all();
        return view('tags.index',compact('tags'));
    }


    public function create()
    {

        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag'=>'required',

        ]);

        $tag=Tag::create([
            'tag'=>request('tag'),
        ]);

        return redirect('/tags');
    }


    public function show(Tag $tag)
    {
        //
    }


    public function edit($id)
    {
        $tag=Tag::findOrFail($id);
        return view('tags.edit',compact('tag'));
    }


    public function update(Request $request,  $id)
    {
        $tag=Tag::findOrFail($id);
        $request->validate([
            'tag'=>'required',

        ]);

        $tag->tag=request('tag');
        $tag->save();
        return redirect('/tags');

    }


    public function destroy( $id)
    {
        $tag=Tag::findOrFail($id);
        $tag->delete();
        return redirect('/tags')->with('message','delete tag');
    }
}
