<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParaLoteQuadraPivotTable extends Migration
{
    public function up()
    {
        Schema::create('para_lote_quadra', function (Blueprint $table) {
            $table->unsignedBigInteger('para_lote_id');
            $table->foreign('para_lote_id', 'para_lote_id_fk_6313865')->references('id')->on('para_lotes')->onDelete('cascade');
            $table->unsignedBigInteger('quadra_id');
            $table->foreign('quadra_id', 'quadra_id_fk_6313865')->references('id')->on('quadras')->onDelete('cascade');
        });
    }
}
