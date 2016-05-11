<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
            
    {
         Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
           $table->string('name');
      
           /* $table->enum('name',['Ciencia ficció',
                                            'novela',
                                            'Tecnología',
                                            'Derecho',
                                            'Política',
                                            'Autoayuda',
                                            'Infantiles',
                                            'Thriller',
                                            'Terror',
                                            'Finanzas'
                                            ]);*/
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
        Schema::drop('categories');
    }
}
