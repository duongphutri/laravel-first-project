<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaogiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baogias', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('chungloai');
            $table->string('hang');
            $table->integer('soluong');
            $table->text('thongtin');
            $table->integer('dongia');
            $table->text('ghichu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baogias');
    }
}
