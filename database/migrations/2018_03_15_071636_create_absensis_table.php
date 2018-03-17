<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('keterangan');
             $table->date('tanggal');
             $table->integer('siswa_id')->unsigned();
             $table->integer('kelas_id')->unsigned();
            $table->timestamps();
        });
         Schema::table('absensis', function($table) {

            $table->foreign('siswa_id')->references('id')->on('siswas')->onUpdate('cascade')->onDelete('restrict');
             $table->foreign('kelas_id')->references('id')->on('kelas')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensis');
    }
}
