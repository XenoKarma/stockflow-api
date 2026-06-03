<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['name' => 'Dashboard View', 'slug' => 'dashboard.view'],
            ['name' => 'Manage Categories', 'slug' => 'categories.manage'],
            ['name' => 'Manage Products', 'slug' => 'products.manage'],
            ['name' => 'Manage Suppliers', 'slug' => 'suppliers.manage'],
            ['name' => 'Manage Inventory', 'slug' => 'inventory.manage'],
            ['name' => 'View Transactions', 'slug' => 'transactions.view'],
            ['name' => 'View Reports', 'slug' => 'reports.view'],
            ['name' => 'Manage Users', 'slug' => 'users.manage'],
            ['name' => 'POS Access', 'slug' => 'pos.access'],
        ];

        Permission::insert($permissions);
    }
}
