@extends('backend.app')

@section('content')

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
                        <th class="th-sm">Status Civitas</th>
                        <th class="th-sm">NIP/NIM</th>
                        <th class="th-sm">Plat Nomor</th>
                        <th class="th-sm">Jenis Kendaraan</th>
                        <th class="th-sm">Merk</th>
                        <th class="th-sm">Status Kendaraan</th>
                        <th class="th-sm">Aksi</th>
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
                                <td class="btn btn-sm btn-warning"> menunggu verifikasi</td>
                            @else
                                <td class="btn btn-sm btn-success"> terverifikasi</td>
                            @endif
                            <td>
                                <a href="{{route('kendaraan.detail', $kendaraan->id)}}" class="btn btn-sm btn-info"> Qr </a>
                                <a href="{{route('kendaraan.edit', $kendaraan->id)}}" class="btn btn-sm btn-warning"> Edit </a>
                                <form action="{{route('kendaraan.delete', $kendaraan->id)}}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete </button>
                                </form>
                                @if ($kendaraan->status_kendaraan == 0)

                                <a href="{{route('kendaraan.status', $kendaraan->id)}}" class="btn btn-sm btn-primary"> Verif </a>
                                @else
                                <a href="{{route('kendaraan.status', $kendaraan->id)}}" class="btn btn-sm btn-primary"> Unverif </a>

                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center"> Data Not Found</td>
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
