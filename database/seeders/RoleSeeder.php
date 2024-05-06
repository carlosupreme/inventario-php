<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $employee = Role::create(['name' => 'trabajador']);

        Permission::create(['name' => 'user.create'])->assignRole($admin);
        Permission::create(['name' => 'user.edit'])->assignRole($admin);
        Permission::create(['name' => 'user.delete'])->assignRole($admin);

    }
}
