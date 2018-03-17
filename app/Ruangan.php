<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    //
    protected $fillable = ['kode','nama','lokasi'];

      public function kelas()
    {
    	return $this->hasMany('App\Kelas');
    }
}
