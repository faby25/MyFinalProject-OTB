<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lectura_id');//->references('id')->on('lecturas')->unsigned();
            $table->text('detalle');//->nullable();
            $table->string('multaMorosidad');
            $table->boolean('pagado')->default(false);
            $table->timestamps();
            $table->Date('fechaVencimiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notices');
    }
}
