<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Uncomment the below to wipe the table clean before populating
        DB::table('products')->delete();
 
        $products = array(
            ['id' => 1, 'name' => 'Iphone 7', 'slug' => 'product-1', 'brand_id' => 1, 'description' => 'My first task', 'price' => 859.99, 'image' => 'products/iphone7.jpg','image_carrusel' => 'products/carrusel/iphone7.jpg','offer'=> false,'carrusel'=>true,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Iphone 5s', 'slug' => 'product-2', 'brand_id' => 1, 'description' => 'My first task', 'price' => 859.99,'image' => 'products/iphone5s.jpg','image_carrusel' => 'products/carrusel/iphone5s.jpg','offer'=> true,'carrusel'=>false,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Galasy Edge 6 Plus', 'slug' => 'product-3', 'brand_id' => 2, 'description' => 'My first task', 'price' => 859.99,'image' => 'products/galaxyedge6.jpg','image_carrusel' => 'products/carrusel/galaxyedge6.jpg','offer'=> true,'carrusel'=>false,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Galasy S4', 'slug' => 'product-4', 'brand_id' => 2, 'description' => 'My second task', 'price' => 859.99,'image' => 'products/galaxys4.jpg','image_carrusel' => 'products/carrusel/galaxys4.jpg','offer'=> true,'carrusel'=>false,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'name' => 'One M9', 'slug' => 'product-5', 'brand_id' => 3, 'description' => 'My third task', 'price' => 859.99,'image' => 'products/onem9.jpg','image_carrusel' => 'products/carrusel/onem9.jpg','offer'=> false,'carrusel'=>true,'created_at' => new DateTime, 'updated_at' => new DateTime],
            
        );
 
        //// Uncomment the below to run the seeder
        DB::table('products')->insert($products);
    }
}
