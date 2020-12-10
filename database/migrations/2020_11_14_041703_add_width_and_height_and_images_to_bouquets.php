<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWidthAndHeightAndImagesToBouquets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bouquets', function (Blueprint $table) {
            $table->float('width')->nullable();
            $table->float('height')->nullable();
            $table->string('images')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bouquets', function (Blueprint $table) {
            $table->dropColumn(['width',  'height', 'images']);
        });
    }
}
