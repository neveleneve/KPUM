<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisimisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visimisi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gambar');
            $table->string('no_urut');
            $table->string('visi');
            $table->string('misi');
            $table->string('ketua');
            $table->string('nimketua');
            $table->string('jurusanketua');
            $table->string('angkatanketua');
            $table->string('wakil');
            $table->string('nimwakil');
            $table->string('jurusanwakil');
            $table->string('angkatanwakil');
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
        Schema::dropIfExists('visimisi');
    }
}
