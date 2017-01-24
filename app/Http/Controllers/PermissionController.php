<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use App\User;
use DB;
use Auth; 
class PermissionController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
 }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roleDisplay(){

     return view('auth.role');
 }

 public function role(Request $request){
        // dd($request->all());
    $role= new Role;
    $role->name=$request->username;
    $role->save();
    $request->session()->flash('alert-success', 'data has been successfully added!');
    return redirect()->back();
}

public function permissionDisplay(){
    return view("auth.permission");
}

public function permission(Request $request){
    $permission= new Permission;
    $permission->name=$request->name;
    $permission->display_name=$request->display_name;
    $permission->save();
    $request->session()->flash('alert-success', 'data has been successfully added!');
    return redirect()->back();
}

public function user_role_display(){
        // $users = DB::table('users')->select('id','username')->get();

    $roles = DB::table('roles')->select('id','name')->get();
        // $users = User::all();

    $query_users = "
    SELECT 
    users.id AS user_id,
    users.name,
    roles.id AS role_id,
    roles.name AS role_name 
    FROM users 
    LEFT JOIN 
    role_user 
    ON users.id = role_user.user_id
    LEFT JOIN roles
    ON 
    role_user.role_id = roles.id
    ";
    $users = DB::select($query_users);
        // dd($user);
    return view('auth.user_role')->with('users',$users)->with('roles', $roles);
}

public function submit_user_role($id){
        // dd($id);
    $user = DB::table('users')->select('id','name','email')->where('id',$id)->first();
    $all_roles = DB::table('roles')->select('id','name')->get();
        // dd($user);
    $query_roles="
    SELECT 
    roles.id AS role_id,
    roles.name AS role_name
    FROM roles
    JOIN role_user
    ON role_user.user_id=".$id."
    AND role_user.role_id=roles.id
    ";
    $roles=DB::select($query_roles);
        // dd($all_roles);
    if(sizeof($roles)==0){
        return view('auth.user_role_create')->with('user',$user)->with('all_roles',$all_roles);
    }else{
        return view('auth.user_role_create')->with('user',$user)->with('all_roles',$all_roles)->with('roles',$roles[0]);
    }
}   

public function add_user_role(Request $request){
        // dd($request->all()); 
        //fetching the user
    $user = User::where('id', $request->user_id)->first();
        // dd($user);
    $query_role_id="
    DELETE 
    FROM role_user
    WHERE user_id=".$request->user_id;
    $role_id=DB::select($query_role_id); 
        // $admin = Role::where('id', '=', $request->role); //works
        // dd($admin);
            // $user->attachRole($request->role);  
    $role = Role::where('id',$request->role)->get()->first();
        // dd($role);
    $user->attachRole($role);  
        // $user->roles()->attach($request->role);     
        // $request->session()->flash('alert-success', 'role has been successfully added!');
        // return redirect()->back();
        // DB::select("INSERT INTO role_user ()");
    return redirect()->action('PermissionController@user_role_display');
}

public function role_permission_display(){
        //role vs permission
    $query_permission="
    SELECT
    permissions.id,
    permissions.display_name,
    permission_role.permission_id,
    permission_role.role_id
    FROM permissions
    LEFT JOIN permission_role
    on permission_role.permission_id=permissions.id
    ";
        //all permissions
    $all_permission = Permission::all();
        //role permissions
    $permission=DB::select($query_permission);
        // dd($permission);
        // all roles
    $all_roles = Role::all();
        // $all_roles = DB::table('roles')->select('id','name')->get();
    return view('auth.role_permission')
    ->with('permissions',$permission)
    ->with('roles',$all_roles)
    ->with('all_permission', $all_permission);

}

public function submit_role_permission(Request $request){ 
    // dd($request->all());
    
    DB::table('permission_role')->truncate();
    if (isset($request->permission)) {
        # code...
        $permissions=$request->permission;
        foreach ($permissions as $permission ) {
            $temp=explode("_", $permission);
            $role_id=$temp[1];
            $permission_id=$temp[0]; 
            $role_query = Role::where('id', '=', $role_id)->first(); 
            $permission_query=Permission::where('id','=',$permission_id)->first();
            $role_query->attachPermission($permission_query);
        }        
    }


    $request->session()->flash('alert-success', 'data has been successfully added!');
    return redirect()->back();
}


public function index()
{

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
        //
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
    }
}
