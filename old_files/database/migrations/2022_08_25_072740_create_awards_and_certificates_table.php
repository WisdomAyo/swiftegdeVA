<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwardsAndCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards_and_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->longText('title')->nullable();
            $table->longText('desc')->nullable();
            $table->longText('year')->nullable();
            $table->longText('purpose')->nullable();
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
        Schema::dropIfExists('awards_and_certificates');
    }
}
