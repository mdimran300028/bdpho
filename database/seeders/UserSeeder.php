<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','md.imran300028@gmail.com')->first();
        if (is_null($user)){
            $user = new User();
            $user->name = 'Muhammad Imran';
            $user->email = 'md.imran300028@gmail.com';
            $user->password = Hash::make('Imran1167');
            $user->save();
        }
    }
}
