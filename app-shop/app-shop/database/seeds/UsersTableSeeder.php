<?php

use Illuminate\Database\Seeder;
use App\User;
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
            
            'name' => 'Juan',
            'email' => 'juan@gmail.com',
            'cc' => '1151200181',
            'tel_1' => '4370559',
            'city' => 'Santa Marta',
            'address' => 'calle 29 #28 B 26',
            'password' => bcrypt('19971235'),
            'admin' => true,
            
        ]);
    }
}
