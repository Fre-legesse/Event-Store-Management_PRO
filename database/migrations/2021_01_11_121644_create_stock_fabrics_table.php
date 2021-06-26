<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockFabricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::query()->create('stock_fabrics', function (Blueprint $table) {
            $table->integer('SFID', true);
            $table->string('Type');
            $table->string('Fabric');
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
        Schema::dropIfExists('stock_fabrics');
    }
}
