<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->call('BrandsTableSeeder');
        $this->call('ProductsTableSeeder');
        $this->call('ImagesTableSeeder');
        $this->call('AdminAccessSeederTable');
    }
}
