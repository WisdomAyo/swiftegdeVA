<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_requests', function (Blueprint $table) {
            $table->id();
            $table->longText('user_name')->nullable();
            $table->longText('email')->nullable();
            $table->longText('phone')->nullable();
            $table->longText('industry')->nullable();
            $table->longText('position')->nullable();
            $table->longText('hire_type')->nullable();
            $table->longText('quantity')->nullable();
            $table->longText('role_description')->nullable();
            $table->longText('age_range')->nullable();
            $table->longText('gender')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('level_of_education')->nullable();
            $table->longText('it_skills')->nullable();
            $table->longText('basic_salary')->nullable();
            $table->longText('allowances')->nullable();
            $table->longText('state')->nullable();
            $table->longText('city')->nullable();
            $table->longText('interview_date')->nullable();
            $table->longText('interview_time')->nullable();
            $table->longText('interview_venue')->nullable();
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
        Schema::dropIfExists('employer_requests');
    }
}
