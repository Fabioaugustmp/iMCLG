<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('realestate');
            $table->string('statusproperties');
            $table->string('cep');
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('areatotal');
            $table->string('areaconstruida')->nullable();
            $table->string('valorvenal');
            $table->string('valordaaquisicao');
            $table->date('dataaquisicao');
            $table->string('valordevenda')->nullable();
            $table->date('dataavaliacao')->nullable();
            $table->string('construction');
            $table->string('company');
            $table->text('feedback')->nullable();
            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
