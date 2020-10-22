@extends('layouts.app')


@section('content')

    <div class="container">
        @if(count($errors) > 0)
            @foreach($errors->all() as $err)
             <div class="alert alert-danger">{{$err}}</div>
            @endforeach

        @endif
        <h1>create Post</h1>
        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="content">content</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10">
                    {{old('content')}}
                </textarea>
            </div>

                <div class="form-group">
                    <label for="photo">photo</label>
                    <input type="file" class="form-control-file" name="photo" id="photo">
                </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>





@endsection
