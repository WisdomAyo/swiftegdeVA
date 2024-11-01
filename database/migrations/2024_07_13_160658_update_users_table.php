<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add new columns
            $table->decimal('usd_rate', 8, 2)->nullable();
            $table->decimal('gbp_rate', 8, 2)->nullable();
            $table->decimal('eur_rate', 8, 2)->nullable();
            $table->decimal('ngn_rate', 8, 2)->nullable();

            $table->dropColumn(['rate', 'currency']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            // Remove the newly added columns
            $table->dropColumn(['usd_rate', 'gbp_rate', 'eur_rate', 'ngn_rate']);

            // Add the old columns back
            $table->decimal('rate', 8, 2)->nullable();
            $table->string('currency', 3)->nullable();
        });
    }
}
