<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('department_id');
            $table->binary('images');
            $table->string('file_name');
            $table->timestamps();
        });
        Schema::create('treatment_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('treatment_id');
            $table->string('language');
            $table->string('title');
            $table->timestamps();
        });
        Schema::create('treatment_description', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('treatment_id');
            $table->string('language');
            $table->text('question');
            $table->longText('answer');
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
        Schema::dropIfExists('treatments');
        Schema::dropIfExists('treatment_info');
        Schema::dropIfExists('treatment_description');
    }
}
