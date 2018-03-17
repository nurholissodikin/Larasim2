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
          <div >@role('karyawan')<a class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Tambah Data</a>
              @endrole</div>
        <div class="row">

          <div class="col-md-12">
            <div class="card">
               
              <div class="card-body">

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
                          
                        <form action="{{route('pembayaran.destroy',$data->id)}}" method="post">

                                <input name="_method" type="hidden" value="DELETE">
                                <input name="_token" type="hidden">
                                 </td>@role('karyawan')
                            <td>
                                <a data-toggle="modal" data-target="#edit{{$data->id}}" type="submit" class="btn btn-warning"><i class="fa fa-edit"> Ubah</i></a>
                               <input class="btn btn-danger" type="submit" value="Hapus"> 
                                {{csrf_field()}}
                            </td>@endrole
                        </form>
                               
                           
                        </tr>
                         @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header btn-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Isi Data Pembayaran</h4>
              </div>
              <div class="modal-body">
              
         <form action="{{route('pembayaran.store')}}" method="post" >
                  {{csrf_field()}}

                    <div class="form-group">
                  <label class="control_label">Tanggal</label>
                  <input type="date" name="a" class="form-control" required="">
                  </div>  

                    <div class="form-group">
                  <label class="control_label">Jumlah Bayar</label>
                  <input type="text" name="b" class="form-control" required="">
                  </div> 

                
                   <div class="form-group">
                  <label class="control_label">Nama Siswa</label>
                  <select type="text" name="c" class="form-control" >
                  @foreach($siswa as $data)
                  <option value="{{$data->id}}">{{$data->nama}}</option>
                  @endforeach
                  </select>

                  </div>                                    
               
               
              </div>
              <div class="modal-footer">
               
                <div class="pull-right">
                <button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                  </form>
              </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
 @foreach($pembayaran as $data)
        <div class="modal fade" id="edit{{$data->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header btn-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Data Pembayaran</h4>
              </div>
              <div class="modal-body">
              
         <form action="{{route('pembayaran.update',$data->id)}}" method="POST" >
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                  <label class="control_label">Tanggal</label>
                  <input type="text" name="a" class="form-control" value="{{$data->tgl}}">
                  </div>

                  <div class="form-group">
                  <label class="control_label">Jumlah Bayar</label>
                  <input type="text" name="b" class="form-control" value="{{$data->jumlahbayar}}">
                  </div>  

                 <div class="form-group">
                  <label class="control_label">Nama Siswa</label>
                  <select type="text" name="c" class="form-control" >
                  @foreach($siswa as $data)
                  <option value="{{$data->id}}">{{$data->nama}}</option>
                  @endforeach
                  </select>

                  </div>  
               
           
              <div class="modal-footer">
               
                <div class="pull-right">
                <button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                  </form>
              </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        
        
@endforeach
       
@endsection
