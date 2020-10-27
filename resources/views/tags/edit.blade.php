@extends('layouts.app')


@section('content')

    <div class="container">
        @if(count($errors) > 0)
            @foreach($errors->all() as $err)
                <div class="alert alert-danger">{{$err}}</div>
            @endforeach

        @endif
        <h1>edit tag</h1>
        <form action="{{route('tag.update',$tag->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="tag">Tag</label>
                <input type="text" class="form-control" id="tag" name="tag" value="{{$tag->tag}}">
            </div>



            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>





@endsection
