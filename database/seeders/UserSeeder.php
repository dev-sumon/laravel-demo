<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {

        $permissions = Permission::pluck('name')->toArray();

        $roles =[
            [ 'name'=> 'Super Admin', 'guard_name'=>'web'],
            ['name'=> 'Admin', 'guard_name'=>'web'],
        ];
        foreach ($roles as $role) {
            $role=Role::create($role);
            $role->givePermissionTo($permissions);
        }

        $users =[
            [ 'name'=> 'sumon', 'email'=>'sumon@gmail.com', 'password' =>'sumon@gmail.com', 'role_id' => 1],
            ['name'=> 'shariful', 'email'=>'shariful@gmail.com', 'password' =>'shariful@gmail.com', 'role_id' => 2],
        ];
        foreach ($users as $user) {
            $user=User::create($user);
            $user->assignRole($user->role->name);
        }
    }
}
