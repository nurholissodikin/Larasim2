@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-th-list"></i> Data Siswa</h1>
          
          </div>
          <div>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li class="active">Data Siswa</li>
            </ul>
          </div>
        </div><!-- <div class="row">
        <div class="col-md-4">
            {!! Form::label('kelas', 'Pilih Kelas') !!}
            {!! Form::select('kelas_id', App\Kelas::pluck('nama','id')->all(),null,['class'=>'form-control','id'=>'kelas','placeholder'=>'Semua']) !!}
           
        </div>
    </div> -->
          <div >@role('admin')<a class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Tambah Data</a>
              @endrole</div>
        <div class="row">

          <div class="col-md-12">
            <div class="card">
               
              <div class="card-body">

                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>NIS</th>
                      <th>Nama siswa</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>No hp</th>
                      <th>Kelas</th>
                      <th>Jurusan</th>
                   @role('admin')
                    <th >Aksi</th>
@endrole
                    </tr>
                  </thead>
                  <tbody id="siswas">
                   @foreach($siswa as $data)
                        <tr>
                            <td>{{$data->nis}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->jk}}</td>
                            <td>{{$data->alamat}}</td>
                            <td>{{$data->nohp}}</td>
                            <td>{{$data->kelas->nama}}</td>
                            <td>{{$data->jurusan->nama}}</td>
                        <form action="{{route('siswa.destroy',$data->id)}}" method="post">

                                <input name="_method" type="hidden" value="DELETE">
                                <input name="_token" type="hidden">
                                 </td>@role('admin')
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
                <h4 class="modal-title">Isi Data Siswa</h4>
              </div>
              <div class="modal-body">
              
         <form action="{{route('siswa.store')}}" method="post" >
                  {{csrf_field()}}

                    <div class="form-group">
                  <label class="control_label">NIS</label>
                  <input type="text" name="a" class="form-control" required="">
                  </div>  

                    <div class="form-group">
                  <label class="control_label">Nama</label>
                  <input type="text" name="b" class="form-control" required="">
                  </div>  
                  <div class="form-group">
                  <label class="control_label">Jenis Kelamin</label>
                  <input type="radio" name="c" class="form-control" required="" value="Laki-Laki">Laki-Laki
                  <input type="radio" name="c" class="form-control" required="" value="Perempuan">Perempuan
                  </div>  
                  <div class="form-group">
                  <label class="control_label">Alamat</label>
                  <textarea name="d" class="form-control" required=""></textarea> 
                  </div>  
                  <div class="form-group">
                  <label class="control_label">No HP</label>
                  <input type="number" name="e" class="form-control" required="">
                  </div>
                       <div class="form-group">
                  <label class="control_label">Nama Orang Tua</label>
                  <input type="text" name="o" class="form-control" required="">
                  </div>
                  <div class="form-group">
                  <label class="control_label">Nohp Orang Tua</label>
                  <input type="text" name="hp" class="form-control" required="">
                  </div>
                    <div class="form-group">
                  <label class="control_label">Kelas</label>
                  <select type="text" name="f" class="form-control" >
                  @foreach($kelas as $data)
                  <option value="{{$data->id}}">{{$data->nama}}</option>
                  @endforeach
                  </select>
                  </div>        
                   <div class="form-group">
                  <label class="control_label">Jurusan</label>
                  <select type="text" name="g" class="form-control" >
                  @foreach($jurusan as $data)
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
 @foreach($siswa as $data)
        <div class="modal fade" id="edit{{$data->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header btn-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Data Siswa</h4>
              </div>
              <div class="modal-body">
              
         <form action="{{route('siswa.update',$data->id)}}" method="POST" >
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                  <label class="control_label">NIS</label>
                  <input type="text" name="a" class="form-control" value="{{$data->nis}}">
                  </div>  

                    <div class="form-group">
                  <label class="control_label">Nama siswa</label>
                  <input type="text" name="b" class="form-control" value="{{$data->nama}}">
                  </div>  
                  <div class="form-group">
                  <label class="control_label">Jenis Kelamin</label>
                  <input type="text" name="c" class="form-control" value="{{$data->jk}}">
                  </div>  
                  <div class="form-group">
                  <label class="control_label">Alamat</label>
                  <textarea name="d" class="form-control" >{{$data->alamat}}</textarea> 
                  </div>  
                  <div class="form-group">
                  <label class="control_label">No HP</label>
                  <input type="number" name="e" class="form-control" value="{{$data->nohp}}">
                  </div>
                   <div class="form-group">
                  <label class="control_label">Nama Orang Tua</label>
                  <input type="text" name="o" class="form-control" value="{{$data->namaortu}}">
                  </div>
                  <div class="form-group">
                  <label class="control_label">Nohp Orangtua </label>
                  <input type="number" name="hp" class="form-control" value="{{$data->nohportu}}">
                  </div>
                     <div class="form-group">
                  <label class="control_label">Jurusan</label>
                  <select type="text" name="f" class="form-control" >
                  @foreach($kelas as $data)
                  <option value="{{$data->id}}">{{$data->nama}}</option>
                  @endforeach
                  </select>

                  </div>        
                  <div class="form-group">
                  <label class="control_label">Jurusan</label>
                  <select type="text" name="g" class="form-control" >
                  @foreach($jurusan as $data)
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
        
        
@endforeach
<script type="text/javascript">
        $(document).ready(function(){
            $('#kelas').on('change', function(e){
                var id = e.target.value;
                $.get('{{ url('merk')}}/'+id, function(data){
                    console.log(id);
                    console.log(data);
                    $('#siswas').empty();
                    $.each(data, function(index, element){
                        $('#siswas').append("<tr><td>"+element.nis+"</td><td>"+element.nama+"</td>"+
                        "<td>"+element.jk+"</td>"+
                        "<td>"+element.alamat+"</td>"+
                        "<td>"+element.nohp+"</td>"+
                        "<td>"+element.kelas_id+"</td>"+
                        "<td>"+element.jurusan_id+"</td></tr>");
                        
                    });
                });
            });
        });
    </script>
       
@endsection
