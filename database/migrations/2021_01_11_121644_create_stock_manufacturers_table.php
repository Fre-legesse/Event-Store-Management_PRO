<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_manufacturers', function (Blueprint $table) {
            $table->integer('SMID', true);
            $table->string('Type');
            $table->string('Manufacturer');
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
        Schema::dropIfExists('stock_manufacturers');
    }
}
