<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('title');
            $table->string('sku')->unique();
            $table->string('slug')->unique();
            $table->string('image')->nulled();
            $table->string('image_thumb')->nulled();
            $table->string('detail')->nulled();
            $table->integer('price')->nulled();
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
            $table->dropColumn('title');
            $table->dropColumn('sku');
            $table->dropColumn('slug');
            $table->dropColumn('image');
            $table->dropColumn('image_thumb');
            $table->dropColumn('detail');
            $table->dropColumn('price');
        });
    }
}
