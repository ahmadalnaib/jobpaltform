@extends('layouts.app')


@section('content')



    <section class=" container ">
        @if(session('message'))
            <div class="alert alert-success pt-3 text-center">{{session('message')}}</div>
        @endif

        @if($tags->count() > 0)

                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Tag</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($tags as $tag)
                    <tr>

                        <td>{{$tag->tag}}</td>

                     <td>
                        <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Del JOB</button>
                            <a class="btn btn-info" href="{{route('tag.edit',$tag->id)}}">EDIT</a>
                        </form>
                     </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>


        @else

   <p>no tags</p>

        @endif



    </section>




@endsection
