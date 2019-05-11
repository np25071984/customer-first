<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsSlugTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_slug', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value')->unique()->index()->nullable(false);
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::table('items_slug', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id')->nullable()->after('id');
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
        Schema::table('items_slug', function($table) {
            $table->dropForeign(['item_id']);
        });

        Schema::dropIfExists('items_slug');
    }
}
