<?php

use Illuminate\Database\Seeder;

class BookCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\BookComment::class,10)->create();
    }
}
