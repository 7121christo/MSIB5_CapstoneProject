<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin_husk_bag@gmail.com';
        $user->password = Hash::make('admin');
        $user->is_admin = true;
        $user->save();

        $user = new User();
        $user->name = 'user1';
        $user->email = 'user1@gmail.com';
        $user->password = Hash::make('user1');
        $user->is_admin = false;
        $user->save();
    }
}
