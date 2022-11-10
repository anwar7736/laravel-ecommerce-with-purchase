<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->paginate(5);

        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('user.create'))
        {
            abort(403, 'unauthorized');
        }

        $roles = Role::all();

        return view('backend.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->can('user.create'))
        {
            abort(403, 'unauthorized');
        }

        $data = $request->validate([
            'first_name' => 'required|min:3',
            'last_name' =>  'required|min:3',
            'email' =>  'required|unique:users',
            'username' =>  'required|unique:users',
            'password' =>  'required|min:8|same:confirm_password',
            'role' =>  'required',
        ]);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->confirm_password);
        $user->save();

        $user->assignRole($request->role);

        return back()->with(['user_created' => 'User has been created']);
    }
    

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->can('user.edit'))
        {
            abort(403, 'unauthorized');
        }

        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('backend.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!auth()->user()->can('user.edit'))
        {
            abort(403, 'unauthorized');
        }

        $data = $request->validate([
            'first_name' => 'required|min:3',
            'last_name' =>  'required|min:3',
            'email' =>  'required',
            'username' =>  'required',
            'password' =>  'required|min:8',
            'role' =>  'required',
        ]);

        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->username = $request->username;
        if($user->password !== $request->password)
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
  
        $user->roles()->detach();
        $user->assignRole($request->role);

        return redirect()->route('admin.users.index')->with(['success' => 'User has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->can('user.delete'))
        {
            abort(403, 'unauthorized');
        }

        User::destroy($id);

        return response()->json(['status'=> true, 'msg' => 'User has been deleted']);
    }
}
