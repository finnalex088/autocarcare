<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->string('spare_category_id');
            $table->string('spare_part_name');
            $table->string('spare_part_ccode');
            $table->string('Purchase_price');
            $table->string('sales_price');
            $table->string('tax');
            $table->string('profit_margin');
            $table->string('UNT');
            $table->text('location');
            $table->string('low_stock_quantity');
            $table->string('HSN_code');
            $table->string('description');
            $table->string('manufactured_by');
         
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
        Schema::dropIfExists('stock');
    }
};
