<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_properties');
            $table->string('path');
            
            $table->foreign('id_properties')->references('id')->on('properties');
            $table->timestamps();
        });//class, 'foreignKey', 'localKey'
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties_images');
    }
}
