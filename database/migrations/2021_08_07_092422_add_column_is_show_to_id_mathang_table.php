<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIsShowToIdMathangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donhangs', function (Blueprint $table) {
            $table->string('id_mathang')->after('nguoimua')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donhangs', function (Blueprint $table) {
            $table->dropColumn('id_mathang');
        });
    }
}
