<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetoransTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('setorans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_setoran');
            $table->string('nis',8);
            $table->foreignId('id_surah')->constrained();
            $table->integer('ayat_mulai',3);
            $table->integer('ayat_berhenti',3);
            $table->foreignId('id_mentor')->constrained();
            $table->foreignId('id_murobi')->constrained();
            $table->text('keterangan');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('setorans', function (Blueprint $table) {
            //
        });
    }
}
