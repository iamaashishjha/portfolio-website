<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Traits\AuthTrait;
use App\Models\Permission;
use App\Models\AppSettings;
use Illuminate\Http\Request;
use App\Traits\Base\BaseAdminController;


class RoleController extends BaseAdminController
{
    use AuthTrait;
    // public $data;


    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['appSetting'] = AppSettings::first();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkCRUDPermission('App\Models\Role', 'list');
        $this->data['roles'] = Role::with('users')->get();
        $this->data['permissions'] = Permission::all();
        return view('ar.role.index', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkCRUDPermission('App\Models\Role', 'create');
        $role = Role::create(['name' => $request->name]);
        $permissions = Permission::findMany(array_keys($request->permissions));
        $role->syncPermissions($permissions);
        return redirect()->back()->with('success', 'Role created successfully');
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
        $this->checkCRUDPermission('App\Models\Role', 'update');
        $role = Role::find($id);
        $permissionIds = array_keys($request->permissions);
        $permissions = Permission::findMany($permissionIds);
        $role->update(['name' => $request->name]);
        $role->syncPermissions($permissions);
        return redirect()->back()->with('success', 'Role Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkCRUDPermission('App\Models\Role', 'delete');
        $role = Role::find($id);
        $role->delete();
        return redirect()->back()->with('success', 'Role deleted successfully');
    }
}
