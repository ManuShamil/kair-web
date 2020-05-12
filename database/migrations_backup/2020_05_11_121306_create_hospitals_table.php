<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->integer('beds');
            $table->unsignedBigInteger('location_id'); //foreign
            $table->timestamps();
        });

        Schema::create('hospital_treatments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->unsignedBigInteger('treatment_id'); //foreign
            $table->timestamps();
        });

        Schema::create('hospital_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->binary('image');
            $table->string('file_name');
            $table->timestamps();
        });

        Schema::create('hospital_accreditations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->unsignedBigInteger('accreditation'); //foreign
            $table->timestamps();
        });

        Schema::create('hospital_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->string('language');
            $table->mediumText('title');
            $table->timestamps();
        });

        Schema::create('hospital_address', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->string('language');
            $table->longText('address');
            $table->longText('land_mark');
            $table->timestamps();
        });

        Schema::create('hospital_infrastructure', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->string('language');
            $table->longText('infrastructure');
            $table->timestamps();
        });

        Schema::create('hospital_about', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->string('language');
            $table->longText('about');
            $table->timestamps();
        });

        Schema::create('hospital_specialities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->string('language');
            $table->longText('speciality');
            $table->timestamps();
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->mediumText('en_location');
            $table->mediumText('ar_location');
            $table->timestamps();
        });

        Schema::create('accreditations', function (Blueprint $table) {
            $table->id();
            $table->mediumText('title');
            $table->binary('image');
            $table->string('file_name');
            $table->timestamps();
        });

        Schema::table('hospitals', function (Blueprint $table) {
            $table->foreign('location_id')->references('id')->on('locations');
        });

        Schema::table('hospital_treatments', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
        });

        Schema::table('hospital_images', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            DB::statement("ALTER TABLE `hospital_images` MODIFY `image` LONGBLOB");
        });

        Schema::table('hospital_accreditations', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            $table->foreign('accreditation_id')->references('id')->on('accreditations');
        });

        Schema::table('hospital_info', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
        });

        Schema::table('hospital_address', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
        });

        Schema::table('hospital_infrastructure', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
        });

        Schema::table('hospital_about', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
        });

        Schema::table('hospital_specialities', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
        });


        Schema::table('accreditations', function (Blueprint $table) {
            DB::statement("ALTER TABLE `accreditations` MODIFY `image` LONGBLOB");
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('treatment_images');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('hospitals');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('hospital_accreditations');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('hospital_info');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('hospital_address');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('hospital_infrastructure');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('hospital_about');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('hospital_specialities');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('hospital_treatments');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('hospital_images');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('locations');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('accreditations');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
