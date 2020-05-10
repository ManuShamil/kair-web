<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hows', function (Blueprint $table) {
            $table->id();
            $table->string('how_id')->default('');
            $table->string('file_name')->default('');
            $table->binary('image')->default('');
            //DB::statement("ALTER TABLE `how` ADD COLUMN `image` LONGBLOB");
            $table->timestamps();
            
        });

        Schema::create('how_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('how_id')->default(0);
            $table->string('language')->default('');
            $table->string('info')->default('');
            $table->longText('description')->default('');
            $table->timestamps();

            //$table->foreign('how_id')->references('id')->on('how');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hows');
        Schema::dropIfExists('how_info');
    }
}
