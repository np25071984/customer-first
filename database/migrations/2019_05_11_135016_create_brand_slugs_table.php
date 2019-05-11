<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandSlugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands_slug', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value')->unique()->index()->nullable(false);
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::table('brands_slug', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id')->nullable()->after('id');
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brands_slug', function($table) {
            $table->dropForeign(['brand_id']);
        });

        Schema::dropIfExists('brands_slug');
    }
}
