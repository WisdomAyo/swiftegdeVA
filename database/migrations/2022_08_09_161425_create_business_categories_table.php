<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('business_categories', function (Blueprint $table) {
            $table->id();
            $table->string('parent_id')->default(0);
            $table->longText('url')->nullable();
            $table->longText('title')->nullable();
            $table->longText('fa_icon')->nullable();
            $table->longText('featured_img')->nullable();
            $table->longText('show_menu')->nullable();
            $table->string('status',10)->default(1);
            $table->string('created_by',10)->nullable();
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
        Schema::dropIfExists('business_categories');
    }
}
