<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBouquetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bouquets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sku')->unique();
            $table->string('slug')->unique();
            $table->integer('collection_id')->nullable();
            $table->string('size')->nullable();
            $table->float('price')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('bouquets');
    }
}
