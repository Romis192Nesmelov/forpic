<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActionIdToActionOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('action_options', function (Blueprint $table) {
            $table->bigInteger('action_id', false, true);
            $table->foreign('action_id')->references('id')->on('actions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('action_options', function (Blueprint $table) {
            $table->dropForeign('action_options_action_id_foreign');
            $table->dropColumn('action_id');
        });
    }
}
