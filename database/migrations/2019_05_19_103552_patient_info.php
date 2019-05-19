<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PatientInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('patientInfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->String('name');
            $table->mediumInteger('mobile');
            $table->longText('profession')->nullable();
            $table->longText('address');
              $table->integer('resposible_doc');
              $table->integer('room_no')->nullable();
               $table->longText('wc')->nullable();
            $table->mediumInteger('NID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
          Schema::dropIfExists('patientInfo');
    }
}
