@extends('backend.app')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin transparent">
        <div class="row">
            <div class="col-md-3 mb-3 stretch-card transparent">
                <div class="card card-tale">
                <div class="card-body">
                    <p class="mb-4">Terdaftar</p>
                    <p class="fs-30 mb-2">{{$terdaftar}}</p>
                </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 stretch-card transparent">
                <div class="card card-dark-blue">
                <div class="card-body">
                    <p class="mb-4">Motor</p>
                    <p class="fs-30 mb-2">{{$motor}}</p>
                </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 stretch-card transparent">
                <div class="card card-light-blue">
                <div class="card-body">
                    <p class="mb-4">Mobil</p>
                    <p class="fs-30 mb-2">{{$mobil}}</p>
                </div>
                </div>
            </div>
            {{-- <div class="col-md-3 mb-3 stretch-card transparent">
                <div class="card card-light-danger">
                <div class="card-body">
                    <p class="mb-4">Pengembalian Terlambat</p>
                    <p class="fs-30 mb-2">{{$pengembalians}}</p>
                </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Histori Kendaraan</h4>
            <div class="table-responsive">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Nama Civitas</th>
                        <th class="th-sm">Gedung</th>
                        <th class="th-sm">Plat Nomor</th>
                        <th class="th-sm">Merk</th>
                        <th class="th-sm">Masuk</th>
                        <th class="th-sm">Keluar</th>
                        <th class="th-sm">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($histories as $histori )
                        <tr>
                            <td>{{$histori->kendaraan->nama_civitas}}</td>
                            <td>{{$histori->gedung}}</td>
                            <td>{{$histori->kendaraan->plat_nomor}}</td>
                            <td>{{$histori->kendaraan->merk}}</td>
                            <td>{{$histori->jam_masuk}}</td>
                            <td>{{$histori->jam_keluar}}</td>
                            <td>
                                <form action="{{route('history.delete', $histori->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center"> Data Not Found</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
            </div>
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
