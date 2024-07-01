<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions =[
            [ 'prefix'=> 'User', 'name'=>'user-list'],
            [ 'prefix'=> 'User', 'name'=>'user-create'],
            [ 'prefix'=> 'User', 'name'=>'user-edit'],
            [ 'prefix'=> 'User', 'name'=>'user-delete'],
            ['prefix'=> 'Role', 'name'=>'role-list'],
            ['prefix'=> 'Role', 'name'=>'role-create'],
            ['prefix'=> 'Role', 'name'=>'role-edit'],
            ['prefix'=> 'Role', 'name'=>'role-delete'],
            ['prefix'=> 'Permission', 'name'=>'permission-list'],
            ['prefix'=> 'Permission', 'name'=>'permission-create'],
            ['prefix'=> 'Permission', 'name'=>'permission-edit'],
            ['prefix'=> 'Permission', 'name'=>'permission-delete'],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
