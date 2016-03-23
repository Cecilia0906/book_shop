<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('editorials', function (Blueprint $table) {
            $table->increments('id');   
            $table->string('name');
         /*   $table->enum('name',['Paidós',
                                            'Estrada',
                                            'Kier',
                                            'Argentina',
                                            'La Azotea',
                                            'Tetraedro',
                                            'Sudamericana',
                                            'Planeta',
                                            'Sirio',
                                             'P&J']);*/
            
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
        Schema::drop('editorials');
    }
}
