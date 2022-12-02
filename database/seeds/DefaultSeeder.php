<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', '-1');
        $prepare = __DIR__.'/../../resources/db/database.sql';
        
        DB::unprepared(file_get_contents($prepare));
    }
}
