<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('business_category');
            $table->integer('number_of_freelancers');
            $table->decimal('budget', 10, 2);
            $table->json('area_of_specialization');
            $table->enum('pay_type', ['hour', 'monthly']);
            $table->decimal('min_pay', 10, 2)->nullable();
            $table->decimal('max_pay', 10, 2)->nullable();
            $table->decimal('monthly_pay_amount', 10, 2)->nullable();
            $table->string('location');
            $table->string('other_details');
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
        Schema::dropIfExists('freelancer_bookings');
    }
}
