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
@include('layouts._flash')
      
      @if($errors->any())
      <div class="flash alert-danger">
        @foreach($errors->all() as $err)
          <li><span>{{ $err }}</span></li>
        @endforeach
      </div>
      @endif
              <form action="{{route('nilai.update',$nilai->id)}}" method="POST" >
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                  <label class="control_label">nilai</label>
                  <input type="text" name="a" class="form-control" value="{{$nilai->nilai}}">
                  </div>  

                  <div class="form-group">
                  <label class="control_label">Nama Pelajaran</label>
                  <select type="text" name="b" class="form-control" >
                  @foreach($pelajaran as $data)
                  <option value="{{$data->id}}">{{$data->nama}}</option>
                  @endforeach
                  </select>

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
            </div>
          </div>
        </div>
      </div>
@endsection
