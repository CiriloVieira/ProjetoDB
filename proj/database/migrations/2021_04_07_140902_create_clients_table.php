<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
{
    Schema::create('clients', function (Blueprint $table) {
        $table->id();
        $table->string('razao_social');
        $table->string('dt_pagamento');
        $table->string('vlr_recorrente');
        $table->timestamp('expire_date');
        $table->string('limit_logins');
        $table->boolean('active')->nullable();
        $table->string('admin_mail')->nullable();


        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
