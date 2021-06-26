<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::query()->create('stock_items', function (Blueprint $table) {

            $table->integer('SIID', true);
            $table->string('Company');
            $table->string('Department');
            $table->string('Item_Code');
            $table->string('Asset_Noo')->nullable();
            $table->string('Size')->nullable();
            $table->string('Fabric');
            $table->string('Color');
            $table->string('Type', 50);
            $table->string('Brand', 100);
            $table->string('Manufacturer')->nullable();
            $table->string('Journal_Number')->nullable();
            $table->string('Status', 50);
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
        Schema::dropIfExists('stock_items');
    }
}
