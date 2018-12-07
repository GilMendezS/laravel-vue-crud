<?php
use App\User;
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
        User::create([
        	'name' => 'Juan Pablo',
        	'email' => 'user@prueba.com',
        	'password' => bcrypt('123456'),
        ]);
    }
}
