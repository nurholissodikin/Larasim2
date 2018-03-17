<?php

namespace App\Http\Controllers;

use App\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $ruangan= Ruangan::all();
         return view('ruangan.index',compact('ruangan'));
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
        
          $ruangan = new Ruangan;
        $ruangan ->kode = $request ->a;
          $ruangan ->nama = $request ->b;
            $ruangan ->lokasi = $request ->c;
 $ruangan ->save();
        return redirect()->route('ruangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
           $ruangan= Ruangan::findOrFail($id);
        return view('ruangan.edit',compact('ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, ['kode' => 'required|unique:ruangans']);
         $ruangan= Ruangan::findOrFail($id);
      $ruangan ->kode = $request ->a;
          $ruangan ->nama = $request ->b;
            $ruangan ->lokasi = $request ->c;
  $ruangan ->save();
        return redirect()->route('ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
         $ruangan = Ruangan::findOrFail($id);
        $ruangan ->delete();
         return redirect()->route('ruangan.index');
    }
}
