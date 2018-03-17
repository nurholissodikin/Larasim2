<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
      <title>SMK Assalaam</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('img/logo.png')}}" type="image/png">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/main.css')}}">
   
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <a href="http://getbootstrap.com/javascript/#modals"></a>
      
    <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
      width: 900px;

    }

    .example-modal .modal {
      background: transparent !important;

    }


  </style>
    

      
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
    

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="{{ url('/') }}">SMK Assalaam</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!--Notification Menu-->
            
              <!-- User Menu-->
              
               <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                 
                  <li> 
                 <a href="{{ route('logout') }}"  class="btn btn-default btn-flat fa fa-sign-out"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image"></div>
            <div class="pull-left info">
               <p>{{ Auth::user()->name }}</p>
              <p class="designation">Frontend Developer</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu"> @if (Auth::check())
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
          @endif
            <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Tables</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">  @role('admin')

                <li><a href="{{ route('jurusan.index') }}"><i class="fa fa-circle-o"></i> Jurusan</a></li>
                <li><a href="{{ route('ruangan.index') }}"><i class="fa fa-circle-o"></i> Ruangan</a></li>
                <li><a href="{{ route('pelajaran.index') }}"><i class="fa fa-circle-o"></i> Pelajaran</a></li>
                <li><a href="{{ route('guru.index') }}"><i class="fa fa-circle-o"></i> Guru</a></li>
                <li><a href="{{ route('kelas.index') }}"><i class="fa fa-circle-o"></i> Kelas</a></li>
                <li><a href="{{ route('jadwal.index') }}"><i class="fa fa-circle-o"></i> Jadwal</a></li>
               
                <li><a href="{{ route('siswa.index') }}"><i class="fa fa-circle-o"></i> Siswa</a></li>
                <li><a href="{{ route('nilai.index') }}"><i class="fa fa-circle-o"></i> Nilai</a></li>
                 <li><a href="{{ route('absensi.index') }}"><i class="fa fa-circle-o"></i> Absensi Siswa</a></li>
                <li><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> User</a></li>
                
                    @endrole
                    
                 @role('guru')
                 <li><a href="{{ route('siswa.index') }}"><i class="fa fa-circle-o"></i> Siswa</a></li>
                  <li><a href="{{ route('nilai.index') }}"><i class="fa fa-circle-o"></i> Nilai</a></li>
                     @endrole
                     @role(['karyawan','admin'])
                    <li><a href="{{ route('pembayaran.index') }}"><i class="fa fa-circle-o"></i> Pembayaran</a></li>
                    <li><a href="{{ url('laporanpembayaran') }}"><i class="fa fa-circle-o"></i> Rekap</a></li>
                 @endrole
                 
              </ul>
            </li>
       
          </ul>
        </section>
      </aside>
                        
     
               
      @yield('content')
   
    <!-- Javascripts-->
    
    <script src="{{asset('admin/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/pace.min.js')}}"></script>
    <script src="{{asset('admin/js/main.js')}}"></script>

  <script type="text/javascript" src="{{asset('admin/js/plugins/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
     <script type="text/javascript" src="{{asset('admin/js/plugins/bootstrap-notify.min.js')}}"></script>
      <script type="text/javascript" src="{{ asset ('admin/js/plugins/sweetalert.min.js') }}"></script>
     
  
    <script type="text/javascript">
      $('#demoNotify').click(function(){
        $.notify({
          title: "Update Complete : ",
          message: "Something cool is just updated!",
          icon: 'fa fa-check' 
        },{
          type: "info"
        });
      });
       $('#demoSelect').select2();
      
      $('#demoSwal').click(function(){
        swal({
          title: "Apa Anda Ingin Menghapus?",
          text: "Data Yang Dihapus Tidak Dapat Kembali!",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: true,
          closeOnCancel: false
        }, function(isConfirm) {
          if (isConfirm) {
            swal("Hapus!", "Berhasil Menghapus.", "success");
          } else {
            swal("Batal", "Batal Menghapus :)", "error");
          }
        });
      });
   
        
    </script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

  </body>
</html>