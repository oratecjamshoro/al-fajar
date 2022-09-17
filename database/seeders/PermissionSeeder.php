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
            'user-access',
            'user-create',
            'user-edit',
            'user-delete',
            'role-access',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-access',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'mcc-access',
            'mcc-create',
            'mcc-edit',
            'mcc-delete',
            'mcci-access',
            'mcci-create',
            'mcci-edit',
            'mcci-delete',
            'mmt-access',
            'mmt-create',
            'mmt-edit',
            'mmt-delete',
            'supplier-access',
            'supplier-create',
            'supplier-edit',
            'supplier-delete',
            'doodi-access',
            'doodi-create',
            'doodi-edit',
            'doodi-delete',
            'employee-access',
            'employee-create',
            'employee-edit',
            'employee-delete',
            'inv-category-access',
            'inv-category-create',
            'inv-category-edit',
            'inv-category-delete',
            'inv-item-access',
            'inv-item-create',
            'inv-item-edit',
            'inv-item-delete',
            'inventory-access',
            'hr-access',
            'utility-access',
            'generator-access',
            'wapda-access',
            'report-access',
            'account-access',
            'received-payment-access',
            'today-list-access',
            'received-milk-access'
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
