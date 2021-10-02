@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin transparent">
        <div class="row">
            <div class="col-md-3 mb-3 stretch-card transparent">
                <div class="card card-tale">
                <div class="card-body">
                    <p class="mb-4">Today’s Bookings</p>
                    <p class="fs-30 mb-2">{{$nowbookings}}</p>
                </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 stretch-card transparent">
                <div class="card card-dark-blue">
                <div class="card-body">
                    <p class="mb-4">Total Bookings</p>
                    <p class="fs-30 mb-2">{{$totalbookings}}</p>
                </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 stretch-card transparent">
                <div class="card card-light-blue">
                <div class="card-body">
                    <p class="mb-4">Total Inventaris</p>
                    <p class="fs-30 mb-2">{{$inventaris}}</p>
                </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 stretch-card transparent">
                <div class="card card-light-danger">
                <div class="card-body">
                    <p class="mb-4">Pengembalian Terlambat</p>
                    <p class="fs-30 mb-2">{{$pengembalians}}</p>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Data Inventaris</h4>
            <div class="table-responsive">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Kode Barang</th>
                        <th class="th-sm">Nama Barang</th>
                        <th class="th-sm">Kategori </th>
                        <th class="th-sm">Tipe Barang </th>
                        <th class="th-sm">Lokasi</th>
                        <th class="th-sm">Aksi </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                        <tr>
                            <td>{{$barang->kode}}</td>
                            <td>{{$barang->nama}}</td>
                            <td>{{$barang->kategori}}</td>
                            <td>{{$barang->tipe}}</td>
                            <td>{{$barang->lokasi}}</td>
                            {{-- <td>{{Str::limit($barang->keterangan, 10) }}</td> --}}
                            <td>
                                <a href="{{route('dashboard.detail', $barang->id)}}" class="btn btn-info btn-sm">Detail</a>
                            </td>
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

@section('script')
<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>

@endsection
