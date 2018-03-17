<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nis');
            $table->string('nama');
            $table->string('jk');
            $table->string('alamat');
            $table->string('nohp');
            $table->string('namaortu');
             $table->string('nohportu');
             $table->integer('kelas_id')->unsigned();
                $table->integer('jurusan_id')->unsigned();
            $table->timestamps();
        });
         Schema::table('siswas', function($table) {

            $table->foreign('kelas_id')->references('id')->on('kelas')->onUpdate('cascade')->onDelete('restrict');

 $table->foreign('jurusan_id')->references('id')->on('jurusans')->onUpdate('cascade')->onDelete('restrict');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
