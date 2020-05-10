<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('treatment_id');
            $table->integer('priority');
            $table->binary('image');

            $table->foreign('treatment_id')->references('id')->on('treatments');
        });

        Schema::create('treatment_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('treatment_id');
            $table->string('language');
            $table->string('full_name');

            $table->foreign('treatment_id')->references('id')->on('treatments');
        });

        Schema::create('treatment_description', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('treatment_id');
            $table->string('language');
            $table->integer('priority');
            $table->string('title');
            $table->longText('description');

            $table->foreign('treatment_id')->references('id')->on('treatments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatments');
        Schema::dropIfExists('treatment_info');
        Schema::dropIfExists('treatment_description');
    }
}
