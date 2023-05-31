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
        Schema::create('job_cards', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number');
            $table->string('customer_name');
            $table->string('mobile_no');
            $table->string('address');
            $table->string('color');
            $table->string('make_id');
            $table->string('model_id');
            $table->string('insurance_id')->nullable();
            $table->string('odometer_reading');
            $table->string('fuel_type');
            $table->string('fuel_level');
            $table->string('work_type');
            $table->string('estimate');
            $table->string('image_id')->nullable();
            $table->string('VIN_No')->nullable();
            $table->string('service_type')->nullable();
            $table->string('policy_no')->nullable();
            $table->string('claim_no')->nullable();
             $table->string('mileage')->nullable();
            
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
        Schema::dropIfExists('job_cards');
    }
};
