<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->longText('user_name')->nullable();
            $table->longText('service_purchased')->nullable();
            $table->longText('package')->nullable();
            $table->longText('cost')->nullable();
            $table->longText('subscription_type')->nullable();
            $table->longText('payment_method')->nullable();
            $table->timestamp('purchase_date')->nullable();
            $table->timestamp('expiration_date')->nullable();
            $table->longText('status')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
}
