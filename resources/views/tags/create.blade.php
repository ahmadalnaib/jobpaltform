@extends('layouts.app')


@section('content')

    <div class="container">
        @if(count($errors) > 0)
            @foreach($errors->all() as $err)
             <div class="alert alert-danger">{{$err}}</div>
            @endforeach

        @endif
        <h1>create tag</h1>
        <form action="{{route('tag.store')}}" method="POST" >
            @csrf
            <div class="form-group">
                <label for="tag">Tag</label>
                <input type="text" class="form-control" id="tag" name="tag" >
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>





@endsection


