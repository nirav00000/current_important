<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Hardik Savani',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);


         //     $normalRole = Role::firstOrCreate(['name' => 'Normal']);

    //     $permissionsCustom =
    //     Permission::select('id')
    //     ->where('name','=','product-list')
    //     ->orWhere('name','=','product-delete')

    //     ->get()->toArray();

    //     $id_array = array_column($permissionsCustom, 'id');

    //     $normalRole->syncPermissions($permissionsCustom);

    //     protected function create(array $data)
    // {
    //     $user =  User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);

    //     $role = Role::select('id')
    //     ->where('name','=','Normal')
    //     ->get()->toArray();

    //     $id_array = array_column($role, 'id');


    //     $user->assignRole($id_array);

    //     return $user;
    // }
    }
}
