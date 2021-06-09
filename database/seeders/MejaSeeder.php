<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        for($x = 1; $x <= 10; $x++){
        	// insert data dummy menu dengan faker
        	\DB::table('table_meja')->insert([
        		'status' => "Kosong",
        	]);
        }    
    }
}
