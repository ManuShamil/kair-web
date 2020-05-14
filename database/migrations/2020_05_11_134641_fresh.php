<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fresh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('extension');
            $table->binary('image');
            $table->timestamps();
        });

        Schema::table('images', function (Blueprint $table) {
            DB::statement("ALTER TABLE `images` MODIFY `image` LONGBLOB");
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('department_id');
            $table->unsignedBigInteger('image_id');
            $table->timestamps();
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->foreign('image_id')->references('id')->on('images');
        });


        Schema::create('department_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');
            $table->string('language');
            $table->string('full_name');
            $table->timestamps();

        });

        Schema::table('department_info', function (Blueprint $table) {
            $table->foreign('department_id')->references('id')->on('departments');
        });

        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('image_id');
            $table->string('treatment_id');
            $table->timestamps();
        });

        Schema::table('treatments', function (Blueprint $table) {
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('image_id')->references('id')->on('images');
        });


        Schema::create('treatment_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('treatment_id');
            $table->string('language');
            $table->string('full_name');
            $table->timestamps();
        });

        
        Schema::table('treatment_info', function (Blueprint $table) {
            $table->foreign('treatment_id')->references('id')->on('treatments');
        });

        Schema::create('treatment_description', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('treatment_id');
            $table->string('language');
            $table->integer('priority');
            $table->longText('question');
            $table->longText('answer');
            $table->timestamps();

        });

        Schema::table('treatment_description', function (Blueprint $table) {
            $table->foreign('treatment_id')->references('id')->on('treatments');
        });

        Schema::create('why', function (Blueprint $table) {
            $table->id();
            $table->string('why_id')->default('');
            $table->unsignedBigInteger('image_id');
            $table->timestamps();
            
        });

        Schema::table('why', function (Blueprint $table) {
            $table->foreign('image_id')->references('id')->on('images');  
        });

        Schema::create('why_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('why_id')->default(0);
            $table->string('language')->default('');
            $table->string('info')->default('');
            $table->longText('description')->default('');
            $table->timestamps();

        });

        Schema::table('why_info', function (Blueprint $table) {
            $table->foreign('why_id')->references('id')->on('why');
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('image_id');
            $table->timestamps();
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->foreign('image_id')->references('id')->on('images');  
        });

        Schema::create('testimonials_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('testimonial_id');
            $table->string('language');
            $table->string('name');
            $table->string('location');
            $table->longText('testimonial');
            $table->timestamps();
        });

        Schema::table('testimonials_info', function (Blueprint $table) {
            $table->foreign('testimonial_id')->references('id')->on('testimonials');  
        });

        Schema::create('hows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('image_id');

            $table->timestamps();
            
        });

        Schema::table('hows', function (Blueprint $table) {
            $table->foreign('image_id')->references('id')->on('images');  
        });

        Schema::create('how_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('how_id');
            $table->string('language')->default('');
            $table->string('info')->default('');
            $table->longText('description')->default('');
            $table->timestamps();

        });

        Schema::table('how_info', function (Blueprint $table) {
            $table->foreign('how_id')->references('id')->on('hows');  
        });





        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->mediumText('en_location');
            $table->mediumText('ar_location');
            $table->timestamps();
        });

        Schema::create('accreditations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('image_id');
            $table->mediumText('title');
            $table->timestamps();
        });

        Schema::table('accreditations', function (Blueprint $table) {
            $table->foreign('image_id')->references('id')->on('images');  
        });

        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->integer('beds');
            $table->unsignedBigInteger('location_id'); //foreign
            $table->timestamps();
        });

        Schema::table('hospitals', function (Blueprint $table) {
            $table->foreign('location_id')->references('id')->on('locations');
        });

        Schema::create('hospital_departments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->unsignedBigInteger('department_id'); //foreign
            $table->timestamps();
        });

        Schema::table('hospital_departments', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            $table->foreign('department_id')->references('id')->on('departments');
        });

        Schema::create('hospital_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->unsignedBigInteger('image_id');
            $table->timestamps();
        });

        Schema::table('hospital_images', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            $table->foreign('image_id')->references('id')->on('images');  
        });

        Schema::create('hospital_accreditations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->unsignedBigInteger('accreditation_id'); //foreign
            $table->timestamps();
        });

        Schema::table('hospital_accreditations', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            $table->foreign('accreditation_id')->references('id')->on('accreditations');
        });

        Schema::create('hospital_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->string('language');
            $table->mediumText('title');
            $table->timestamps();
        });

        Schema::table('hospital_info', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
        });

        Schema::create('hospital_address', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->string('language');
            $table->longText('address');
            $table->longText('land_mark');
            $table->timestamps();
        });

        Schema::table('hospital_address', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
        });

        Schema::create('hospital_infrastructure', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->string('language');
            $table->longText('infrastructure');
            $table->timestamps();
        });

        Schema::table('hospital_infrastructure', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
        });


        Schema::create('hospital_about', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->string('language');
            $table->longText('about');
            $table->timestamps();
        });

        Schema::table('hospital_about', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
        });

        Schema::create('hospital_specialities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); //foreign
            $table->string('language');
            $table->longText('speciality');
            $table->timestamps();
        });

        Schema::table('hospital_specialities', function (Blueprint $table) {
            $table->foreign('hospital_id')->references('id')->on('hospitals');
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
        Schema::dropIfExists('departments');
        Schema::dropIfExists('department_images');
        Schema::dropIfExists('department_info');
        Schema::dropIfExists('treatments');
        Schema::dropIfExists('treatment_info');
        Schema::dropIfExists('treatment_description');
        Schema::dropIfExists('why');
        Schema::dropIfExists('why_info');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('testimonials_info');
        Schema::dropIfExists('hows');
        Schema::dropIfExists('how_info');
        Schema::dropIfExists('hospitals');
        Schema::dropIfExists('hospital_departments');
        Schema::dropIfExists('hospital_images');
        Schema::dropIfExists('hospital_accreditations');
        Schema::dropIfExists('hospital_info');
        Schema::dropIfExists('hospital_address');
        Schema::dropIfExists('hospital_infrastructure');
        Schema::dropIfExists('hospital_about');
        Schema::dropIfExists('hospital_specialities');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('accreditations');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
