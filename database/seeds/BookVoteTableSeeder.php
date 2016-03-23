<?php

use Illuminate\Database\Seeder;

class BookVoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\BookVote::class,10)->create();
    }
}
