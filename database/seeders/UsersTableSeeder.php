<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\{Permission,Role};

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shifts')->insert([
            'startTime' => '00:00:00',
            'endTime'  => '00:00:00',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('specialties')->insert([
            'name' => 'ui/ux',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sub_specialties')->insert([

            'name' => 'ui/ux developer',
            'specialty_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

       $admin = User::create([
            'id' => 1,
            'name' => 'Admin Admin',
            'email' => 'admin@white.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'sub_specialty_id' => 1 ,
            'shift_id' => 1 ,
            'join_date' => now(),
            'birth_date' => now(),
            'phone_number'=>'09876543',
            'address'  =>'nhgytf',
            'gender'=>'male',
            'created_at' => now(),
            'updated_at' => now(),
            'roles_name' => 'Super Admin',

        ]);


        //create role
        $role1 = Role::create(['name' => 'Super Admin']);
        $role2 = Role::create(['name' => 'User']);
        //return array contain id's Permission like [1,2,3,....]
        $permissions = Permission::pluck('id', 'id')->all();
        //assign permission to role
        $role1->syncPermissions($permissions);
        //assign role for user
        $admin->assignRole([$role1->id]);
    }
}
