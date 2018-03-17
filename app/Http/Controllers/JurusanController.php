<?php

namespace App\Http\Controllers;

use App\Jurusan;
use Illuminate\Http\Request;
use Alert;


class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
           
          $jurusan= Jurusan::all();
         return view('jurusan.index',compact('jurusan'));
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
        
          $jurusan = new Jurusan;
        $jurusan ->nama = $request ->a;
        
 $jurusan ->save();
     Alert::success($jurusan->nama .'Berhasil Disimpan');
        return redirect()->route('jurusan.index')->with('alert-success', 'Data Berhasil Disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
          $jurusan= Jurusan::findOrFail($id);
        return view('jurusan.edit',compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
         $jurusan= Jurusan::findOrFail($id);
        $jurusan ->nama = $request ->a;
  $jurusan ->save();
        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $jurusan = Jurusan::findOrFail($id);
        $jurusan ->delete();
         return redirect()->route('jurusan.index');
    }
}
