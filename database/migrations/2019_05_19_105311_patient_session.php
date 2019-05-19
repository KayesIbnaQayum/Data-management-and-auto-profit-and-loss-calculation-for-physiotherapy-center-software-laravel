<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PatientSession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_session', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('patient_id');
            $table->integer('therapist_id');
            $table->integer('rate');
            $table->date('session_date');
            $table->text('session_time'); /* 0 = morning, 1 = evening, 2 = night*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_session');
    }
}
