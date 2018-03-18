@extends('layouts.a')

@section('content')

  <div class="row">

          <div class="col-md-12">
            <div class="card">
               
              <div class="card-body">

                
              <center><h3>Laporan Pembayaran</h3><br>
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
               <div class="row hidden-print mt-20">
                  <div class="col-xs-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
                </div>
            </div>

          </div>
        </div>
                  
    
   
@endsection
