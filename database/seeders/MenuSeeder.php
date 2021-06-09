<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\id_ID\Restaurant($faker));
        //$faker = Faker::create('id_ID');
        for($x = 1; $x <= 10; $x++){
        	// insert data dummy menu dengan faker
        	\DB::table('table_menu')->insert([
        		'nama_menu' => $faker->foodName(),
                'harga_menu' => 3000,
                'kategori' => "Makanan",
                'status' => "Tersedia",
        	]);
        }
        for($x = 1; $x <= 10; $x++){
        	// insert data dummy menu dengan faker
        	\DB::table('table_menu')->insert([
        		'nama_menu' => $faker->beverageName(),
                'harga_menu' => 3000,
                'kategori' => "Minuman",
                'status' => "Tersedia",
        	]);
        }
    }
}
