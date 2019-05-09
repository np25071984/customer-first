<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesSlugTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_slug', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique()->index()->nullable(false);
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::table('categories_slug', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('id');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories_slug', function($table) {
            $table->dropForeign(['category_id']);
        });

        Schema::dropIfExists('categories_slug');
    }
}
