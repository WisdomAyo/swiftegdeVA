<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->longText('full_name')->nullable();
            $table->longText('gender')->nullable();
            $table->longText('email')->nullable();
            $table->string('identity')->nullable();
            $table->string('availability',100)->default('ACTIVELY SEARCHING');
            $table->longText('password')->nullable();
            $table->longText('phone')->nullable();
            $table->longText('date_of_birth')->nullable();
            $table->longText('street_address')->nullable();
            $table->longText('city')->nullable();
            $table->longText('state')->nullable();
            $table->longText('profile_image')->nullable();
            $table->longText('Location_address')->nullable();
            $table->longText('delivery_address')->nullable();
            $table->longText('role')->nullable();
            $table->longText('business_category')->nullable();
            $table->longText('facebook')->nullable();
            $table->longText('instagram')->nullable();
            $table->longText('work_experience')->nullable();
            $table->longText('website_address')->nullable();
            $table->longText('service_description')->nullable();
            $table->longText('agreement_status')->nullable();
            $table->longText('compensation_type')->nullable();
            $table->longText('job_preference')->nullable();
            $table->string('min_amount',50)->nullable();
            $table->string('max_amount',50)->nullable();
            $table->string('is_admin',10)->default(0)->nullable();
            $table->string('status',10)->default(1)->nullable();
            $table->string('verify_code',50)->nullable();
            $table->string('is_verified')->nullable();
            $table->text('remember_token')->nullable();
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
        Schema::dropIfExists('user');
    }
}
