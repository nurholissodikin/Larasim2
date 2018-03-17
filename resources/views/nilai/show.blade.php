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
          
        <div class="row">

          <div class="col-md-12">
            <div class="card">
               
              <div class="card-body">

               <form action="{{route('nilai.update',$nilai->id)}}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                 
                  <div class="form-group">
                  <label class="control_label">Nama </label>
                  <input type="text" name="a" class="form-control" required="" value="{{$nilai->siswa->nama}}" readonly="">
                  </div>
                  <div class="form-group">
                  <label class="control_label">Kelas </label>
                  <input type="text" name="a" class="form-control" required="" value=" {{$nilai->siswa->kelas->nama}}" readonly="">
                  </div>
                  <div class="form-group">
                  <label class="control_label">Nama Pelajaran </label>
                  <input type="text" name="a" class="form-control" required="" value=" {{$nilai->pelajaran->nama}}" readonly="">
                  </div>
                  <div class="form-group">
                  <label class="control_label">KKM </label>
                  <input type="text" name="a" class="form-control" required="" value=" {{$nilai->pelajaran->kkm}}" readonly="">
                  </div>
                  <div class="form-group">
                  <label class="control_label">Nilai </label>
                  <input type="text" name="a" class="form-control" required="" value=" {{$nilai->nilai}}" readonly="">
                  </div>
                   <div class="form-group">
                  <label class="control_label">Keterangan </label>
                  <input type="text"  class="form-control" required="" value=" {{$a}}" readonly="">
                  </div>
        


                 
                                    
              </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
