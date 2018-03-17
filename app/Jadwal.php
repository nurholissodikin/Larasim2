<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    //
    protected $fillable = ['hari','jam','guru_id'];
    
    public function guru()
  {
    	return $this->belongsTo('App\Guru');
    }
}
