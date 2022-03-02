<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalDimensionPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_dimension', function (Blueprint $table) {
            $table->unsignedBigInteger('animal_id')->index();
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
            $table->unsignedBigInteger('dimension_id')->index();
            $table->foreign('dimension_id')->references('id')->on('dimensions')->onDelete('cascade');
            $table->primary(['animal_id', 'dimension_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal_dimension');
    }
}
