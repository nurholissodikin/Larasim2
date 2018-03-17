@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-th-list"></i> Data Pembayaran</h1>
          
          </div>
          <div>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li class="active">Data Pembayaran</li>
            </ul>
          </div>
        </div>
         
        <div class="row">

          <div class="col-md-12">
            <div class="card">
               
              <div class="card-body">
              <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
              <center><h3>Laporan Pembelian</h3><br>
                <h6>Dari tanggal {{$a}} sampai tanggal {{$b}}</h6></center>
                  

                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                    
                      <th>Tanggal</th>
                      <th>Jumlah Bayar</th>
                        <th>Nama Siswa</th>
                        <th>Karyawan</th>@role('karyawan')
                    <th >Aksi</th>
@endrole
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($pembayaran as $data)
                        <tr>
                          
                            <td>{{$data->tgl}}</td>
                            <td>{{$data->jumlahbayar}}</td>
                            <td>{{$data->siswa->nama}}</td>
                            <td>{{ Auth::user()->name }}</td>
                             <td>Rp.{{number_format($data->jumlahbayar)}}</td>
                          
                      
                        </tr>
                        </tbody>
                         @endforeach
                         <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td><b>Total : </b></td>
                           <td><b>Rp.{{number_format($sum)}}</b></td>
                         </tr>
                  
                </table>
              </div>
            </div>
          </div>
        </div>
                  
       
@endsection
