<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
   
    factory(App\Models\User::class)->create([
        'name' => 'Cecilia',
        'lastname' => 'Valotto',
        'birthdate'=>'1976/06/09',
        'gender' =>'female',
        'pais_id'=> null,
        'provincia_id'=> null,
        'ciudad_id'=> null,
        'photo_id'=> null,
        'email' => 'cecilia0906@gmail.com',
        'password' => bcrypt('admin'),
       
        'role'=>'admin',
        
    ]);
     factory(App\Models\User::class,49)->create();

        
    }
}
