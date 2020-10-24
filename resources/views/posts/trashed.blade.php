@extends('layouts.app')


@section('content')

    <section class="show-jobs container ">


        <h2 class="">Posts</h2>
        @if($posts->count() >0)
            @foreach($posts as $post)
                <div class="show-job">
                    <div class="show-job-content">
                        <img class="img-jobs" src="{{URL::asset($post->photo)}}"  alt="...">
                        <h3><a href="{{route('post.show',$post->slug)}}">{{$post->title}}</a></h3>

                    </div>
                    <h4>{{$post->created_at->diffForHumans()}}</h4>
                    <a href="{{route('post.restore',$post->id)}}" class=" btn btn-success">restore</a>
                    <a href="{{route('post.hdelete',$post->id)}}" class=" btn btn-danger">Delete</a>
                </div>

            @endforeach


        @else
            <p>empty trash  🙄 </p>

        @endif



    </section>

@endsection
