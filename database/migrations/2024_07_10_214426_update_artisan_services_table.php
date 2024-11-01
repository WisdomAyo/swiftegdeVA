<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateArtisanServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artisan_services', function (Blueprint $table) {
            if (!Schema::hasColumn('artisan_services', 'business_category_id')) {
                $table->integer('business_category_id')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artisan_services', function (Blueprint $table) {
            if (Schema::hasColumn('artisan_services', 'business_category_id')) {
                $table->dropColumn('business_category_id');
            }
        });
    }
}
