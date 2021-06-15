<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockStockRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_stock_rooms', function (Blueprint $table) {
            $table->integer('SRID', true);
            $table->string('Company', 50);
            $table->string('Department', 50);
            $table->string('Branch', 50);
            $table->string('Site', 50);

            $table->string('Stock_Room', 100);
            $table->text('Description')->nullable();
            $table->string('ShortName', 50);
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
        Schema::dropIfExists('stock_stock_rooms');
    }
}
