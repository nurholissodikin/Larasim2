<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Guru;
use App\Ruangan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $kelas= Kelas::all();
         $guru= Guru::all();
          $ruangan= Ruangan::all();
        return view('kelas.index',compact('kelas','guru','ruangan'));
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
        //
          $kelas = new Kelas;
         $kelas ->nama = $request ->a;
        $kelas ->guru_id = $request ->b;
        $kelas ->ruangan_id = $request ->c;
 $kelas ->save();
        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $kelas= Kelas::findOrFail($id);
            $kelas ->nama = $request ->a;
        $kelas ->guru_id = $request ->b;
        $kelas ->ruangan_id = $request ->c;
 $kelas ->save();
        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
            $kelas = Kelas::findOrFail($id);
        $kelas ->delete();
         return redirect()->route('guru.index');
    }
}
