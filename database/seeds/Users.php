<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
        	'name' => 'Jose Gijon',
        	'email' => 'josegijon30@hotmail.com',
        	'password' => bcrypt('123456')
        ]);
    }
}
