<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBrandIdToPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('prices', function (Blueprint $table) {
//            $table->bigInteger('brand_id', false, true);
//            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('prices', function (Blueprint $table) {
//            $table->dropForeign('prices_brand_id_foreign');
//            $table->dropColumn('brand_id');
//        });
    }
}
