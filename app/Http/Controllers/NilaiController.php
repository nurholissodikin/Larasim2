<?php

namespace App\Http\Controllers;

use App\Nilai;
use App\Siswa;
use App\Pelajaran;
use Illuminate\Http\Request;
use Session;

class NilaiController extends Controller
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
          $nilai= Nilai::all();
           $pelajaran= Pelajaran::all();
        return view('nilai.index',compact('siswa','nilai','pelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $siswa= Siswa::all();
        
           $pelajaran= Pelajaran::all();
       return view('nilai.create')->with(compact('siswa','pelajaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $nilai = new Nilai;
        if ($request->a >= 0 && $request->a <= 100) {
           

        $nilai->nilai = $request ->a;
         $nilai->siswa_id = $request ->b;
          $nilai->pelajaran_id = $request ->c;
          $nilai->save();
        }
        else{
            Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Nilai Tidak Boleh Kurang dari 0 dan Tidak Lebih Dari 100",
            ]);
            return redirect()->route('nilai.create');
        }
        
 
        return redirect()->route('nilai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $nilai =  Nilai::findOrFail($id);
          $pelajaran =  Pelajaran::all();
         if ($nilai->nilai >= $nilai->pelajaran->kkm) {
             $a="Lulus";
         }
         else{
            $a="Tidak Lulus";
         }
        return view('nilai.show',compact('nilai','a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $nilai = Nilai::find($id);
          $siswa= Siswa::all();
          
           $pelajaran= Pelajaran::all();

        return view('nilai.edit')->with(compact('nilai','siswa','pelajaran'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $nilai= Nilai::findOrFail($id);
              if ($request->a >= 0 && $request->a <= 100) {
        $nilai->nilai = $request ->a;
         $nilai->siswa_id = $request ->b;
          $nilai->pelajaran_id = $request ->c;
          $nilai->save();
        }
        else{
            Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Nilai Tidak Boleh Kurang dari 0 dan Tidak Lebih Dari 100",
            ]);
            return redirect()->route('nilai.edit',$nilai->id);
        }
        return redirect()->route('nilai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $nilai = Nilai::findOrFail($id);
        $nilai ->delete();
         return redirect()->route('nilai.index');
    }
}
