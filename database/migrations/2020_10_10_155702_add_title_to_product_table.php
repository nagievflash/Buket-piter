<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image');
            $table->string('image_gallery');
            $table->string('detail');
            $table->integer('width');
            $table->integer('height');
            $table->integer('seo_title');
            $table->integer('seo_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('slug');
            $table->dropColumn('image');
            $table->dropColumn('image_gallery');
            $table->dropColumn('detail');
            $table->dropColumn('width');
            $table->dropColumn('height');
            $table->dropColumn('seo_title');
            $table->dropColumn('seo_description');
        });
    }
}
