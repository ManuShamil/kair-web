<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeImageDatatype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement("ALTER TABLE `department_images` MODIFY `image` LONGBLOB");
        DB::statement("ALTER TABLE `testimonials` MODIFY `image` LONGBLOB");

        Schema::table('treatments', function(Blueprint $table) {
            $table->renameColumn('images', 'image');
        });

        DB::statement("ALTER TABLE `treatments` MODIFY `image` LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE `department_images` MODIFY `image` BLOB");
        DB::statement("ALTER TABLE `testimonials` MODIFY `image` BLOB");

        Schema::table('treatments', function(Blueprint $table) {
            $table->renameColumn('image', 'images');
        });

        DB::statement("ALTER TABLE `treatments` MODIFY `image` BLOB");
    }
}
