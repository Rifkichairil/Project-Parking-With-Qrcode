@extends('app')

@section('content')

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Peminjam</h4>
            <form class="form-sample" action="{{route('pinjaman.store')}}" method="post">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">User</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" required name="" value="{{auth()->user()->username}}" readonly />
                                <input type="hidden" class="form-control" required name="account_id" value="{{auth()->user()->id}}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Peminjam</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" required name="nama_peminjam" value="{{old('nama_peminjam')}}"  />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tanggal Peminjaman</label>
                            <div class="col-sm-6">
                            <input type="date" class="form-control" required name="tanggal" value="{{old('tanggal')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tanggal Pengembalian</label>
                            <div class="col-sm-6">
                            <input type="date" class="form-control" required name="pengembalian" value="{{old('pengembalian')}}"/>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Barang Inventaris</label>
                            <div class="col-sm-6">
                            <select class="form-control"  required name="barang_id[]">
                                <option value="">Pilih</option>
                                @foreach ($barangs as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tambah"></div>

                <div class="col-md-12">
                    <a href="#" class="addData btn btn-outline-secondary btn-sm text-white btn-info">Tambah Data</a>
                    <button type="submit" class="btn btn-outline-secondary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
        </div>
    </div>

{{-- close down --}}
</div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $('.addData').on('click', function(){
            addData();
        });

        function addData(){
            var tambah =
            '<div><div class="row"><div class="col-md-6"><div class="form-group row"><label class="col-sm-4 col-form-label">Barang Inventaris</label><div class="col-sm-6"><select class="form-control"  required name="barang_id[]"><option value="">Pilih</option>@foreach ($barangs as $item)<option value="{{$item->id}}">{{$item->nama}}</option>@endforeach</select></div></div></div></div></div>';
            $('.tambah').append(tambah);
        }
        $('.remove').on('click', function(){
            $(this).parent().remove();
        });


    </script>
@endsection
