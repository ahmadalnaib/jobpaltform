@extends('layouts.app')


@section('content')

{{--    <section class="showcase">--}}
{{--        <h1 class="display-4 ">Lorem ipsum dolor sit amet.</h1>--}}
{{--        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere fugit hic provident.</p>--}}
{{--    </section>--}}

<!-- showcase -->
<section class="showcase">
    <div class="container grid">

        <div class="showcase-text">
            <h1>Easier Deoloyment</h1>
            <p>MongoDB is a document database, which means it stores data in JSON-like documents. We believe this is the most natural way to think about data, and is much more expressive and powerful than the traditional row/column model.</p>
            <a href="features.html" class="btn btn-outline">Read More</a>
        </div>

        <div class="showcase-form card">
            <h2>Add Jobs</h2>
            <form action="">
                <div class="form-control">
                    <input type="text" name="name" placeholder="Name" required>
                </div>
                <div class="form-control">
                    <input type="text" name="company" placeholder="Company Name" required>
                </div>
                <div class="form-control">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <input type="submit" value="Send" class="btn btn-primary">
            </form>
        </div>
    </div>
</section>
<!-- endshowcase -->


<section class="stats">
    <div class="container">
        <h3 class="stats-heading text-center my-1">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto ad soluta quae incidunt ratione similique.
        </h3>
        <div class="grid grid-3 text-center my-4">
            <div>
                <i class="fas fa-server fa-3x"></i>
                <h3>10,349,05</h3>
                <p class="text-secondary">Job</p>
            </div>
            <div>
                <i class="fas fa-upload fa-3x"></i>
                <h3>349,05</h3>
                <p class="text-secondary">Published</p>
            </div>
            <div>
                <i class="fas fa-upload fa-3x"></i>
                <h3>1,000,005</h3>
                <p class="text-secondary">Projects</p>
            </div>
        </div>
    </div>

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
                      <div>
                          @foreach($tags as $tag)
                              <span class="bg-dark text-white p-1 m-1">{{$tag->tag}}</span>
                          @endforeach
                      </div>



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
