<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('src')->unique();
            $table->timestamps();
        });

        Schema::table('item_images', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id')->nullable()->after('id');;
            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_images', function($table) {
            $table->dropForeign(['item_id']);
        });

        Schema::dropIfExists('item_images');
    }
}
