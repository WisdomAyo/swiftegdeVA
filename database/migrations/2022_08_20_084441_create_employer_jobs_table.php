<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->longText('job_title')->nullable();
            $table->longText('job_description')->nullable();
            $table->longText('url')->nullable();
            $table->longText('firstname')->nullable();
            $table->longText('lastname')->nullable();
            $table->longText('email')->nullable();
            $table->longText('phone')->nullable();
            $table->longText('industry')->nullable();
            $table->longText('position')->nullable();
            $table->longText('hire_type')->nullable();
            $table->longText('quantity')->nullable();
            $table->longText('business_category_name')->nullable();
            $table->string('business_category_id',10)->nullable();
            $table->longText('age_range')->nullable();
            $table->longText('gender')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('level_of_education')->nullable();
            $table->longText('it_skills')->nullable();
            $table->longText('basic_salary')->nullable();
            $table->longText('allowances')->nullable();
            $table->longText('state')->nullable();
            $table->longText('city')->nullable();
            $table->string('status',50)->nullable();
            $table->longText('application_deadline')->nullable();
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
        Schema::dropIfExists('employer_jobs');
    }
}
