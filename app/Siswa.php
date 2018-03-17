<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    protected $fillable = ['nis','nama','jk','alamat','nohp','namaortu','nohportu','kelas_id','jurusan_id'];
    
    public function kelas()
  {
    	return $this->belongsTo('App\Kelas');
    }
     public function jurusan()
  {
    	return $this->belongsTo('App\Jurusan');
    }
     public function nilai()
    {
      return $this->hasMany('App\Nilai');
    }

 public function pembayaran()
    {
      return $this->hasMany('App\Pembayaran');
    }
    public function absensi()
    {
      return $this->hasMany('App\absensi');
    }
}
