<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        $sql = file_get_contents(database_path() . '/dump/states.sql');
        DB::statement($sql);
        $this->call(ImportTableSeeder::class);

    }
}
