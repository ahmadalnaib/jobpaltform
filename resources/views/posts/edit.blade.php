@extends('layouts.app')


@section('content')

    <div class="container">
        @if(count($errors) > 0)
            @foreach($errors->all() as $err)
                <div class="alert alert-danger">{{$err}}</div>
            @endforeach

        @endif
        <h1>edit Post</h1>
        <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            </div>

            <div class="form-group">
                @foreach($tags as $tag)
                    <input type="checkbox"
                           id="title"
                           name="tags[]"
                           value="{{$tag->id}}"
                           @foreach($post->tag as $item)
                             @if($tag->id ==$item->id)
                                 checked
                                 @endif
                               @endforeach
                    >
                    <label for="tag">{{$tag->tag}}</label>
                @endforeach
            </div>
            <div class="form-group">
                <label for="content">content</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10">
                  {{$post->content}}
                </textarea>
            </div>

            <div class="form-group">
                <label for="photo">photo</label>
                <input type="file" class="form-control-file" name="photo" id="photo" value="{{$post->photo}}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>





@endsection
