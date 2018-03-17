<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    //
    protected $fillable = ['nilai','pelajaran_id','siswa_id'];
    
    public function pelajaran()
  {
    	return $this->belongsTo('App\Pelajaran');
    }
     public function siswa()
  {
    	return $this->belongsTo('App\Siswa');
    }
}
