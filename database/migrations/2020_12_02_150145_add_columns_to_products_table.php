<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('images')->nullable();
            $table->integer('collection_id')->nullable();
            $table->smallInteger('status');
            $table->string('type');
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->longText('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('images');
            $table->dropColumn('collection_id');
            $table->dropColumn('type');
            $table->dropColumn('width');
            $table->dropColumn('height');
            $table->dropColumn('description');
            $table->dropColumn('status');
        });
    }
}
