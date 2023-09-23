<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\{Hash,File};
use App\Models\{User,Specialty,Shift};
use Illuminate\Support\Facades\{DB,Redirect};
use App\Http\Requests\User\{StoreUser,UpdateUser};

class UserController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    //Show All Users
    public function index()
    {
        $users = User::all();
        return view('users.index' , ['users' => $users]);
    }

    public function show(User $user)
    {
        $shifts = Shift::all();
        return view('users.show' , ['user' => $user ,'shifts' => $shifts]);
    }

    //Create New User
    public function create()
    {
        $specialties = Specialty::all();
        $shifts = Shift::all();
        return view('users.create' ,compact('specialties','shifts'));
    }


    //Insert User Into DataBase
    public function store(StoreUser $request)
    {
        $input = $request->all();
        $user = User::create([

            'sub_specialty_id'=> $input['sub_specialty'],
            'shift_id'=> $input['shift'],
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'join_date'=> $input['join_date'],
            'birth_date'=> $input['birth_date'],
            'phone_number'=> $input['phone'],
            'address'    =>  $input['address'],
            'gender'    =>  $input['gender'],
        ]);

        $user->assignRole('User');

        if($request->hasFile('image')){
                //Upload Image in Public File
                $imageName = time().'.'.$request->image->getClientOriginalName();
                $request->image->move(public_path('images/User'), $imageName);

                $user->update([
                    'photo' => 'images/User/'.$imageName,
                ]);
        }
        return redirect()->route('user.index')->withStatus(__('User successfully created'));

    }

    //edit
    public function edit(User $user)
    {

        $specialties = Specialty::all();
        $shifts = Shift::all();
        $roles = Role::get('name')->where('name','<>', $user->roles_name);
        return view('users.edit' , compact('user','roles','specialties','shifts'));
    }


    //update
    public function update(UpdateUser $request ,User $user)
    {
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = $input['password'] ;
            }else{
            $input = array_except($input,array('password'));
            }
            $user->update($input);


            if($request->hasFile('image')){

                if(File::exists(public_path().'/'.$user->photo)){

                    File::delete(public_path().'/'.$user->photo);
                }
                //Upload Image in Public File
                $imageName = time().'.'.$request->image->getClientOriginalName();
                $request->image->move(public_path('images/User'), $imageName);

                $user->update([
                    'photo' => 'images/User/'.$imageName,
                ]);
        }


            DB::table('model_has_roles')->where('model_id',$user->id)->delete();

            $user->assignRole($request->input('roles_name'));

           return redirect()->route('user.index')->withStatus(__('User updated successfully'));
    }



    public function destroy(User $user)
    {



            File::delete(public_path().'/'.$user->photo);

        $user->delete();
        return redirect()->route('user.index')
                        ->withStatus(__('User deleted successfully'));
    }







    //get Sub Specialties from Specialties
    public function getSub_specialties($id)
    {
        // $products = DB::table("products")->where("section_id", $id)->pluck("Product_name", "id");
        // return json_encode($products);
        $sub_specialties = DB::table("sub_specialties")->where('specialty_id' ,$id)->pluck("name", "id");

        if(count($sub_specialties) > 0){

            return json_encode($sub_specialties);
        }

    }

    //change User status

    public function active(User $user){
        $user->status = 'Active';
        $user->save();
        return back()->withStatus(__('Status changed To Active Successfuly'));
    }

    public function inactive(User $user){
        $user->status = 'Inactive';
        $user->save();
        return back()->withStatus(__('Status changed To Inactive Successfuly'));
    }

    public function disable(User $user){
        $user->status = 'Disable';
        $user->save();
        return back()->withStatus(__('Status changed To Disable Successfuly'));
    }

}
