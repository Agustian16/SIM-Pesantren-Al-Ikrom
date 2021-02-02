<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantrisTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('santris', function (Blueprint $table) {
            $table->id();
            $table->string('nama',50);
            $table->string('tingkat',3);
            $table->string('id_rayon',2);
            $table->string('alamat',255);
            $table->string('ayah',50);
            $table->string('ibu',50);
            $table->string('no_telp',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('santris', function (Blueprint $table) {
            //
        });
    }
}
