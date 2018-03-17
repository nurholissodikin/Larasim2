<?php

namespace App\Http\Controllers;

use App\Pelajaran;
use Illuminate\Http\Request;
use Alert;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $pelajaran= Pelajaran::all();
         return view('pelajaran.index',compact('pelajaran'));
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
          $pelajaran = new Pelajaran;
        $pelajaran ->nama = $request ->a;
          $pelajaran ->kkm = $request ->b;
           
 $pelajaran ->save();
 Alert::success('Success Message', 'Optional Title');
        return redirect()->route('pelajaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pelajaran $pelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
         $pelajaran= Pelajaran::findOrFail($id);
        return view('pelajaran.edit',compact('pelajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
         $pelajaran= Pelajaran::findOrFail($id);
      $pelajaran ->nama = $request ->a;
          $pelajaran ->kkm = $request ->b;
  $pelajaran ->save();
        return redirect()->route('pelajaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
          $pelajaran = Pelajaran::findOrFail($id);
        $pelajaran ->delete();
         return redirect()->route('pelajaran.index');
    }
}
