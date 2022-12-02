<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\User;
use Illuminate\Support\Facades\Hash;

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

        $data = [
            'first_name' => 'admin',
            'email' => 'admin@cyberolympus.com',
            'password' => Hash::make('cyberadmin'),
        ];

        User::create($data);

    }
}
