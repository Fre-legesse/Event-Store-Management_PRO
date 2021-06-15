<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->integer('EVID', true);
            $table->string('Company');
            $table->string('Department');
            $table->string('Event_Name');
            $table->dateTime('Date_From');
            $table->dateTime('Date_To');
            $table->string('Location');
            $table->text('Description')->nullable();
            $table->string('Event_Type');
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
        Schema::dropIfExists('events');
    }
}
