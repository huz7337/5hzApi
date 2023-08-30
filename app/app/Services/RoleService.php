<?php

namespace App\Services;

use Spatie\Permission\Models\Role;

class RoleService
{

    /**
     * Add a new role
     * @param array $data
     * @return mixed
     */
    public function create(array $data): Role
    {
        $role = Role::create(['name' => $data['name']]);
        $role->syncPermissions($data['permission']);

        return $role;
    }

    /**
     * Update role
     * @param Role $role
     * @param array $data
     * @return Role
     */
    public function update(Role $role, array $data): Role
    {
        $role->update($data);
        $role->syncPermissions($data['permission']);

        return $role;
    }
}
