    @extends('backend.app')

    @section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Ubah Data</h4>
              <form class="forms-sample" action="{{route('kendaraan.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
                <div class="form-group row">
                  <label for="nama_civitas" class="col-sm-3 col-form-label">Nama Civitas</label>
                  <div class="col-sm-9">
                    <input type="text" name="nama_civitas" class="form-control" id="nama_civitas" value="{{$user->nama_civitas}}" placeholder="Nama Civitas">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="status_civitas" class="col-sm-3 col-form-label">Status Civitas</label>
                  <div class="col-sm-9">
                    <input type="text" name="status_civitas" class="form-control" id="status_civitas" value="{{$user->status_civitas}}" placeholder="Nama Civitas">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nip_nim" class="col-sm-3 col-form-label">NIP / NIM</label>
                  <div class="col-sm-9">
                    <input type="text" name="nip_nim" class="form-control" id="nip_nim" value="{{$user->nip_nim}}" placeholder="Nama Civitas">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="plat_nomor" class="col-sm-3 col-form-label">Plat Nomor</label>
                  <div class="col-sm-9">
                    <input type="text" name="plat_nomor" class="form-control" id="plat_nomor" value="{{$user->plat_nomor}}" placeholder="Nama Civitas">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jenis_kendaraan" class="col-sm-3 col-form-label">Jenis Kendaraan</label>
                  <div class="col-sm-9">
                    <input type="text" name="jenis_kendaraan" class="form-control" id="jenis_kendaraan" value="{{$user->jenis_kendaraan}}" placeholder="Nama Civitas">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="merk" class="col-sm-3 col-form-label">Merk Kendaraan</label>
                  <div class="col-sm-9">
                    <input type="text" name="merk" class="form-control" id="merk" value="{{$user->merk}}" placeholder="Nama Civitas">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="foto_stnk" class="col-sm-3 col-form-label">Foto STNK</label>
                  <div class="col-sm-9">
                    <input type="file" name="foto_stnk" class="form-control" id="foto_stnk" value="{{$user->foto_stnk}}" placeholder="Nama Civitas">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
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
