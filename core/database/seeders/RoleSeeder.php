<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'super_admin', 'guard_name' => 'web']);
        Role::create(['name' => 'moderator', 'guard_name' => 'web']);
        Role::create(['name' => 'support_agent', 'guard_name' => 'web']);
    }
}
