        @extends('app')

        @section('content')

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Inventaris</h4>
                    <form class="form-sample" action="{{route('invetaris.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kode Barang</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" required name="kode" value="KDB-{{$rndm_string}}" readonly />
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kategori</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" required name="kategori">
                                        <option value="">Pilih</option>
                                        <option value="Novel">Novel</option>
                                        <option value="Kamus">Kamus</option>
                                        <option value="Tugas Akhir">Tugas Akhir</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Barang</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" required name="nama"/>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tipe</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" required name="tipe">
                                        <option value="">Pilih</option>
                                        <option value="Buku">Buku</option>
                                        <option value="Berkas">Berkas</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Lokasi</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" required name="lokasi">
                                        <option value="">Pilih</option>
                                        <option value="gedung 1">gedung 1</option>
                                        <option value="gedung 2">gedung 2</option>
                                        <option value="gedung 3">gedung 3</option>
                                        <option value="gedung 4">gedung 4</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kondisi</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" required name="kondisi">
                                        <option value="">Pilih</option>
                                        <option value="Baru">Baru</option>
                                        <option value="Bekas">Bekas</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Masuk</label>
                                    <div class="col-sm-9">
                                    <input type="date" class="form-control" required name="barang_masuk"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jumlah Barang</label>
                                    <div class="col-sm-9">
                                    <input type="number" class="form-control" required name="qty"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Keterangan</label>
                                    <textarea type="text" class="form-control" required name="keterangan"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-outline-secondary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>

        {{-- close down --}}
        </div>
        @endsection
