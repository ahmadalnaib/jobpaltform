@extends('layouts.app')



@section('content')
    <div class="container">
    @if($messgae=Session::get('msg'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{$messgae}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(count($errors) >0)

       @foreach($errors->all() as $err)
           <div class="alert alert-danger">
             {{$err}}
           </div>

       @endforeach

        @endif

         <form method="post" action="{{route('profile.update')}}">
             @csrf
             @method('PUT')
             <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
             </div>
             <div class="form-group">
                 <label for="password">Password</label>
                 <input type="password" class="form-control" id="password" name="password" >
             </div>
             <div class="form-group">
                 <label for="confirmpassword">Confirm Password</label>
                 <input type="password" class="form-control" id="confirmpassword" name="c_password">
             </div>



             <div class="form-group">
                 <label for="bio">Bio</label>
                 <textarea name="bio" class="form-control" id="bio" cols="30" rows="10">
                     {!! $user->profile->bio !!}
                 </textarea>
             </div>
             <div class="form-group">
                 <label for="website">Website</label>
                 <input type="text" class="form-control" id="website" name="website" value="{{$user->profile->website}}">
             </div>
             <div class="form-group">
                 <label for="number">Phone Number</label>
                 <input type="number" class="form-control" id="number" name="number" value="{{$user->profile->number}}">
             </div>
             <button type="submit" class="btn btn-primary">Save</button>
         </form>
     </div>


@endsection
