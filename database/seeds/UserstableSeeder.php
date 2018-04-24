<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'     => 'admin',
            'password' => bcrypt('admin'),
            'email'    => 'admin@forum.loc',
            'admin'    => 1,
            'avatar'   => asset('storage/avatars/avatar.png'),
        ]);
        
        App\User::create([
            'name'     => 'Emily Myers',
            'password' => bcrypt('emily'),
            'email'    => 'emily@myers.com',
            'avatar'   => asset('storage/avatars/avatar.png'),
        ]);
    }
}
