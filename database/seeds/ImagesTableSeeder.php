<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('images')->delete();

        $images = array(
            ['id' => 1, 'product_id' => 1, 'slug' => 'image-1', 'location' => 'products/iphone7.jpg', 'offer' => false, 'carrusel' => true, 'gallery' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'product_id' => 1, 'slug' => 'image-2', 'location' => 'products/iphone5s.jpg', 'offer' => true, 'carrusel' => false, 'gallery' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'product_id' => 2, 'slug' => 'image-3', 'location' => 'products/galaxyedge6.jpg', 'offer' => true, 'carrusel' => false, 'gallery' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'product_id' => 2, 'slug' => 'image-4', 'location' => 'products/galaxys4.jpg', 'offer' => true, 'carrusel' => false, 'gallery' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'product_id' => 3, 'slug' => 'image-5', 'location' => 'products/onem9.jpg', 'offer' => false, 'carrusel' => true, 'gallery' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        //// Uncomment the below to run the seeder
        DB::table('images')->insert($images);
    }

}
