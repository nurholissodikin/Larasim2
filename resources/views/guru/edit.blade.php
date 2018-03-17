@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-th-list"></i> Data Guru</h1>
          
          </div>
          <div>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li class="active">Data Guru</li>
            </ul>
          </div>
        </div>
<div class="row">

          <div class="col-md-12">
            <div class="card">
               
              <div class="card-body">
                <div class="panel-heading btn-primary">Data Guru
                <div class="panel-title pull-right">
                <a href="{{ URL::previous() }}">Kembali</a></div></div>

                 <div class="panel-body">
              <form action="{{route('guru.update',$guru->id)}}" method="POST" >
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                  <label class="control_label">NIK</label>
                  <input type="text" name="a" class="form-control" value="{{$guru->nik}}">
                  </div>  

                    <div class="form-group">
                  <label class="control_label">Nama Guru</label>
                  <input type="text" name="b" class="form-control" value="{{$guru->nama}}">
                  </div>  
                  <div class="form-group">
                  <label class="control_label">Jenis Kelamin</label>
                  <input type="text" name="c" class="form-control" value="{{$guru->jk}}">
                  </div>  
                  <div class="form-group">
                  <label class="control_label">Alamat</label>
                  <textarea name="d" class="form-control" >{{$guru->alamat}}</textarea> 
                  </div>  
                  <div class="form-group">
                  <label class="control_label">No HP</label>
                  <input type="number" name="e" class="form-control" value="{{$guru->nohp}}">
                  </div>
                    <div class="form-group">
                  <label class="control_label">Nama Pelajaran</label>
                  <select type="text" name="f" class="form-control" >
                  @foreach($pelajaran as $data)
                  <option value="{{$data->id}}">{{$data->nama}}</option>
                  @endforeach
                  </select>

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