<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
         $table->increments('id');
            $table->string('nik');
           $table->integer('user_id')->unsigned()->unique();
            $table->string('jk');
            $table->string('alamat');
            $table->string('nohp');
             $table->integer('pelajaran_id')->unsigned();
            $table->timestamps();
        });
         Schema::table('gurus', function($table) {

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('pelajaran_id')->references('id')->on('pelajarans')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gurus');
    }
}
