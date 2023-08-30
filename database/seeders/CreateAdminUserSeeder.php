<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminData = [
            'name' => '5hz',
            'email' => 'admin@5hz.io',
            'password' => Hash::make('password'),
        ];
        $this->addUser($adminData);
        $this->attachAdminRole($adminData);

        $user = [
            'name' => 'Oleg',
            'email' => 'oleg@gmail.com',
            'password' => Hash::make('123456')
        ];
        $this->addUser($user);
        $this->attachUserRole($user);
    }

    /**
     * Add a super-admin user
     * @param array $data
     */
    private function addUser(array $data)
    {
        if (User::where('email', $data['email'])->doesntExist()) {
            User::create($data);
        }
    }

    /**
     * Attach super-admin role to users
     * @param array $data
     */
    private function attachAdminRole(array $data)
    {
        User::findByEmail($data['email'])->assignRole('admin');

    }

    /**
     * Attach super-admin role to users
     * @param array $data
     */
    private function attachUserRole(array $data)
    {
        User::findByEmail($data['email'])->assignRole('user');
    }

}
