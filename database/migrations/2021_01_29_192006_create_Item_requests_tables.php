<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemRequestsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::query()->create('Item_requests', function (Blueprint $table) {
            $table->integer('IRID', true);
            $table->string('Company');
            $table->string('Department');
            $table->string('Event_id');
            $table->string('Requester');
            $table->string('Responsible_person')->nullable();
            $table->string('Phone_Number')->nullable();
            $table->date('Return_date');
            $table->string('Transaction');
            $table->string('Transaction_Type');
            $table->string('ApprovalOne')->nullable();
            $table->string('ApprovalTwo')->nullable();
            $table->string('Issued')->nullable();
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
        Schema::dropIfExists('Item_requests');
    }
}
