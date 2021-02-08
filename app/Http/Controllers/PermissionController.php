<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
        $this->middleware('auth');
    }
    public function index()
    {
        $permissions = $this->permission::all();

        return view('permission.index',['permissions'=>$permissions]);
    }

    public function create()
    {
        return view('permission.create');
    }


    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'name'=>'required|unique:permissions|max:255'
        ]);
        $this->permission->create([
            'name'=>$request->name
        ]);

        return redirect('/permissions')->with('success','Permission created succesfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
