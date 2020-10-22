@extends('layouts.app')

@section('content')

    <div class="show-page ">

        <small class="text-muted">{{$post->created_at->diffForHumans()}}</small>
    </div>

    <div class="show-all">

        <div class="show-main">
            <img class="img-jobs" src="{{URL::asset($post->photo)}}"  alt="...">
            <p class="lead p-1">{{$post->title}}</p>
        </div>

        <div class="show-about">
            <p class="p-2">{{$post->content}}</p>

        </div>
    </div>


@endsection
