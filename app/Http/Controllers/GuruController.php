<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Role;
use App\User;
use App\Pelajaran;
use Validator;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $guru= Guru::all();
          $user= User::all();
          $pelajaran= Pelajaran::all();
        return view('guru.index',compact('guru','user','pelajaran'));
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
        
         $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

         $guru = new Guru;
        $guru ->nik = $request ->a;
        $guru->user_id = $user->id;
          $guru ->jk = $request ->c;
           $guru ->alamat = $request ->d;
            $guru ->nohp = $request ->e;
        $guru ->pelajaran_id = $request ->f;
 $guru ->save();
  $userRole = Role::where('name','guru')->first();
        $user->attachRole($userRole);
        return redirect()->route('guru.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
          $guru= Guru::findOrFail($id);
           $user= User::all();
        $pelajaran=Pelajaran::all();
        return view('guru.edit',compact('guru','pelajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
        //
    {
       
         $guru= Guru::findOrFail($id);
            $guru ->nik = $request ->a;
        
          $guru ->jk = $request ->c;
           $guru ->alamat = $request ->d;
            $guru ->nohp = $request ->e;
        $guru ->pelajaran_id = $request ->f;
  $guru ->save();
        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
         $guru = Guru::findOrFail($id);
        $guru ->delete();
         return redirect()->route('guru.index');
    }
}
