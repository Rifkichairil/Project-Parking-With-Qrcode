    @extends('app')

    @section('content')

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
            <div class="card-body">
            <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                    <div class="col-md-12 col-xl-6 d-flex flex-column justify-content-start">
                        <div class="ml-xl-4 mt-3">
                        <p class="card-title">Detail {{$barangs->kode}}</p>
                        <h1 class="text-primary">{{$barangs->nama}}</h1>
                        <h4 class="font-weight-500 mb-xl-4 text-primary"> {{$barangs->qty}} Unit</h4>
                        <p class="mb-2 mb-xl-0">

                            Keterangan:
                        </p>
                        <p class="mb-2 mb-xl-0">

                            {{$barangs->keterangan}}
                        </p>
                        </div>
                        </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="row">
                        <div class="col-md-12 border-right">
                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                            <table class="table table-borderless report-table">
                                <tr>
                                <td class="text-muted">Lokasi</td>
                                <td><h5 class="font-weight-bold mb-0">{{$barangs->lokasi}}</h5></td>
                                </tr>
                                <tr>
                                <td class="text-muted">Barang Masuk</td>
                                <td><h5 class="font-weight-bold mb-0">{{$barangs->barang_masuk}}</h5></td>
                                </tr>
                                {{-- <tr>
                                    <td class="text-muted">Barang Keluar</td>
                                    <td><h5 class="font-weight-bold mb-0">{{$barangs->barang_keluar}}</h5></td>
                                </tr> --}}
                                <tr>
                                <td class="text-muted">Kategori</td>
                                <td><h5 class="font-weight-bold mb-0">{{$barangs->kategori}}</h5></td>
                                </tr>
                                <tr>
                                <td class="text-muted">Tipe</td>
                                <td><h5 class="font-weight-bold mb-0">{{$barangs->tipe}}</h5></td>
                                </tr>
                                <tr>
                                <td class="text-muted">Kondisi</td>
                                <td><h5 class="font-weight-bold mb-0">{{$barangs->kondisi}}</h5></td>
                                </tr>

                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            <a href="{{route('dashboard')}}" type="button" class="btn btn-outline-secondary btn-sm">Kembali</a>
            {{-- <a href="{{route('pinjaman', $barangs->id)}}" type="button" class="btn btn-sm btn-info text-white">Pinjam Inventaris</a> --}}
        </div>
        </div>

    </div>

    {{-- close down --}}
    </div>
    @endsection
