<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hows', function(Blueprint $table) {
            DB::statement("ALTER TABLE `hows` MODIFY `image` LONGBLOB");
        });

        Schema::table('how_info', function(Blueprint $table) {
            $table->foreign('how_id')->references('id')->on('hows');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hows', function(Blueprint $table) {
            DB::statement("ALTER TABLE `hows` MODIFY `image` BLOB");
        });

        
        Schema::table('how_info', function(Blueprint $table) {
            $table->dropForeign('how_info_how_id_foreign');
        });
    }
}
