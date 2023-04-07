<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParaLotesTable extends Migration
{
    public function up()
    {
        Schema::create('para_lotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data_de_transferencia')->nullable();
            $table->longText('observacoes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
