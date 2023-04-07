<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreOssuarioGavetumPivotTable extends Migration
{
    public function up()
    {
        Schema::create('entre_ossuario_gavetum', function (Blueprint $table) {
            $table->unsignedBigInteger('entre_ossuario_id');
            $table->foreign('entre_ossuario_id', 'entre_ossuario_id_fk_6313851')->references('id')->on('entre_ossuarios')->onDelete('cascade');
            $table->unsignedBigInteger('gavetum_id');
            $table->foreign('gavetum_id', 'gavetum_id_fk_6313851')->references('id')->on('gaveta')->onDelete('cascade');
        });
    }
}
