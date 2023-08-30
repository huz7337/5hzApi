<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\User;
use App\Services\RoleService;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * @var RoleService
     */
    protected RoleService $_service;

    /**
     * Constructor.
     * @param RoleService $service
     */
    function __construct(RoleService $service)
    {
        $this->_service = $service;
    }

    /**
     * List roles blade
     *
     * @return mixed
     */
    public function index()
    {
        $this->authorize(User::PERMISSION_ROLE_LIST);

        $roles = Role::orderBy('id', 'DESC')->paginate(config('filters.per_page'));
        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Create role blade
     *
     * @return mixed
     */
    public function create()
    {
        $permission = Permission::get();
        return view('dashboard.roles.create', compact('permission'));
    }

    /**
     * Edit role blade
     *
     * @return mixed
     */
    public function edit(Role $role)
    {
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('dashboard.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleCreateRequest $request
     * @return mixed
     */
    public function store(RoleCreateRequest $request)
    {
        $data = $request->validated();

        $this->_service->create($data);
        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleUpdateRequest $request
     * @param Role $role
     * @return mixed
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $data = $request->validated();

        $this->_service->update($role, $data);
        return redirect()->route('roles.edit', $role->id)
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return mixed
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
