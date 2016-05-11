<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'lastname' => $faker->lastName,
        'birthdate'=>$faker->dateTimeBetween($startDate = '-45 years', $endDate = '-15 years')->format('Y-m-d'),
        'gender'=>$faker->randomElement(['female','male']),
        'email' => $faker->unique()->email,
        'pais_id'=>null,
        'provincia_id'=>null,
        'ciudad_id'=>null,
        'photo_id'=>null,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'role'=>$faker->randomElement(['user','admin'])
    ];
});


$factory->define(App\Models\Interest::class, function (Faker\Generator $faker) {
    return [
        'name' =>$faker->randomElement(['Ciencia ficción','Novela','Tecnología','Derecho'])
        
    ];
});


$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' =>$faker->company
       //'name' =>$faker->Element(['Ciencia ficción','Novela','Tecnología','Derecho','Política','Finanzas','Autoayuda','Infantiles','Thriller','Terror'])
        
    ];
});

$factory->define(App\Models\Editorial::class, function (Faker\Generator $faker) {
    return [
        'name' =>$faker->company
        //'name' =>$faker->Element(['Paidós','Estrada','Kier','Argentina, La Azotea','Tetraedro','Sudamericana','Planeta','Sirio','P&J'])
        
    ];
});

$factory->define(App\Models\Book::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'description'   => $faker->paragraph(),
        'price' =>$faker->randomFloat( 2,  50, 350),
        'editorial_id' => rand(1,10),
        'category_id' => rand(1,10)

    ];
});

$factory->define(App\Models\Author::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'lastname' => $faker->lastName,
        'birthdate'=>$faker->dateTimeBetween($startDate = '-45 years', $endDate = '-15 years')->format('Y-m-d'),
        'nationality'=>$faker->country
        
        
    ];
});


$factory->define(App\Models\BookComment::class, function (Faker\Generator $faker) {
    return [
        
        'comment'   => $faker->paragraph(),       
        'user_id' => rand(1,49),
        'book_id' => rand(1,10)

    ];
});

$factory->define(App\Models\BookVote::class, function (Faker\Generator $faker) {
    return [

        'user_id' => rand(1,49),
        'book_id' => rand(1,10)

    ];
});
