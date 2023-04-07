<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEntreOssuariosTable extends Migration
{
    public function up()
    {
        Schema::table('entre_ossuarios', function (Blueprint $table) {
            $table->unsignedBigInteger('responsavel_id')->nullable();
            $table->foreign('responsavel_id', 'responsavel_fk_6313842')->references('id')->on('solicitantes');
            $table->unsignedBigInteger('falecido_id')->nullable();
            $table->foreign('falecido_id', 'falecido_fk_6313843')->references('id')->on('obitos');
            $table->unsignedBigInteger('cemiterio_id')->nullable();
            $table->foreign('cemiterio_id', 'cemiterio_fk_6313844')->references('id')->on('cemiterios');
            $table->unsignedBigInteger('ossuario_id')->nullable();
            $table->foreign('ossuario_id', 'ossuario_fk_6313845')->references('id')->on('ossuarios');
            $table->unsignedBigInteger('gaveta_id')->nullable();
            $table->foreign('gaveta_id', 'gaveta_fk_6313846')->references('id')->on('gaveta');
            $table->unsignedBigInteger('cemiterio_de_destino_id')->nullable();
            $table->foreign('cemiterio_de_destino_id', 'cemiterio_de_destino_fk_6313849')->references('id')->on('cemiterios');
            $table->unsignedBigInteger('ossuario_de_destino_id')->nullable();
            $table->foreign('ossuario_de_destino_id', 'ossuario_de_destino_fk_6313850')->references('id')->on('ossuarios');
            $table->unsignedBigInteger('assinatura_id')->nullable();
            $table->foreign('assinatura_id', 'assinatura_fk_6313877')->references('id')->on('users');
        });
    }
}
