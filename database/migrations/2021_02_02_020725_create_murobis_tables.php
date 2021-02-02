<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMurobisTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('murobis', function (Blueprint $table) {
            $table->integer('id_murobi',3);
            $table->string('nama_murobi',50);
            $table->string('username',8);
            $table->string('password',16);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('murobis', function (Blueprint $table) {
            //
        });
    }
}
