<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('databases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path_name');
            $table->string('db_name');
            $table->string('pass_db');
            $table->string('user_db');
            $table->boolean('last_revision')->nullable();
            $table->string('homologation')->nullable();
            $table->string('logo_login')->nullable();

            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');

            //created at e update at
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
        Schema::dropIfExists('databases');
    }
}
