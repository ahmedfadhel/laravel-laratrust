<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('manage.roles.index')->withRoles($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = Permission::all();
        return view('manage.roles.create')->withPermissions($permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'display_name' => 'required|string|min:4|max:255',
            'name' => 'required|string|min:4|max:255|unique:roles',
            'description' => 'required|string|max:255',
            'permissions' => 'required',
        ]);
        $role = new Role;
        $role->display_name = $request->input('display_name');
        $role->name = $request->input('name');
        $role->description = $request->input('description');
        if($role->save()){
           if(count($request->input('permissions'))){
                $role->syncPermissions($request->input('permissions'));
            }
            session()->flash('success',$request->input('display_name').' Created Successfuly');
            return redirect()->route('roles.index');
        }else {
            session()->flash('error','Unable to Create New Role');
            return redirect()->route('roles.index');
        }
        
        
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

        $role = Role::findorfail($id);
        $permissions = Permission::all();
        return view('manage.roles.edit')->withRole($role)->withPermissions($permissions);
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
        $role = Role::findorfail($id);
        $this->validate($request,[
            'display_name' => 'required|string|min:4|max:255',
            'name' => 'required|string|min:4|max:255|unique:roles,name,'.$role->id,
            'description' => 'required|string|max:255',
            'permissions' => 'required',
        ]);

       
        $role->display_name = $request->input('display_name');
        $role->name = $request->input('name');
        if($role->save()){
            if(count($request->input('permissions'))){
                $role->syncPermissions($request->input('permissions'));
            }
            session()->flash('success','Role Updated Successfuly');
            return redirect()->route('roles.index');
        }else{
            session()->flash('error','Unable to Updated Role');
            return redirect()->route('roles.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $role = Role::findorfail($id);
        if($role->delete()){
            session()->flash('success','Role Deleted Successfully');
           
        }else{
            session()->flash('error','Unable to Delete the Role');
        }
        return redirect()->route('roles.index');
    }
}
