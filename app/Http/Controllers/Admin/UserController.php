<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Mailers\AppMailer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        $this->setPageTitle('Users', 'List of all Users');
        return view('admin.users.index', compact('users'));
    }
    public function show($id)
    {
        $users = User::where('id', $id)->firstOrFail();
        $this->setPageTitle('User Details', $users->getFullNameAttribute());
        return view('admin.users.show', compact('users'));
    }
    public function create()
    {
        $users = User::orderBy('id', 'desc')->get();
    
        $this->setPageTitle('Users', 'Create User or Admin');
        return view('admin.users.create', compact('users'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'account_type'  => 'required',
        ]);
        
        if($request->account_type == "User"){
            $this->validate($request, [
                'first_name'     => 'required|max:255',
                'last_name'  => 'required|max:255',
                // 'address'     => 'required|max:255',
                // 'state'     => 'required|max:255',
                // 'city'    => 'required|max:255',
                // 'zipcode'  => 'required|max:255',
                // 'phone'     => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:255',
                // 'country'  => 'required|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'min:6|required|same:confirm-password',
                'theme'  => 'required',
            ]);
            
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            return $this->responseRedirect('admin.users.index', 'User added successfully' ,'success',false, false);
            
        } else {
            $this->validate($request, [
                'first_name' => 'required|max:255',
                'last_name'  => 'required|max:255',
                'email'      => 'required|email|unique:admins,email',
                'password'   => 'min:6|required|same:confirm-password',
            ]);
            
            $password = Hash::make($request->password);
            
            $profile = Admin::create([
                'name'     => $request->first_name . $request->last_name,
                'email'    => $request->email,
                'password' => $password,
                'role'     => $request->account_type,
            ]);

            
            return $this->responseRedirect('admin.admins.index', 'Admin added successfully' ,'success',false, false);
        }
    }
    
    public function mail($id)
    {
        $user = User::find($id);
        $this->setPageTitle('Mail User', $user->getFullNameAttribute());
        return view('admin.users.mail',compact('user'));
    }
    public function SubmitMail($id, Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'message'   => 'required',
            'subject'   => 'required|max:255',
        ]);
        $users = User::where('id', $id)->firstOrFail();
        $mailUser = $users;
        $subject = $request->input('subject');
        $bodyMessage = $request->input('message');
        $mailer->sendmailToUser($mailUser, $subject, $bodyMessage);
        return $this->responseRedirect('admin.users.index', 'Mail sent successfully' ,'success',false, false);
    }
    public function edit($id)
    {
        $user = User::find($id);
        $this->setPageTitle('Users', 'Edit User');
        return view('admin.users.edit',compact('user'));
    }
    
    public function edit_admin($id)
    {
        $admin = Admin::find($id);
        $this->setPageTitle('Admins', 'Edit Admin');
        return view('admin.admins.edit',compact('admin'));
    }
    
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'account_type'  => 'required',
        ]);
        
        if($request->account_type == "User")
        {
            $user = User::where('id', $id)->firstOrFail();
            $this->validate($request, [
                'first_name'     => 'required|max:255',
                'last_name'  => 'required|max:255',
                'email' => 'required|email|max:255',
                'phone'     => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:255',
                'theme' => 'required',
            ]);
        
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->state = $request->state;
            $user->city = $request->city;
            $user->zipcode = $request->zipcode;
            $user->phone = $request->phone;
            $user->country = $request->country;
            $user->theme = $request->theme;
            $user->more_info = $request->more_info;
            
            $user->save();
            return $this->responseRedirect('admin.users.index', 'User updated successfully' ,'success',false, false);
        } else {
            
            $this->validate($request, [
                'first_name' => 'required|max:255',
                'last_name'  => 'required|max:255',
                'email'      => 'required|email',
            ]);
            
            $password = Hash::make('default123');
            
            
            $admin = new Admin;
            $admin->name = $request->first_name . ' ' . $request->last_name;
            $admin->email = $request->email;
            $admin->password = $password;
            $admin->role = $request->account_type;
            $admin->save();
            
            $userDlt = User::find($id)->delete();
            
            return $this->responseRedirect('admin.admins.index', 'User has been moved to admin panel! Password is:default123' ,'success',false, false);
        }
    }
    
    public function update_admin($id, Request $request)
    {
        $this->validate($request, [
            'account_type'  => 'required',
        ]);
        
        if($request->account_type == "User")
        {
            $this->validate($request, [
                'name'  => 'required|max:255',
                'email' => 'required|email',
                'theme' => 'required',
            ]);
            
            $password = Hash::make('userabc');
            
            $user = new User;
            $user->first_name = $request->name;
            $user->last_name = '';
            $user->email = $request->email;
            $user->address = $request->address;
            $user->state = $request->state;
            $user->city = $request->city;
            $user->zipcode = $request->zipcode;
            $user->phone = $request->phone;
            $user->country = $request->country;
            $user->theme = $request->theme;
            $user->more_info = $request->more_info;
            
            
            $adminDlt = Admin::find($id)->delete();
            
            return $this->responseRedirect('admin.users.index', 'Admin has been moved to user panel! Password is:userabc','success', false, false);
            
        } else {
            
            $this->validate($request, [
                'name' => 'required|max:255',
                'email'      => 'required|email',
            ]);
            
            $admin = Admin::find($id);
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->role = $request->account_type;
            $admin->save();
            
            return $this->responseRedirect('admin.admins.index', 'Admin updated successfully.' ,'success',false, false);
        }
    }
    
    public function updateStatus(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }
    
    public function delete($id)
    {
        User::find($id)->delete();
        return $this->responseRedirectBack('User deleted successfully.', 'success');

    }
    
    public function delete_admin($id)
    {
        Admin::find($id)->delete();
        return $this->responseRedirectBack('Admin deleted successfully.', 'success');

    }
    
    // ADMIN PANEL
    public function admins()
    {
        $admins = Admin::orderBy('id', 'desc')->paginate(10);
        $this->setPageTitle('Admin Panel', 'List of all Admins');
        return view('admin.admins.index', compact('admins'));
    }
}
