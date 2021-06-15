<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApproverWorkflowsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approver_workflows', function (Blueprint $table) {
           $table->integer('ID', true);
            $table->string('Item_Id');
            $table->string('Item_Name');
            $table->string('Quantity');
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
        Schema::dropIfExists('approver_workflows');
    }
}
