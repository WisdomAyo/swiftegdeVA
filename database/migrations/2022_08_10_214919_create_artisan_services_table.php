<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtisanServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artisan_services', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->text('profile_picture')->nullable();
            $table->longText('title')->nullable();
            $table->longText('full_name')->nullable();
            $table->text('feature_image')->nullable();
            $table->text('business_category')->nullable();
            $table->string('phone',50)->nullable();
            $table->longText('email')->nullable();
            $table->longText('website')->nullable();
            $table->text('cost')->nullable();
            $table->longText('per_service')->nullable();
            $table->longText('street_address')->nullable();
            $table->longText('city')->nullable();
            $table->longText('state')->nullable();
            $table->longText('service_description')->nullable();
            $table->longText('experience')->nullable();
            $table->string('status',10)->default(0)->nullable();
            $table->longText('rating')->nullable();
            $table->longText('review')->nullable();
            $table->longText('employers')->nullable();
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
        Schema::dropIfExists('artisan_services');
    }
}
