<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('why', function (Blueprint $table) {
            $table->id();
            $table->string('why_id')->default('');
            $table->string('file_name')->default('');
            $table->binary('image')->default('');
            //DB::statement("ALTER TABLE `why` ADD COLUMN `image` LONGBLOB");
            $table->timestamps();
            
        });

        Schema::create('why_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('why_id')->default(0);
            $table->string('language')->default('');
            $table->string('info')->default('');
            $table->longText('description')->default('');
            $table->timestamps();

            //$table->foreign('why_id')->references('id')->on('why');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('why');
        Schema::dropIfExists('why_info');
    }
}
