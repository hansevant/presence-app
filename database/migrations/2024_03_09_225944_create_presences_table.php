<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('material_id');
            $table->string('assistant_id');
            $table->unsignedBigInteger('code_id');
            $table->string('teaching_role');
            $table->date('date');
            $table->time('start');
            $table->time('end')->nullable();
            $table->integer('duration')->nullable();
            $table->timestamps();

            // $table->foreign('class_id')->references('id')->on('lab_classes')->onDelete('cascade');
            // $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
            // $table->foreign('assistant_id')->references('assistant_id')->on('users')->onDelete('cascade');
            $table->foreign('code_id')->references('id')->on('codes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presences');
    }
}
