<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mentors', function (Blueprint $table) {
            $table->integer('id_mentor',3);
            $table->integer('nis',8);
            $table->string('nama',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mentors', function (Blueprint $table) {
            //
        });
    }
}
