<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function profileData()
    {
        return view('profile');
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
}
