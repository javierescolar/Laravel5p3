<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->delete();
 
        $brands = array(
            ['id' => 1, 'name' => 'Apple', 'slug' => 'brand-1', 'logo' => 'brands/apple.png' ,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Samsung', 'slug' => 'brand-2', 'logo' => 'brands/samsung.png','created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'HTC', 'slug' => 'brand-3', 'logo' => 'brands/htc.png','created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('brands')->insert($brands);
    }
}
