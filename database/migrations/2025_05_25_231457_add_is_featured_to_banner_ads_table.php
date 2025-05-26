<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsFeaturedToBannerAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banner_ads', function (Blueprint $table) {
            $table->boolean('is_featured')
                ->default(false)
                ->after('status')
                ->comment('Hiển thị danh mục lên trang chủ');

            $table->string('link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banner_ads', function (Blueprint $table) {
            //
        });
    }
}
