<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public  function  __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=Auth::user();
        $id=Auth::id();


          Profile::create([
              'user_id'=> $id,
              'bio' =>'',
              'website'=> '',
              'number'=>''
          ]);

        return view('users.profile')->with('user',$user);
    }



    public function update(Request $request)
    {
        //

        $request->validate([
            'name' =>'required',
            'bio' =>'required',
            'website'=> 'required',
            'number'=>'required'

        ]);

        $user=Auth::user();
        $user['name']= request('name');
        $user['profile']['bio'] = request('bio');
        $user['profile']['website'] = request('website');
        $user['profile']['number']= request('number');
        $user->save();
        $user->profile->save();

        if($request->has('password'))
        {
            $user->password= Hash::make($request->password);
            $user->save();
        }

        return redirect()->back()->with('msg',' success');;


    }


}
