@extends('backend.app')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ubah Data {{$user->name}}</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="forms-sample" action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
                <div class="form-group row">
                    <label for="role" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                        <select name="role" class="form-control" id="exampleSelectRounded0">
                            <option selected value="{{$user->role}}">{{$user->role}}</option>
                            <option value="admin">Admin</option>
                            <option value="operator">Operator</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}" placeholder="Nama ">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Current Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="current_password" class="form-control" id="password"  placeholder="Password">
                        <span class="" style="color: red"> kosongkan jika password tidak ingin diubah</span>
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
