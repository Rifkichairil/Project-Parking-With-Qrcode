@extends('app')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Filter Tanggal</h4>

                <form class="form-inline" action="{{route('filter')}}" method="POST">
                    @csrf
                    <label class="sr-only" for="from">Dari Tanggal</label>
                    <input type="date" class="form-control mb-2 mr-sm-2" id="from" name="from" placeholder="Dari Tanggal">
                    <label class="sr-only" for="to">Dari Tanggal</label>
                    <input type="date" class="form-control mb-2 mr-sm-2" id="to" name="to" placeholder="Ke Tanggal">

                    <button type="submit" class="btn btn-primary mb-2 mr-sm-2" name="filter">Cari</button>
                    <button type="submit" class="btn btn-success mb-2" name="export">Export</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Data Peminjam</h4>
            <div class="table-responsive">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif


                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Nama</th>
                        <th class="th-sm">Nama Barang </th>
                        <th class="th-sm">Tanggal Peminjaman </th>
                        <th class="th-sm">Aksi </th>
                    </tr>
                    </thead>
                        <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>{{$booking->nama_peminjam}}</td>
                            <td>{{$booking->barangs->nama}}</td>
                            <td>{{$booking->tanggal}}</td>
                            <td>
                                <form action="{{route('pinjaman.restore', $booking->id)}}" method="POST" enctype="multipart/form-data" style="display: inline-block">
                                    @csrf
                                    <button type="submit"  class="btn btn-info btn-sm">Pengembalian</button>
                                </form>
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
