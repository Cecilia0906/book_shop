<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->boolean('social')->default(false);
            $table->date('birthdate')->nullable();
            $table->enum('role',['user','editor','admin']);
            $table->enum('gender',['female','male']);
            $table->string('email')->unique();
            $table->string('password', 60)->nullable();
            
            $table->integer('pais_id')->unsigned()->nullable();
           // $table->foreign('pais_id')->references('id')->on('countries');
            
            $table->integer('provincia_id')->unsigned()->nullable();
           // $table->foreign('provincia_id')->references('id')->on('provinces');
            
            $table->integer('ciudad_id')->unsigned()->nullable();
            //$table->foreign('ciudad_id')->references('id')->on('cities');
            
            $table->integer('photo_id')->unsigned()->nullable();
            //$table->foreign('photo_id')->references('id')->on('photos');
                        
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
