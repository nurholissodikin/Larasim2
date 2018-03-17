<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    //
     protected $fillable = ['nama','kkm'];
    public function guru()
    {
    	return $this->hasMany('App\Guru');
    }
     public function nilai()
    {
    	return $this->hasMany('App\Nilai');
    }
}
