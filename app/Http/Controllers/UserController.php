<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function profileData()
    {
        return view('profile.profile');
    }

    public function updateProfile(Request $req)
    {
        //dd($req->all());
        $user = Auth()->user();
        $this->validate($req,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$user->id
        ]);
        $user->update($req->all());

        return redirect()->back()->with('success','Profile Updated successfully');
    }

    public function getPassword(){
        return view('profile.password');
    }

    public function postPassword(Request $request){

        $this->validate($request, [
            'newpassword' => 'required|min:8|max:30|confirmed'
        ]);

        $user = auth()->user();

        $user->update([
            'password' => bcrypt($request->newpassword)
        ]);

        return redirect()->back()->with('success', 'Password has been Changed Successfully');
    }
}
