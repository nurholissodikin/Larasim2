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
         
        <div class="row">

          <div class="col-md-12">
            <div class="card">
               
              <div class="card-body">

                <form action="{{url('laporanpembayaran/detail2')}}" method="post"> 
                  {{csrf_field()}}
                  <label>Dari Tanggal</label>
                  <input type="date" name="a" required="">
                  <label>Sampai Tanggal</label>
                  <input type="date" name="b" required="">
                  <input type="submit" name="submit" class="btn-btn info" value="submit">
                </form>

                
              </div>
            </div>
          </div>
        </div>
                  
       
@endsection
