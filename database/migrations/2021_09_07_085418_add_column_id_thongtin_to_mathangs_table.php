<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIdThongtinToMathangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mathangs', function (Blueprint $table) {
            $table->integer('id_thongtin')->after('id_product')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mathangs', function (Blueprint $table) {
            $table->dropColumn('id_thongtin');
            
        });
    }
}
