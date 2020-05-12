<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterWhyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('why', function(Blueprint $table) {
            DB::statement("ALTER TABLE `why` MODIFY `image` LONGBLOB");
        });

        Schema::table('why_info', function(Blueprint $table) {
            $table->foreign('why_id')->references('id')->on('why');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('why', function(Blueprint $table) {
            DB::statement("ALTER TABLE `why` MODIFY `image` BLOB");
        });

        
        Schema::table('why_info', function(Blueprint $table) {
            $table->dropForeign('why_info_why_id_foreign');
        });
    }
}
