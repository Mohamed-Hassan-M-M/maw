<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::create([
            'name' => 'super_admin',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('password'),
            'type' => 'admin',
        ]);

        $user->attachRole('super_admin');

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
            'type' => 'admin',
        ]);

        $user->attachRole('admin');

    }//end of run

}//end of seeder
