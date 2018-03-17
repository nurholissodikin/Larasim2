@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-th-list"></i> Data User</h1>
          
          </div>
          <div>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li class="active">Data User</li>
            </ul>
          </div>
        </div>
          <div ><a class="btn btn-primary" href="{{ route('user.create')}}"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
        <div class="row">

          <div class="col-md-12">
            <div class="card">
               
              <div class="card-body">

                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                       <th>Nama</th>
                      <th>Email</th>
                      
                     
                    <th>Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                   @foreach($user as $data)
                        <tr>
                           
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                        <form action="{{route('user.destroy',$data->id)}}" method="post">

                                <input name="_method" type="hidden" value="DELETE">
                                <input name="_token" type="hidden">
                                 </td>
                            <td>
                          <!--      <a class="btn btn-warning" href="{{ route('user.edit',$data->id)}}"><i class="fa fa-edit"> Ubah</i></a> -->
                               <input class="btn btn-danger" type="submit" value="Hapus"> 
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
