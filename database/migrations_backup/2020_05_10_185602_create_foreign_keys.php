<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->foreign('department_id')->references('id')->on('departments');
        });
        Schema::table('treatment_info', function (Blueprint $table) {
            $table->foreign('treatment_id')->references('id')->on('treatments');
        });
        Schema::table('treatment_description', function (Blueprint $table) {
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
        
    }
}
