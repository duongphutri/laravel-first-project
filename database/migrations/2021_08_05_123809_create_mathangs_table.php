<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMathangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mathangs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_category');
            $table->string('name');
            $table->integer('gia');
            $table->integer('is_sale');
            $table->integer('is_hot');
            $table->integer('is_new');
            $table->integer('is_show');
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
        Schema::dropIfExists('mathangs');
    }
}
