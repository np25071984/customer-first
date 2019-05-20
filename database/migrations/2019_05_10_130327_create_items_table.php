<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('article')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('price');
            $table->timestamps();
        });

        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger('container_id')->nullable()->after('id');;
            $table->foreign('container_id')->references('id')->on('item_containers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function($table) {
            $table->dropForeign(['container_id']);
        });

        Schema::dropIfExists('items');
    }
}
