<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
     protected $fillable = ['nik','user_id','jk','alamat','nohp','pelajaran_id'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
         public function pelajaran()
    {
    	return $this->belongsTo('App\Pelajaran');
    }
     public function kelas()
    {
    	return $this->hasMany('App\Kelas');
    }
      public function jadwal()
    {
        return $this->hasMany('App\Jadwal');
    }
}
