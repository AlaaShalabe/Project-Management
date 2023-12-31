<?php

    namespace App\Http\Controllers;


    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Spatie\Permission\Models\Role;
    use Spatie\Permission\Models\Permission;
    use DB;

    class RoleController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        function __construct()
        {
             $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
             $this->middleware('permission:role-create', ['only' => ['create','store']]);
             $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
             $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        }


        public function index(Request $request)
        {
            $roles = Role::orderBy('id','DESC')->get();
            return view('roles.index',compact('roles'));

        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $permission = Permission::get();
            return view('roles.create',compact('permission'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $this->validate($request, [
                'name' => 'required|unique:roles,name',
                'permission' => 'required',
            ]);

            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));

            return redirect()->route('roles.index')->withStatus(__('Role created successfully'));

        }

        public function show(Role $role)
        {
            $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
                ->where("role_has_permissions.role_id",$role->id)
                ->get();

            return view('roles.show',compact('role','rolePermissions'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit(Role $role)
        {
            $permission = Permission::get();
            $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$role->id)
                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                ->all();

            return view('roles.edit',compact('role','permission','rolePermissions'));
        }


        public function update(Request $request,Role $role)
        {
            $this->validate($request, [
                'name' => 'required',
                'permission' => 'required',
            ]);
            $role->name = $request->input('name');
            $role->save();

            $role->syncPermissions($request->input('permission'));

            return redirect()->route('roles.index')
                             ->withStatus(__('Role updated successfully'));
        }
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            DB::table("roles")->where('id', $id)->delete();
            return redirect()->route('roles.index')
                            ->withStatus(__('Role deleted successfully'));
        }
    }
