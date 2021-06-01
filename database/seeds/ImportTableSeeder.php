<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ImportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path() . '/dump/cities.sql');
    
        DB::statement($sql);
    }
}
