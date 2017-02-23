<?php

use Illuminate\Database\Seeder;

class TruncateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table((new \App\User)->table)->truncate();
        DB::table((new \App\Models\Menu)->table)->truncate();
        DB::table((new \App\Models\MenuChild)->table)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
