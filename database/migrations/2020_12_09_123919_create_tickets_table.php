<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            
            $table->id();
            $table->text('name')->nullable();
            $table->text('date_of_issue')->nullable();
            $table->text('data')->nullable();
            $table->text('address')->nullable();
            $table->text('bsk')->nullable();;
            $table->text('bsd')->nullable();
            $table->text('price')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
