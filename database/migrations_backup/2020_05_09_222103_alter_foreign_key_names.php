<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterForeignKeyNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tables = array('department_images', 'department_info');

        for ($i=0; $i < count($tables); $i++) {      
            Schema::table($tables[$i], function (Blueprint $table) {   
                $table->renameColumn('dept_id', 'department_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables = array('department_images', 'department_info');

        for ($i=0; $i < count($tables); $i++) {       
            Schema::table($tables[$i], function (Blueprint $table) {     
                $table->renameColumn('department_id', 'dept_id');
            });
        }
    }
}
