<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
               'name'           =>'Admin',
               'last_name'      =>'Developer',
               'email'          =>'admin@avita.com',
               'phone'          =>'9876543211',
                'is_admin'      =>'1',
                'role'          =>'1',
               'password'       => bcrypt('Admin@123'),
            ],
            [
                'name'           =>'Seller',
                'last_name'      =>'Avita',
                'email'          =>'seller@avita.com',
                'phone'          =>'9876543000',
                 'is_admin'      =>'2',
                 'role'          =>'2',
                'password'       => bcrypt('Seller@123'),
            ],
            [
                'name'           =>'Seller',
                'last_name'      =>'Avita',
                'email'          =>'seller1@avita.com',
                'phone'          =>'9876000000',
                 'is_admin'      =>'2',
                 'role'          =>'2',
                'password'       => bcrypt('Seller@123'),
            ],
            [
               'name'           =>'User',
               'last_name'      =>'Avita',
               'email'          =>'user@avita.com',
               'phone'          =>'9876543210',
                'is_admin'      =>'0',
                'role'          =>'0',
               'password'       => bcrypt('User@123'),
            ],

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
