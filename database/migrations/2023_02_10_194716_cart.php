<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

         Schema::create('cart',function(Blueprint $column){

             $column->id();
             $column->foreignId('product_id')->constrained('products');
             $column->integer('quantity');
             $column->float('price');
             $column->foreignId('trader')->constrained('user');
             $column->foreignId('customer')->constrained('user');
             $column->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
