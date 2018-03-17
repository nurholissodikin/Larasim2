<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Kelas;
use App\Jurusan;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
           $siswa= Siswa::all();
          $kelas= Kelas::all();
           $jurusan= Jurusan::all();

        return view('siswa.index',compact('siswa','kelas','jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //\
      
        $siswa = new Siswa;
        $siswa ->nis = $request ->a;
         $siswa ->nama = $request ->b;
          $siswa ->jk = $request ->c;
           $siswa ->alamat = $request ->d;
            $siswa ->nohp = $request ->e;
             $siswa ->namaortu = $request ->o;
             $siswa ->nohportu = $request ->hp;
        $siswa ->kelas_id = $request ->f;
        $siswa ->jurusan_id = $request ->g;
 $siswa ->save();
        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       
        $siswa= Siswa::findOrFail($id);
             $siswa ->nis = $request ->a;
         $siswa ->nama = $request ->b;
          $siswa ->jk = $request ->c;
           $siswa ->alamat = $request ->d;
            $siswa ->nohp = $request ->e;
             $siswa ->namaortu = $request ->o;
              $siswa ->nohportu = $request ->hp;
        $siswa ->kelas_id = $request ->f;
        $siswa ->jurusan_id = $request ->g;
  $siswa ->save();
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
          $siswa = Siswa::findOrFail($id);
        $siswa ->delete();
         return redirect()->route('siswa.index');
    }
     public function kelasAjax($id){
        if($id==0){
            $siswa = Siswa::all();
        }else{
            $siswa = Siswa::where('kelas_id','=',$id)->get();
        }
        return $siswa;
    }
}
