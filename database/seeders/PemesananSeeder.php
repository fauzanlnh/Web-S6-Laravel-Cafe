<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PemesananSeeder extends Seeder
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
        	\DB::table('table_pemesanan')->insert([
        		'tanggal_pemesanan' => "2021-06-09",
                'no_meja' => $x,
                'status_pembayaran' => "Masih",
                'total_pembayaran' => 0,
        	]);
        }
    }
}
