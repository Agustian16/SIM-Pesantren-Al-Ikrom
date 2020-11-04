<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerseStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verse_status', function (Blueprint $table) {
            $table->id();
            $table->uuid('student_id')->nullable();
            $table->integer('juz_number');
            $table->integer('chapter_number');
            $table->integer('verse_number');
            $table->integer('score')->nullable();
            $table->text('note')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('verse_status');
    }
}
