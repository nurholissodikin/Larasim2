<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Guru;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
           $jadwal= Jadwal::all();
          $guru= Guru::all();
        return view('jadwal.index',compact('guru','jadwal'));
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
         $jadwal = new Jadwal;
        $jadwal ->hari = $request ->a;
         $jadwal ->jam = $request ->b;
        $jadwal ->guru_id = $request ->c;
 $jadwal ->save();
        return redirect()->route('jadwal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
         $jadwal= Jadwal::findOrFail($id);
            $jadwal ->hari = $request ->a;
         $jadwal ->jam = $request ->b;
        $jadwal ->guru_id = $request ->c;
  $jadwal ->save();
        return redirect()->route('jadwal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $jadwal = Jadwal::findOrFail($id);
        $jadwal ->delete();
         return redirect()->route('jadwal.index');
    }
}
