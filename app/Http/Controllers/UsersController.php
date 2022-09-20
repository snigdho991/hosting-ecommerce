<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        $user = Auth::user();
        return view('userprofile', compact('user'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('updateprofile', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'first_name'     => 'required|max:255',
            'last_name'  => 'required|max:255',
            'address'     => 'required|max:255',
            'state'     => 'required|max:255',
            'city'  => 'required|max:255',
            'zipcode'  => 'required|max:255',
            'phone'     => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:255',
            'country'  => 'required|max:255',
            // 'email' => 'required|email|max:255|unique:users,id,'.$user->id,

        ]);
    
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->phone = $request->phone;
        $user->country = $request->country;
        // $user->email = $request->email;
    
                 
    
        // if($request->password){
        //     $this->validate($request,[
        //         'password' => 'min:6|confirmed',
        //     ]);
        //     $user->password = bcrypt($request->password);
        // }
        $user->save();
        return redirect()->back()->with("status", "Profile has been updated.");
        // return view('home.profile', array('user' => Auth::user()));
    
    }
}
