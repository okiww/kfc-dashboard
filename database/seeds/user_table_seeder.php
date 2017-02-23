<?php

use Illuminate\Database\Seeder;

class user_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Okky',
            'email' => 'administrator@smooets.com',
            'password' => bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'Shridar',
            'email' => 'administrator@wgs.com',
            'password' => bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'Gmail',
            'email' => 'administrator@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'Yahoo',
            'email' => 'administrator@yahoo.com',
            'password' => bcrypt('12345678'),
        ]);

        return view('table.tmp_t_pos_bill');
    }
}
