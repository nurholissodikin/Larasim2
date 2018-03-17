<?php

namespace App\Http\Controllers;

use App\Pembayaran;

use App\Rekap;
use PDF;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pembayaran = Pembayaran::all();
        return view('rekap.index', compact('pembayaran'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function show(Rekap $rekap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekap $rekap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekap $rekap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekap $rekap)
    {
        //
    }
public function index3(Request $request){
    $a=$request->a;
    $b=$request->b;
    $pembayaran = Pembayaran::whereBetween('created_at', [$a,$b])->get();
    $sum = $pembayaran->sum('jumlahbayar');
   return view('rekap.pembayaran2',compact('pembayaran','a','b','sum'));
}
public function index2(Request $request){
    $a=$request->a;
    $b=$request->b;
    $pembayaran = Pembayaran::whereBetween('created_at', [$a,$b])->get();
    $sum = $pembayaran->sum('jumlahbayar');
    $pdf = PDF::loadView('rekap/pembayaran3', compact('pembayaran','a','b','sum'));
   return $pdf->download('laporanpembayaran.pdf');
}
}
