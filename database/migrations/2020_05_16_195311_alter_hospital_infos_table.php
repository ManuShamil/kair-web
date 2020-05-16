<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHospitalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hospital_about', function (Blueprint $table) {
            $table->dropColumn('about');
        });
        Schema::table('hospital_about', function (Blueprint $table) {
            $table->longText('about')->default('')->after('language');
        });
        Schema::table('hospital_infrastructure', function (Blueprint $table) {
            $table->dropColumn('about');
            
        });
        Schema::table('hospital_infrastructure', function (Blueprint $table) {
            $table->longText('infrastructure')->default('')->after('language');
        });
        Schema::table('hospital_specialities', function (Blueprint $table) {
            $table->dropColumn('speciality');
        });
        Schema::table('hospital_specialities', function (Blueprint $table) {
            $table->longText('about')->default('')->after('language');
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
