<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiringRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiring_requests', function (Blueprint $table) {
            $table->id();
            $table->string('employer_id',10)->nullable();
            $table->string('artisan_id',10)->nullable();
            $table->longText('email')->nullable();
            $table->longText('phone')->nullable();
            $table->longText('industry')->nullable();
            $table->longText('position')->nullable();
            $table->longText('hire_type')->nullable();
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
        Schema::dropIfExists('hiring_requests');
    }
}
