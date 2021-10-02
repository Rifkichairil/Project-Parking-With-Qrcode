    @extends('backend.app')

    @section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
            <div class="card-body">
            <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                        <div class="ml-xl-4 mt-3">
                        <h1 class="card-title">{{$user->kendaraan->nama_civitas}}</h1>
                        <h5 class="text-primary">Status Kendarraan</h5>
                        <h3 class="font-weight-500 mb-xl-4 text-primary">{{$user->kendaraan->status_kendaraan}}</h3>
                        </div>
                        </div>
                    <div class="col-md-12 col-xl-9">
                        <div class="row">
                        <div class="col-md-6 border-right">
                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                            <table class="table table-borderless report-table">
                                <tr>
                                <td class="text-muted">NIM</td>

                                <td><h5 class="font-weight-bold mb-0">{{$user->kendaraan->nip_nim}}</h5></td>
                                </tr>
                                <tr>
                                <td class="text-muted">Status</td>

                                <td><h5 class="font-weight-bold mb-0">{{$user->kendaraan->status_civitas}}</h5></td>
                                </tr>
                                <tr>
                                <td class="text-muted">Plat</td>

                                <td><h5 class="font-weight-bold mb-0">{{$user->kendaraan->plat_nomor}}</h5></td>
                                </tr>
                                <tr>
                                <td class="text-muted">Jenis Kendaraan</td>

                                <td><h5 class="font-weight-bold mb-0">{{$user->kendaraan->jenis_kendaraan}}</h5></td>
                                </tr>
                                <tr>
                                <td class="text-muted">Merk</td>

                                <td><h5 class="font-weight-bold mb-0">{{$user->kendaraan->merk}}</h5></td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <canvas id="north-america-chart"></canvas>
                            <div id="north-america-legend"></div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    {{-- Qr Code --}}
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
            <div class="card-body">
            <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                        <div class="ml-xl-4 mt-3">
                        <h1 class="card-title">{{$user->kendaraan->nama_civitas}}</h1>
                        <h5 class="text-primary">Status Kendarraan</h5>
                        <h3 class="font-weight-500 mb-xl-4 text-primary">{{$user->kendaraan->status_kendaraan}}</h3>
                        </div>
                        </div>
                    <div class="col-md-12 col-xl-9">
                        <div class="row">
                        <div class="col-md-6 border-right">
                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                            <table class="table table-borderless report-table">
                                <tr>
                                <td class="text-muted">NIM</td>

                                <td><h5 class="font-weight-bold mb-0">{{$user->kendaraan->nip_nim}}</h5></td>
                                </tr>
                                <tr>
                                <td class="text-muted">Status</td>

                                <td><h5 class="font-weight-bold mb-0">{{$user->kendaraan->status_civitas}}</h5></td>
                                </tr>
                                <tr>
                                <td class="text-muted">Plat</td>

                                <td><h5 class="font-weight-bold mb-0">{{$user->kendaraan->plat_nomor}}</h5></td>
                                </tr>
                                <tr>
                                <td class="text-muted">Jenis Kendaraan</td>

                                <td><h5 class="font-weight-bold mb-0">{{$user->kendaraan->jenis_kendaraan}}</h5></td>
                                </tr>
                                <tr>
                                <td class="text-muted">Merk</td>

                                <td><h5 class="font-weight-bold mb-0">{{$user->kendaraan->merk}}</h5></td>
                                </tr>
                            </table>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-6 mt-3">
                            <canvas id="north-america-chart"></canvas>
                            <div id="north-america-legend"></div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    @endsection

    {{--
    @section('script')
    <script>
        let scanner = new Instascan.Scanner({video: document.getElementById('preview')});
        Instascan.Camera.getCameras().then(function(cameras){
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No Cameras found');
            }
        }).catch(function(e){
            console.log('error');
        });

        scanner.addListener('scan', function(content){
            alert(content);
        });


    </script>

    @endsection --}}
