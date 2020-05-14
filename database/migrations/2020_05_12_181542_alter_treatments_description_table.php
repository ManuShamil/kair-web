<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTreatmentsDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('treatment_description', function (Blueprint $table) {
            $table->renameColumn('title','question');
            $table->renameColumn('description','answer');
        });

        Schema::table('treatment_description', function (Blueprint $table) {
            DB::statement("ALTER TABLE `treatment_description` MODIFY `question` LONGTEXT");
            DB::statement("ALTER TABLE `treatment_description` MODIFY `answer` LONGTEXT");

            
        });
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
