<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     * 'id_properite',
        'expensetype',
        'classexpense',
        'includedate',
        'expiredate',
        'paymentdate',
        'compentece',
        'value',
        'observations'
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_propertie');
            $table->string('expensetype');
            $table->string('classexpense');
            $table->date('includedate');
            $table->date('expiredate');
            $table->date('paymentdate')->nullable();
            $table->date('competence');
            $table->string('value');
            $table->text('observations')->nullable();
            $table->timestamps();

            $table->foreign('id_propertie')->references('id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
