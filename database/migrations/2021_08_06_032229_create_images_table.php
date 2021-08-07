<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('file_nm')->nullable();              //file name khong trung + extension
            $table->string('file_cd')->nullable();              //file name khong trung
            $table->string('file_origin')->nullable();          // Ten file goc
            $table->string('imageable_id')->nullable();         // Id chua anh
            $table->string('imageable_object')->nullable();     // Model chua anh
            $table->string('size')->nullable();
            $table->string('file_type')->nullable();
            $table->string('created_by')->nullable();
            $table->string('order')->nullable();
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
        Schema::dropIfExists('images');
    }
}
