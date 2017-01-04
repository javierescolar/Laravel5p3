<?php

use Illuminate\Database\Seeder;

class AdminAccessSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_access')->delete();
 
        $admin_access = array(
            ['id' => 1, 'user_id' => 1 ,'connect' => '2016-12-30 10:45:00', 'disconnect' => '2016-12-31 12:45:00'],
            ['id' => 2, 'user_id' => 1, 'connect' => '2017-01-01 18:45:00', 'disconnect' => new DateTime],
            
        );
 
        // Uncomment the below to run the seeder
        DB::table('admin_access')->insert($admin_access);
    }
}
