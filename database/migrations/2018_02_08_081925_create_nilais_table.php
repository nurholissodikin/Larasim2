<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
           $table->increments('id');
            $table->string('nilai');
            $table->integer('pelajaran_id')->unsigned();
            $table->integer('siswa_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('nilais', function($table) {

            $table->foreign('pelajaran_id')->references('id')->on('pelajarans')->onUpdate('cascade')->onDelete('restrict');
             $table->foreign('siswa_id')->references('id')->on('pelajarans')->onUpdate('cascade')->onDelete('restrict');
           
        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilais');
    }
}
