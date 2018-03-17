<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
     protected $fillable = ['nama','guru_id','ruangan_id'];
    
    public function guru()
  {
    	return $this->belongsTo('App\Guru');
    }
     public function ruangan()
  {
    	return $this->belongsTo('App\Ruangan');
    }
     public function absensi()
    {
      return $this->hasMany('App\absensi');
    }
}
