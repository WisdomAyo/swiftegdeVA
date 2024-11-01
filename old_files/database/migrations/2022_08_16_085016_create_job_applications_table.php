<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->string('job_id',100)->nullable();
            $table->string('employer_id', 100)->nullable();
            $table->string('user_id', 100)->nullable();
            $table->string('full_name')->nullable();
            $table->longText('location_address')->nullable();
            $table->longText('phone')->nullable();
            $table->longText('email')->nullable();
            $table->longText('dob')->nullable();
            $table->longText('skills')->nullable();
            $table->longText('skillLevel')->nullable();
            $table->longText('availability')->nullable();
            $table->longText('certification')->nullable();
            $table->longText('cv')->nullable();
            $table->string('status',20)->nullable();
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
        Schema::dropIfExists('job_applications');
    }
}
