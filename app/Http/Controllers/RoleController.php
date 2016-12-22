<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return IlluminateHttpResponse
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @return IlluminateHttpResponse
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request,[
            'name'=> 'required',
            'fullname' => 'required',
        ]);

        // create new data
        $role = new Role;
        $role->name = $request->name;
        $role->fullname = $request->fullname;
        $role->save();

        $role->permissions()->attach($request->permissions);

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function show($id)
    {
        $role = Role::with('permissions')->findOrFail($id);

        return view('role.view', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            foreach ($role->permissions as $rolepermission) {
                if($permission->id == $rolepermission->id){
                    $permission->status = 'checked';
                }
            }
        }

        return view('role.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function update(Request $request, $id)
    {
        // validation
        $this->validate($request,[
            'name'=> 'required',
            'fullname' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->fullname = $request->fullname;
        $role->save();

        $role->permissions()->detach();
        $role->permissions()->attach($request->permissions);

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function destroy($id)
    {

        $role = Role::findOrFail($id);
        $role->delete();
        return redirect(route('roles.index'));
    }
}
