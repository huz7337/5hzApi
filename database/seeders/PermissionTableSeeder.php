<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $this->setPermissionsForAdmins();
        $this->setPermissionsForUsers();
    }

    /**
     * Set the permissions for super admins
     */
    private function setPermissionsForAdmins()
    {
        $permissions = $this->_permissionsForAdmins();

        $admin = Role::findByName(User::ROLE_ADMIN);
        $admin->revokePermissionTo(Permission::all());
        $admin->givePermissionTo($permissions);
    }

    /**
     * Set the permissions for admins
     */
    private function setPermissionsForUsers()
    {
        $permissions = $this->_permissionsForUsers();

        $user = Role::findByName(User::ROLE_USER);
        $user->revokePermissionTo(Permission::all());
        $user->givePermissionTo($permissions);
    }

    /**
     * Permissions for admins
     * @return array
     */
    public function _permissionsForAdmins(): array
    {
        $permissions[] = Permission::findOrCreate(User::PERMISSION_USER_LIST);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_USER_SHOW);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_USER_CREATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_USER_UPDATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_USER_DELETE);

        $permissions[] = Permission::findOrCreate(User::PERMISSION_ROLE_LIST);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_ROLE_SHOW);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_ROLE_CREATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_ROLE_UPDATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_ROLE_DELETE);

        $permissions[] = Permission::findOrCreate(User::PERMISSION_CATEGORY_CREATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_CATEGORY_UPDATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_CATEGORY_DELETE);

        $permissions[] = Permission::findOrCreate(User::PERMISSION_TAG_CREATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_TAG_UPDATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_TAG_DELETE);

        $permissions[] = Permission::findOrCreate(User::PERMISSION_POST_LIST);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_POST_CREATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_POST_UPDATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_POST_DELETE);

        $permissions[] = Permission::findOrCreate(User::PERMISSION_SERVICE_LIST);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_SERVICE_CREATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_SERVICE_UPDATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_SERVICE_DELETE);

        $permissions[] = Permission::findOrCreate(User::PERMISSION_PROJECT_LIST);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_PROJECT_CREATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_PROJECT_UPDATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_PROJECT_DELETE);

        $permissions[] = Permission::findOrCreate(User::PERMISSION_COMMENT_CREATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_COMMENT_UPDATE);
        $permissions[] = Permission::findOrCreate(User::PERMISSION_COMMENT_DELETE);

        $permissions[] = Permission::findOrCreate(User::PERMISSION_ATTACHMENT_DELETE);

        return $permissions;
    }

    public function _permissionsForUsers(): array
    {
        return [];
    }
}
