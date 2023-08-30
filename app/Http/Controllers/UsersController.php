<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * @var UserService
     */
    protected UserService $_service;

    /**
     * UsersController constructor.
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->_service = $service;
    }

    /**
     * List users blade
     *
     * @return mixed
     */
    public function index()
    {
        $this->authorize(User::PERMISSION_USER_LIST);

        $data = User::orderBy('id', 'DESC')->paginate(config('filters.per_page'));
        return view('dashboard.users.index', compact('data'));
    }

    /**
     * Create user blade
     *
     * @return mixed
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('dashboard.users.create', compact('roles'));
    }

    /**
     * Edit user blade
     *
     * @return mixed
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('dashboard.users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Show user blade
     *
     * @return mixed
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     * @return mixed
     */
    public function store(UserCreateRequest $request)
    {
        $data = $request->validated();

        $this->_service->create($data);
        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param User $user
     * @return mixed
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();

        $this->_service->update($user, $data);
        return redirect()->route('users.edit', $user->id)
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return mixed
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
