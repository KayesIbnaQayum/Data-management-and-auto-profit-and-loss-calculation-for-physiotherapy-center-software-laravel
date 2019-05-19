<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docInfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->String('name');
            $table->mediumInteger('mobile');
             $table->longText('address');
                 $table->mediumInteger('NID')->nullable();
                 $table->date('joined')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docInfo');
    }
}