<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    //
     protected $fillable = ['keterangan','tanggal','kelas_id','siswa_id'];

     public function siswa()
  {
    	return $this->belongsTo('App\Siswa');
    }
     public function kelas()
  {
    	return $this->belongsTo('App\Kelas');
    }
}
