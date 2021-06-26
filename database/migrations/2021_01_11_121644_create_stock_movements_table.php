<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::query()->create('stock_movements', function (Blueprint $table) {
            $table->integer('SMID', true);
            $table->string('Company');
            $table->string('Department');
            $table->string('Stock_Room');
            $table->string('Item');
            $table->integer('Transaction');
            $table->integer('Transaction_Type');
            $table->float('Quantity', 10, 0);
            $table->float('Unit_Price', 10, 0)->nullable();
            $table->string('Order_Number')->nullable();
            $table->string('Project_Code')->nullable();
            $table->date('Date_MVT');
            $table->integer('Event')->nullable();
            $table->date('Purchase_Date')->nullable();
            $table->text('Remark')->nullable();
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
        Schema::dropIfExists('stock_movements');
    }
}
