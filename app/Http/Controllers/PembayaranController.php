<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\Siswa;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $pembayaran= Pembayaran::all();
          $siswa= Siswa::all();
        return view('pembayaran.index',compact('pembayaran','siswa'));
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
         $pembayaran = new Pembayaran;
        $pembayaran ->tgl = $request ->a;
         $pembayaran ->jumlahbayar = $request ->b;
          $pembayaran ->siswa_id = $request ->c;
         
 $pembayaran ->save();
        return redirect()->route('pembayaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
          $pembayaran= Pembayaran::findOrFail($id);
        $pembayaran ->tgl = $request ->a;
         $pembayaran ->jumlahbayar = $request ->b;
          $pembayaran ->siswa_id = $request ->c;
  $pembayaran ->save();
        return redirect()->route('pembayaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
          $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran ->delete();
         return redirect()->route('pembayaran.index');
    }
}
