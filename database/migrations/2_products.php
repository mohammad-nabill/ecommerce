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

        Schema::create('products',function(Blueprint $column){
            $column->id();
            $column->string('name');
            $column->longtext('description');
            $column->string('category');
            $column->string('pic');
            $column->string('price');
            $column->foreignId('trader')->constrained('user')->onDelete('cascade');
            $column->integer('quantity');
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
      // Schema::dropIfExists('products');

    }
};
