<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user =new User;
        $user->name='Patricio';
        $user->email="patricio@email.com";
        $user->password=bcrypt('12345');
        $user->save();
    }
}
