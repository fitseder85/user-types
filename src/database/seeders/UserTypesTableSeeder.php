<?php

namespace Fitseder85\UserTypes\Database\Seeders;

use Illuminate\Database\Seeder;
use Fitseder85\UserTypes\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userType = [
            [
                'user_id' => 1,
                'name' => 'User',
                'description' => 'This are web viewers',
                'status' => true,
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'user_id' => 1,
                'name' => 'Internal',
                'description' => 'Internal user',
                'status' => true,
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'user_id' => 1,
                'name' => 'External',
                'description' => 'External user',
                'status' => true,
                'updated_at' => now(),
                'created_at' => now()
            ]
        ];

        UserType::insert($userType);
    }
}
