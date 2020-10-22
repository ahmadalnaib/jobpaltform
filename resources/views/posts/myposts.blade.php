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
                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Del JOB</button>
                        <a class="btn btn-info" href="{{route('post.edit',$post->id)}}">EDIT</a>
                    </form>
                </div>

            @endforeach


        @else
     <p>no jobs create by you 🙄 </p>

     @endif



    </section>

@endsection
