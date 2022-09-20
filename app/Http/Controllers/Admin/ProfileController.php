<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class ProfileController extends BaseController
{
    public function index()
    {
        $user = Admin::firstOrFail();
        $this->setPageTitle('Admin', 'Admin Profile Info');
        return view('admin.profile.index', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Admin::firstOrFail();
        $this->validate($request, [
            'name'     => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins,id,'.$user->id,
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
        // if($request->password){
        //     $this->validate($request,[
        //         'password' => 'min:6|confirmed',
        //     ]);
        //     $user->password = bcrypt($request->password);
        // }
        // dd($user);
        $user->save();
        return $this->responseRedirectBack('Profile updated successfully.', 'success');
    }
}
