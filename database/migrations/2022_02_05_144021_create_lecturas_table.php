<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('lecturas', function (Blueprint $table) {
        //     $table->engine = 'InnoDB';
        //     $table->id();
        //     //$table->foreignId('meter_id');//->references('id')->on('meters')->onDelete('cascade');
        //     // $table->foreignId('meter_id')
        //     $table->foreign('meter_id')->references('id')->on('meters')->unsigned();;
        //
        //     $table->string('detalle');
        //     $table->decimal('LecturaANT');
        //     $table->decimal('LecturaACT');
        //     // $table->decimal('LecturaCubos');
        //     $table->decimal('TotalCubos');
        //     $table->timestamps();
        // });

        Schema::create('lecturas', function (Blueprint $table) {
            //$table->engine="InnoDB";
            $table->id();
            $table->foreignId('meter_id');//->references('id')->on('meters')->onDelete('cascade')->unsigned();
            $table->integer('lectura');
            $table->integer('consumo');
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
        Schema::dropIfExists('lecturas');
    }
}
