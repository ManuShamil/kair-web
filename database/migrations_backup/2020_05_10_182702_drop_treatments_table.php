<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('treatments');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('treatment_description');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('treatment_info');
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
        //
    }
}
