@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-th-list"></i> Data Jurusan</h1>
          
          </div>
          <div>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="{{ url('/admin/jurusan') }}">Data Jurusan</a></li>
              <li class="active">Ubah Data Jurusan</li>
            </ul>
          </div>
        </div>
<div class="row">

          <div class="col-md-12">
            <div class="card">
               
              <div class="card-body">
                <div class="panel-heading btn-primary">Data jurusan
                <div class="panel-title pull-right">
                <a href="{{ URL::previous() }}">Kembali</a></div></div>

                 <div class="panel-body">
              <form action="{{route('jurusan.update',$jurusan->id)}}" method="POST" >
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group">
                  <label class="control_label">Nama jurusan</label>
                  <input type="text" name="a" class="form-control" required="" value="{{$jurusan->nama}}">
                  </div>
                    
               <div class="pull-right">
                <button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
              </div>
                  </div>
                      </div>              
              </form>
                  
                </div>

             
                </div>
                </div>
            </div>
        </div>
   
@endsection