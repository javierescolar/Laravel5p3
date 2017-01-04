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
            ['id' => 1, 'name' => 'Iphone 7', 'slug' => 'product-1', 'brand_id' => 1,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' ,'price' => 859.99,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Iphone 5s', 'slug' => 'product-2', 'brand_id' => 1,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 859.99,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Galasy Edge 6 Plus', 'slug' => 'product-3', 'brand_id' => 2,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 859.99,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Galasy S4', 'slug' => 'product-4', 'brand_id' => 2,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 859.99,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'name' => 'One M9', 'slug' => 'product-5', 'brand_id' => 3,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 859.99,'discount'=> 0,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'name' => 'Iphone 5s', 'slug' => 'product-6', 'brand_id' => 1,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 859.99,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'name' => 'Iphone 5s', 'slug' => 'product-7', 'brand_id' => 1,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 859.99,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'name' => 'Iphone 5s', 'slug' => 'product-8', 'brand_id' => 1,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 859.99,'discount'=> 0,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'name' => 'Iphone 5s', 'slug' => 'product-9', 'brand_id' => 1,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 859.99,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 10, 'name' => 'Iphone 5s', 'slug' => 'product-10', 'brand_id' => 1,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 759.99,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 11, 'name' => 'Iphone 5s', 'slug' => 'product-11', 'brand_id' => 1,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 559.99,'discount'=> 0,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 12, 'name' => 'Iphone 5s', 'slug' => 'product-12', 'brand_id' => 1,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 659.99,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 13, 'name' => 'Iphone 5s', 'slug' => 'product-13', 'brand_id' => 1,'slogan'=> 'Aquí viene el eslogan para vender!!', 'description' => $description,'characteristic_1' => '4GB RAM' ,'characteristic_2' => 'Pantalla 5"' ,'characteristic_3' => '32GB' , 'price' => 959.99,'discount'=> 5,'stock'=>10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            );
 
        //// Uncomment the below to run the seeder
        DB::table('products')->insert($products);
    }
}
