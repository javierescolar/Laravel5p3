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
        $description = "Una buena descripción del producto para atraer al cliente final para que compre este magnífico y maravilloso móvil que no puedes dejar pasar";
        $products = array(
            ['id' => 1, 'name' => 'Iphone 7', 'slug' => 'product-1', 'brand_id' => 1,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' ,'price' => 859.99,'appears_on_offer'=>true,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Iphone 5s', 'slug' => 'product-2', 'brand_id' => 1,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 859.99,'appears_on_offer'=>true,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Galaxy Edge 6 Plus', 'slug' => 'product-3', 'brand_id' => 2,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 859.99,'appears_on_offer'=>true,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Galaxy S4', 'slug' => 'product-4', 'brand_id' => 2,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 859.99,'appears_on_offer'=>true,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'name' => 'One M9', 'slug' => 'product-5', 'brand_id' => 3,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 859.99,'appears_on_offer'=>false,'discount'=> 0,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'name' => 'Galaxy Note 7', 'slug' => 'product-6', 'brand_id' => 2,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 859.99,'appears_on_offer'=>false,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'name' => 'HTC 10', 'slug' => 'product-7', 'brand_id' => 3,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 859.99,'appears_on_offer'=>false,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'name' => 'Galaxy S5', 'slug' => 'product-8', 'brand_id' => 2,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 859.99,'appears_on_offer'=>false,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            );
 
        //// Uncomment the below to run the seeder
        DB::table('products')->insert($products);
    }
}
