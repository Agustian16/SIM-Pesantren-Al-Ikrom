<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurahsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_surah',25);
            $table->string('jenis_surah',10);
            $table->string('arti_surah',25);
            $table->integer('jml_ayat',3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surahs', function (Blueprint $table) {
            //
        });
    }
}
