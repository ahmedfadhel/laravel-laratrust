<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('manage.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        // dd($roles);
        return view('manage.users.create')->withRoles($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'roles' =>'required'
        ]);
        
        $normalUser = Role::where('name','user')->get()->first();
        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $roles = $request->input('roles');
        if($user->save()){
            if(count($roles)){
                $user->attachRoles($roles);
                
            }else{
                $user->attachRole($normalUser);
            }
            session()->flash('success','User Created Successfully');
        }else{
            session()->flash('error','Unable to Create New User');
        }
       
        return redirect()->route('users.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
        $user = User::findOrfail($id);
        $roles = Role::all();
        return view('manage.users.edit')->withUser($user)->withRoles($roles);
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
        //
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
				]);
				
				$user = User::findorfail($id);
				$user->name = $request->input('name');
                $user->email = $request->input('email');
                $roles = $request->input('roles');
                if($user->save()){
                    if(count($roles)){
                        $user->roles()->sync( $roles);
                    }
                    session()->flash('updated','User Updated Successfully');
                }else{
                    session()->flash('error','Unable to Create New User');
                }

		return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
		
			$user = User::findorfail($id);
			$user->delete();
			return redirect()->route('users.index');
    }
}
