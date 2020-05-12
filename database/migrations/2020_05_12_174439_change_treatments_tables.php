<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTreatmentsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->unsignedBigInteger('image_id')->after('treatment_id');
        });
        Schema::table('treatments', function (Blueprint $table) {
            $table->foreign('image_id')->references('id')->on('images');
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('treatment_images');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->dropColumn('image_id');
        });
        
    }
}
