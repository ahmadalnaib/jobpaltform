@extends('layouts.app')


@section('content')

    <section class="showcase">
        <h1 class="display-4 ">Lorem ipsum dolor sit amet.</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere fugit hic provident.</p>
    </section>

    <section class="show-jobs container ">

        @if($posts->count() > 0)
            @foreach($posts as $post)
                <div class="show-job">

                    <div class="show-job-content">

                            <img class="img-jobs" src="{{URL::asset($post->photo)}}"  alt="...">
{{--                            <img class="img-jobs" src="{{$post->photo}}" class="img-thumbnail"  alt="...">--}}


                          <h3><a href="{{route('post.show',$post->slug)}}">{{$post->title}}</a></h3>
                          <h4>{{$post->user->name}}</h4>


                    </div>

                    <div>
                        <h4>{{$post->created_at->diffForHumans()}}</h4>
                    </div>
                </div>








            @endforeach
        @else

{{--            <p>no posts</p>--}}

        @endif



    </section>




@endsection
