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
            'name'     => 'Foo Bar',
            'password' => bcrypt('foobar'),
            'email'    => 'foo@bar.com',
            'avatar'   => asset('storage/avatars/avatar.png'),
        ]);
    }
}
