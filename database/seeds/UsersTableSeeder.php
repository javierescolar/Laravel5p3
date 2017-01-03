<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.es',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'discount_user' => 0,
            'image' => 'users/user_admin.png',
            'active' => true,
            'aboutme' => 'Administrador'
        ]);
        DB::table('users')->insert([
            'name' => 'Javier Escolar',
            'email' => 'javierescolar10@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'user',
            'active' => true,
            'aboutme' => ''
        ]);
        factory('App\User', 5)->create();
    }
}
