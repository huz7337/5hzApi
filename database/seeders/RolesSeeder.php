<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = [
            User::ROLE_ADMIN,
            User::ROLE_USER,
        ];

        foreach ($roles as $role) {
            Role::findOrCreate($role);
        }
    }
}
