<?php

use Illuminate\Database\Seeder;

class create_menu_child_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_child')->insert([
            'name' => 'tmp_tpos_bill',
            'menu_id' => 1
        ]);

        DB::table('menu_child')->insert([
            'name' => 'tmp_tpos_bill_item',
            'menu_id' => 1
        ]);
    }
}
