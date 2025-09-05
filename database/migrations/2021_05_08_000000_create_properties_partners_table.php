<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties_partners', function (Blueprint $table) {
            $table->id();
            /*$table->foreignId('associate_id')->constrained();
            $table->foreignId('propertie_id')->constrained();
            $table->string('partial_value');*/            
            $table->unsignedBigInteger('properties');
            $table->unsignedBigInteger('partners');
            $table->bigInteger('partial_value')->nullable();
            $table->boolean('manager')->nullable();

            $table->foreign('properties')->references('id')->on('properties');
            $table->foreign('partners')->references('id')->on('partners');
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
        Schema::dropIfExists('properties_partners');
    }
}
