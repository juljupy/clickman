<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
use Auth;

class UserController extends Controller
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
        $this->authorize('list_user');

        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return IlluminateHttpResponse
     */
    public function create()
    {
        $this->authorize('create_user');

        $roles = Role::all();

        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @return IlluminateHttpResponse
     */
    public function store(Request $request)
    {
        $this->authorize('create_user');
        // validation
        $this->validate($request,[
            'name'=> 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required'
        ]);

        // create new data
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phonenumber = $request->phonenumber;
        $user->password = bcrypt($request->password);
        $user->verified = $request->verified;
        $user->save();

        $user->roles()->attach($request->roles);

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function show($id)
    {
        $this->authorize('view_user');

        $user = User::with('roles')->findOrFail($id);

        return view('user.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function edit($id)
    {
        $this->authorize('edit_user');

        $user = User::with('roles')->findOrFail($id);

        $roles = Role::all();

        foreach ($roles as $role) {
            foreach ($user->roles as $userrole) {
                if($role->id == $userrole->id){
                    $role->status = 'checked';
                }
            }
        }

        return view('user.edit', compact('user','roles'));
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
        $this->authorize('edit_user');

        // validation
        $this->validate($request,[
            'name'=> 'required',
            'email' => 'required|email|max:255|unique:users'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phonenumber = $request->phonenumber;

        if($request->password != ''){
            $user->password = bcrypt($request->password);
        }

        $user->save();

        $user->roles()->detach();
        $user->roles()->attach($request->roles);

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function destroy($id)
    {
        $this->authorize('delete_user');

        $user = User::findOrFail($id);
        $user->delete();
        return redirect(route('users.index'));
    }
}
