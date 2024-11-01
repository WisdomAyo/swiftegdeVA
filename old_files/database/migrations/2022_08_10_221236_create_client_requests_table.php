<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_requests', function (Blueprint $table) {
            $table->id();
            $table->text('full_name');
            $table->text('phone');
            $table->text('email');
            $table->longText('business_category');
            $table->longText('sub_category');
            $table->longText('fix_location');
            $table->timestamp('current_location');
            $table->timestamp('time_of_appointment');
            $table->timestamp('date_of_appointment');
            $table->text('budget');
            $table->longText('description');
            $table->longText('request_type');
            $table->string('service_type', 20);
            $table->longText('painter_assigned');
            $table->string('status',10);
            $table->text('agreement');
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
        Schema::dropIfExists('client_requests');
    }
}
