@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-th-list"></i> Data Pelajaran</h1>
          
          </div>
          <div>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li class="active">Data Pelajaran</li>
            </ul>
          </div>
        </div>
<div class="row">

          <div class="col-md-12">
            <div class="card">
               
              <div class="card-body">
                <div class="panel-heading btn-primary">Data Pelajaran
                <div class="panel-title pull-right">
                <a href="{{ URL::previous() }}">Kembali</a></div></div>

                 <div class="panel-body">
              <form action="{{route('pelajaran.update',$pelajaran->id)}}" method="POST" >
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group">
                  <label class="control_label">Nama Pelajaran</label>
                  <input type="text" name="a" class="form-control" required="" value="{{$pelajaran->nama}}">
                  </div>
                  
                   <div class="form-group">
                  <label class="control_label">KKM</label>
                  <input type="text" name="b" class="form-control" required="" value="{{$pelajaran->kkm}}">
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