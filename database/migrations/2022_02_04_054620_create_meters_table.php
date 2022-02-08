<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('meters', function (Blueprint $table) {
          //$table->engine="InnoDB";
          $table->id();
          $table->foreignId('user_id');//->references('id')->on('users')->onDelete('cascade')->unsigned();
          $table->string('nombre',25);
          $table->string('direccion',100);
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meters');
    }
}
