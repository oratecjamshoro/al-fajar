<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'mcc-list',
            'mcc-create',
            'mcc-edit',
            'mcci-list',
            'mcci-create',
            'mcci-edit',
            'mmt-list',
            'mmt-create',
            'mmt-edit',
            'today-list',
            'received-milk',
            'supplier-list',
            'supplier-create',
            'supplier-edit',
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
