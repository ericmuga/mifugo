<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateMediumPostPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medium_post', function (Blueprint $table) {
            $table->unsignedBigInteger('medium_id')->index();
            $table->foreign('medium_id')->references('id')->on('media')->onDelete('cascade');
            $table->unsignedBigInteger('post_id')->index();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->primary(['medium_id', 'post_id']);
            $table->unsignedInteger('position');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medium_post');
    }
}
