<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PARKIR-STTNF</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- linear icon -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">

            <a href="/" class="navbar-brand">
                <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">PARKIR-STTNF</span>
            </a>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <li class="nav-item">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target=".bd-example-modal-xl">
                        + Daftarkan Kendaraan
                    </button>
                </li>
                <li class="nav-item">
                    <a href="/login" class="nav-link" data-slide="true" role="button">
                        <i class="lnr lnr-enter"></i> Login
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @if(session('sukses'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{session('sukses')}}
            </div>
            @endif

            <!-- Content Header (Page header) -->
            <br>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Daftar Kendaraan</h3>

                                    <div class="card-tools">
                                        <form method="GET" action="/">
                                        <div class="input-group input-group-sm" style="width: 290px;">

                                            <input type="text" name="cari" class="form-control float-right"
                                                placeholder="Cari kendaraan berdasarkan nama civitas">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Nama Civitas</th>
                                                <th>Status Civitas</th>
                                                <th>NIP/NIM</th>
                                                <th>Plat Nomor</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Merk</th>
                                                <th>Status Kendaraan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_kendaraan as $kendaraan)
                                            <tr>
                                                <td>{{$kendaraan->nama_civitas}}</td>
                                                <td>{{$kendaraan->status_civitas}}</td>
                                                <td>{{$kendaraan->nip_nim}}</td>
                                                <td>{{$kendaraan->plat_nomor}}</td>
                                                <td>{{$kendaraan->jenis_kendaraan}}</td>
                                                <td>{{$kendaraan->merk}}</td>
                                                <td>{{$kendaraan->status_kendaraan}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->


                <!-- modal -->
                <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
                    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Daftarkan Kendaraan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">


                                <form action="/guest/create" method="POST"
                                    enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label>Nama Civitas</label>
                                        <input name="nama_civitas" type="text" class="form-control"
                                            placeholder="Nama Civitas">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectRounded0">Status Civitas</label>
                                        <select name="status_civitas" class="form-control" id="exampleSelectRounded0">
                                            <option selected>Pilih Status Civitas</option>
                                            <option value="Mahasiswa">Mahasiswa</option>
                                            <option value="Staff">Staff</option>
                                            <option value="Dosen">Dosen</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">NIP / NIM</label>
                                        <input name="nip_nim" type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="NIP / NIM">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Plat Nomor</label>
                                        <input name="plat_nomor" type="text" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Plat Nomor">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectRounded0">Jenis Kendaraan</label>
                                        <select name="jenis_kendaraan" class="form-control" id="exampleSelectRounded0">
                                            <option selected>Pilih Jenis Kendaraan</option>
                                            <option value="Motor">Motor</option>
                                            <option value="Mobil">Mobil</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Merk</label>
                                        <input name="merk" type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Merk">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Upload STNK</label>
                                        <div class="custom-file">
                                            <input name="foto_stnk" type="file" class="custom-file-input"
                                                id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>

                            </div>
                        </div>
                    </div>
                </div>


            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->



        <!-- Main Footer -->
        @include('layouts.includes._footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminlte/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/adminlte/dist/js/demo.js"></script>
    <!-- bs-custom-file-input -->
    <script src="/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>
