@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-th-list"></i> Data Absensi</h1>
          
          </div>
          <div>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li class="active">Data Absensi</li>
            </ul>
          </div>
        </div>
          <div >@role('admin')<a class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Tambah Data</a>
              @endrole</div>
        <div class="row">

          <div class="col-md-12">
            <div class="card">
               
              <div class="card-body">

                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                    
                      <th>Nama Siswa</th>
                      <th>tanggal</th>
                      <th>Kelas</th>
                      <th>Keterangan</th>
                        <th>Nohp Orangtua</th>
                        @role('admin')
                    <th >Aksi</th>
@endrole
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($absensi as $data)
                        <tr>
                          
                            <td>{{$data->siswa->nama}}</td>
                            <td>{{$data->tanggal}}</td>
                            <td>{{$data->siswa->kelas->nama}}</td>
                            <td>{{$data->keterangan}}</td>
                            <td>{{$data->siswa->nohportu}}</td>
                            
                            
                          
                        <form action="{{route('absensi.destroy',$data->id)}}" method="post">

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
                <h4 class="modal-title">Isi Data Absensi</h4>
              </div>
              <div class="modal-body">
              
         <form action="{{route('absensi.store')}}" method="post" >
                  {{csrf_field()}}
                  
                  <div class="form-group">
                  <label class="control_label">Keterangan</label>
                  <div >
                  <input type="radio" name="a" required="" value="Sakit">Sakit
                  <input type="radio" name="a" required="" value="Ijin">Ijin
                  <input type="radio" name="a" required="" value="Alpa">Alpa</div>
                  </div>   

                    <div class="form-group">
                  <label class="control_label">Tanggal</label>
                  <input type="date" name="b" class="form-control" required="">
                  </div> 

                
                   <div class="form-group">
            <label class="control-label">Kelas</label>
            <select class="form-control kelas" name="z" required="" id="kelas">
              @foreach($kelas as $aa)
              <option value="{{$aa->id}}">{{$aa->nama}}
              </option>
              @endforeach
            </select>
            </div>
<div>
            <label class="control-label">Nama</label>
            <select class="form-control" name="c" required="" id="ngaran">
              <!-- @foreach($siswa as $dd)
              <option value="{{$dd->id}}">{{$dd->nama_siswa}}
              </option>
              @endforeach -->
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
 @foreach($absensi as $data)
        <div class="modal fade" id="edit{{$data->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header btn-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Data Absensi</h4>
              </div>
              <div class="modal-body">
              
         <form action="{{route('absensi.update',$data->id)}}" method="POST" >
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="form-group">
                  <label class="control_label">Keterangan</label>
                  <div >
                  <input type="radio" name="a" required="" value="Sakit" <?php if($data->keterangan == "Sakit") {echo "checked";} ?>> Sakit
          <input type="radio" name="a" required="" value="Ijin" <?php if($data->keterangan == "Ijin") {echo "checked";} ?>> Ijin
          <input type="radio" name="a" required="" value="Alpa" <?php if($data->keterangan == "Alpa") {echo "checked";} ?>> Alpa </div>
                  </div>   
                    <div class="form-group">
                  <label class="control_label">Tanggal</label>
                  <input type="date" name="b" class="form-control" value="{{$data->tanggal}}">
                  </div>
<div class="form-group">
            <label class="control-label">Kelas</label>
            <select class="form-control kelas" name="z" required="" id="kelasa">
              @foreach($kelas as $aa)
              <option value="{{$aa->id}}"  <?php if($aa->id ) {echo "selected";} ?>>{{$aa->nama}}
              </option>
              @endforeach
            </select>
            </div>
<div class="form-group">
            <label class="control-label">Nama</label>
            <select class="form-control" name="c" required="" id="ngarana">
              <!-- @foreach($siswa as $dd)
              <option value="{{$dd->id}}">{{$dd->nama_siswa}}
              </option>
              @endforeach -->
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
       <script type="text/javascript">
  $(document).ready(function(){
    // $(document).on('change','.kelas', function(){
    //  console.log("Hm its change");

    //  var id_kelas=$(this).val();
    //  console.log(id_kelas);
    // });
    $('#kelas').change(function function_name() {
      $('#ngaran').html('');
        $('#ngarana').html('');
      $.ajax({
        method : 'GET',
        dataType: 'html',
        url : 'filter/kelas/' + $(this).val(),
        success : function(data){
          $('#ngaran').append(data);
        },
        error : function() {
          $('#ngaran').html('Tidak Ada Hasil');
        }

      });     
    })
    $('#kelasa').change(function function_name() {
   
        $('#ngarana').html('');
      $.ajax({
        method : 'GET',
        dataType: 'html',
        url : 'filter/kelas/' + $(this).val(),
        success : function(data){
          $('#ngarana').append(data);
        },
        error : function() {
          $('#ngarana').html('Tidak Ada Hasil');
        }

      });     
    })

  });
</script>
@endsection
