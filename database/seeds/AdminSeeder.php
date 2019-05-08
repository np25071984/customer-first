<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'admin' => true,
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => bcrypt('user'),
            'admin' => false,
        ]);
    }
}
