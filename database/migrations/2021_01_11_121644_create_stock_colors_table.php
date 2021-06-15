<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_colors', function (Blueprint $table) {
            $table->integer('SCID', true);
            $table->string('Type');
            $table->string('Color');
            $table->string('Company');
            $table->string('Department');
            $table->integer('CUID');
            
            $table->integer('UUID');
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
        Schema::dropIfExists('stock_colors');
    }
}
