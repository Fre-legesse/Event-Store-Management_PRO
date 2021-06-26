<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::query()->create('stocks', function (Blueprint $table) {
            $table->integer('SID', true);
            $table->string('Company');
            $table->string('Department');
            $table->string('Stock_Room');
            $table->string('Item');
            $table->float('Quantity', 10, 0);
            $table->float('MAX', 10, 0)->nullable();
            $table->float('MIN', 10, 0)->nullable();
            $table->float('Reorder_Point', 10, 0)->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
