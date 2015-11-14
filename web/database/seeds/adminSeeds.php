<?php

use Illuminate\Database\Seeder;

class adminSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(array (
            'name'        => 'azure',
            'email'       => 'azuresky07@gmail.com',
            'password'    => \Hash::make('septiembre08'),
        ));

        \DB::table('users')->insert(array (
            'name'        => 'admin',
            'email'       => 'admin@gmail.com',
            'password'    => \Hash::make('4dm1n'),
        ));
    }
}
