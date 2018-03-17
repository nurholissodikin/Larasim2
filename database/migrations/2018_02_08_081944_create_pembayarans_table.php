<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->increments('id');
             $table->date('tgl');
            $table->string('jumlahbayar');
             $table->integer('siswa_id')->unsigned();
            $table->timestamps();
        });
         Schema::table('pembayarans', function($table) {

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
        Schema::dropIfExists('pembayarans');
    }
}
