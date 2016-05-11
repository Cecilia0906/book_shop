<?php



//use Styde\Seeder\Seeder;



use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /*
    protected $total = 250;

    public function getModel()
    {
        return new Book();
    }
    
    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [

            'title' => $faker->sentence,
            'status' => $faker->randomElement(['open', 'open', 'closed']),
            'user_id' => $this->random('User')->id,
           // 'user_id'=>$this->createFrom('UserTableSeeder')->id

          ];
    }
    
    */
    
    public function run()
    {
        factory(App\Models\Book::class,10)->create();
    }
}
