<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(UserTableSeeder::class);
         $this->call(InterestTableSeeder::class);
         
  
         $this->call(EditorialTableSeeder::class);
          
         $this->call(CategoryTableSeeder::class);
         $this->call(BookTableSeeder::class);
         $this->call(AuthorTableSeeder::class);
         
         $this->call(BookCommentTableSeeder::class);
         $this->call(BookVoteTableSeeder::class);
           
        

        Model::reguard();
    }
}
