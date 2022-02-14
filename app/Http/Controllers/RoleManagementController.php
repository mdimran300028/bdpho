<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

class RoleManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.role.manage',[
            'roles'=>Role::all(),
            'permissions'=>Permission::all(),
            'permissionGroups'=>Permission::all()->groupBy('group_name')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::whereRaw( 'LOWER(`name`) LIKE ?', [ $request->name ] )->first();
        $permissions = $request->input('permissions');
        if (!isset($role)) {
            $role = new Role();
            $role->name = $request->name;
            $role->save();

            if (!empty($permissions)){
                $role->syncPermissions($permissions);
            }

            return redirect('/admin/roles')->with('success','Role added successfully');
        }else{
            return redirect('/admin/roles')->with('info','Role already exist in the database');
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
        return view('users.role.edit',[
            'role'=>Role::findById($id),
            'permissions'=>Permission::all(),
            'permissionGroups'=>Permission::all()->groupBy('group_name')
        ]);
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
        $role = Role::findById($id);
        $permissions = $request->input('permissions');
        if (!empty($permissions)){
            $role->syncPermissions($permissions);
        }
        return redirect('/admin/roles')->with('success','Role permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $role = Role::find($id);
    }
}
