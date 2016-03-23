<?php

use Illuminate\Database\Seeder;

class EditorialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Models\Editorial::class,10)->create();
    }
}
