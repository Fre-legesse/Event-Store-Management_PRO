<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::query()->create('stock_brands', function (Blueprint $table) {
            $table->integer('SBID', true);
            $table->string('Type');
            $table->string('Brand');
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
        Schema::dropIfExists('stock_brands');
    }
}
