@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-th-list"></i> Data Nilai</h1>
          
          </div>
          <div>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li class="active">Data Nilai</li>
            </ul>
          </div>
        </div>
          <div ><a class="btn btn-primary" href="{{ route('nilai.create')}}"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
        <div class="row">

          <div class="col-md-12">
            <div class="card">
               
              <div class="card-body">

                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                    
                      <th>Nama siswa</th>
                      <th>kelas</th>
                      <th>Pelajaran</th>
                        
                    <th >Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                   @foreach($nilai as $data)
                        <tr>
                          
                            <td>{{$data->siswa->nama}}</td>
                             <td>{{$data->siswa->kelas->nama}}</td>
                            <td>{{$data->pelajaran->nama}}</td>
                          
                          
                        <form action="{{route('nilai.destroy',$data->id)}}" method="post">

                                <input name="_method" type="hidden" value="DELETE">
                                <input name="_token" type="hidden">
                                 </td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('nilai.edit',$data->id)}}"><i class="fa fa-edit"> Ubah</i></a>
                               <input class="btn btn-danger" onclick=" return confirm('Apakah anda yakin akan menghapus data ?');" type="submit" value="Hapus">
                                <a class="btn btn-primary" href="{{ route('nilai.show',$data->id)}}"><i class="fa fa-info"> Detail</i></a> 
                                {{csrf_field()}}
                            </td>
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
   
       
@endsection
