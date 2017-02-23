<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TruncateTableSeeder::class);
        $this->call(create_menu_child_seeder::class);
        $this->call(menu_parents_seeder::class);
        $this->call(user_table_seeder::class);
    }
}
