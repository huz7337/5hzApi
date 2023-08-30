<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Authenticate user
     * @param User $user
     * @return string
     */
    public function login(User $user)
    {
        return $user->createToken('auth')->plainTextToken;
    }

    /**
     * Create user account
     * @param array $data
     * @return User
     */
    public function register(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        // assign athlete role
        $user->assignRole(User::ROLE_USER);

        return $user;
    }

    /**
     * Add a new user
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        $user->assignRole($data['roles']);

        return $user;
    }

    /**
     * Update user
     * @param User $user
     * @param array $data
     * @return User
     */
    public function update(User $user, array $data): User
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data = Arr::except($data, ['password']);
        }

        $user->update($data);

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->assignRole($data['roles']);

        return $user;

    }
}
