<?php

use App\Models\User;
use App\Models\Role;
use App\Services\UserService;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'     => 'Admin',
                'email'    => 'admin@kredo.com',
                'password' => 'password',
            ],
        ];

        foreach ($data as $fields) {
            $userService = (new UserService);
            $user = $userService->findEmail($fields['email']);

            if (!$user) {
                $userService->create($fields);
            }

            $userService->attachRole('admin');
        }
    }
}
