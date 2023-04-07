<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreOssuariosTable extends Migration
{
    public function up()
    {
        Schema::create('entre_ossuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_de_destino')->nullable();
            $table->string('destino')->nullable();
            $table->date('data_de_transferencia')->nullable();
            $table->longText('observacoes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
