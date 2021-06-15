<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReqestedItemListsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reqested_item_lists', function (Blueprint $table) {
            $table->integer('RILID', true);
            $table->string('Request_ID');
            $table->string('Event_ID');
            $table->string('ItemCode');
            $table->string('Quantity');
            $table->integer('Approval1Quantity');
            $table->integer('Approval2Quantity');   
            $table->integer('IssuedQuantity');
            $table->integer('Issued');
            $table->integer('Item_Remaining');
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
        Schema::dropIfExists('reqested_item_lists');
    }
}
