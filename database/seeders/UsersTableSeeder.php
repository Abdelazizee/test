<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                         => 1,
                'name'                       => 'Admin',
                'email'                      => 'admin@admin.com',
                'password'                   => bcrypt('password'),
                'remember_token'             => null,
                'country_phone_code'         => '',
                'phone'                      => '',
                'company_name'               => '',
                'owner_name'                 => '',
                'commercial_register_number' => '',
                'location'                   => '',
                'lat'                        => '',
                'lang'                       => '',
                'company_phone'              => '',
            ],
        ];

        User::insert($users);
    }
}
