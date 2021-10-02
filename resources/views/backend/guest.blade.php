@extends('backend.guest-app')

@section('content')
@if(session('sukses'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{session('sukses')}}
</div>
@endif

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-xl-8">
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <button class="btn-sm btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal"> Daftarkan Kendaraan Kamu !</button>
                        </div>
                    </div>
                </div>
            <h4 class="card-title">Data Inventaris</h4>
            <div class="table-responsive">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Nama Civitas</th>
                        <th class="th-sm">Status Civitas</th>
                        <th class="th-sm">NIP/NIM</th>
                        <th class="th-sm">Plat Nomor</th>
                        <th class="th-sm">Jenis Kendaraan</th>
                        <th class="th-sm">Merk</th>
                        <th class="th-sm">Status Kendaraan</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($kendaraans as $kendaraan )
                        <tr>
                            <td>{{$kendaraan->nama_civitas}}</td>
                            <td>{{$kendaraan->status_civitas}}</td>
                            <td>{{$kendaraan->nip_nim}}</td>
                            <td>{{$kendaraan->plat_nomor}}</td>
                            <td>{{$kendaraan->jenis_kendaraan}}</td>
                            <td>{{$kendaraan->merk}}</td>
                            @if ($kendaraan->status_kendaraan == 0)
                                <td class="btn btn-warning"> menunggu verifikasi</td>
                            @else
                                <td class="btn btn-success"> terverifikasi</td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center"> Data Not Found</td>
                        </tr>
                        @endforelse($data_kendaraan as $kendaraan)
                        </tbody>
                    </table>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Daftarkan Kendaraan Kamu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('guest.create')}}" method="POST"
                enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Nama Civitas</label>
                    <input required name="nama_civitas" type="text" class="form-control"
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
                    <input required name="nip_nim" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="NIP / NIM">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Plat Nomor</label>
                    <input required name="plat_nomor" type="text" class="form-control"
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
                    <input required name="merk" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Merk">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Upload STNK</label>
                    <div class="custom-file">
                        <input required name="foto_stnk" type="file" class="custom-file-input"
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

@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>

@endsection

