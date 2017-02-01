<?php

use Illuminate\Database\Seeder;

class menu_parents_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_parents')->insert([
            'name' => 'table'
        ]);
    }
}
