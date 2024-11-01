<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("state_id")->nullable();
            $table->index('state_id');
            $table->foreign('state_id')->references('id')->on('states');
            $table->string('name',50)->nullable();
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('state_areas');
    }
}
