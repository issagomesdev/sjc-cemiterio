<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToParaLotesTable extends Migration
{
    public function up()
    {
        Schema::table('para_lotes', function (Blueprint $table) {
            $table->unsignedBigInteger('responsavel_id')->nullable();
            $table->foreign('responsavel_id', 'responsavel_fk_6313858')->references('id')->on('solicitantes');
            $table->unsignedBigInteger('falecido_id')->nullable();
            $table->foreign('falecido_id', 'falecido_fk_6313859')->references('id')->on('obitos');
            $table->unsignedBigInteger('cemiterio_id')->nullable();
            $table->foreign('cemiterio_id', 'cemiterio_fk_6313860')->references('id')->on('cemiterios');
            $table->unsignedBigInteger('ossuario_id')->nullable();
            $table->foreign('ossuario_id', 'ossuario_fk_6313861')->references('id')->on('ossuarios');
            $table->unsignedBigInteger('gaveta_id')->nullable();
            $table->foreign('gaveta_id', 'gaveta_fk_6313862')->references('id')->on('gaveta');
            $table->unsignedBigInteger('cemiterio_de_destino_id')->nullable();
            $table->foreign('cemiterio_de_destino_id', 'cemiterio_de_destino_fk_6313863')->references('id')->on('cemiterios');
            $table->unsignedBigInteger('setor_de_destino_id')->nullable();
            $table->foreign('setor_de_destino_id', 'setor_de_destino_fk_6313864')->references('id')->on('setores');
            $table->unsignedBigInteger('lote_de_destino_id')->nullable();
            $table->foreign('lote_de_destino_id', 'lote_de_destino_fk_6313866')->references('id')->on('lotes');
            $table->unsignedBigInteger('assinatura_id')->nullable();
            $table->foreign('assinatura_id', 'assinatura_fk_6313876')->references('id')->on('users');
        });
    }
}
