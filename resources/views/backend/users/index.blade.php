@extends('backend.app')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-xl-8">
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <button class="btn-sm btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal"> Tambah User</button>
                        </div>
                    </div>
                </div>
            <h4 class="card-title">List Users</h4>
            <div class="table-responsive">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Nama</th>
                        <th class="th-sm">Role</th>
                        <th class="th-sm">Email</th>
                        <th class="th-sm">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $users )
                        <tr>
                            <td>{{$users->name}}</td>
                            <td>{{$users->role}}</td>
                            <td>{{$users->email}}</td>
                            <td>
                                <a href="{{route('user.edit', $users->id)}}" class="btn btn-sm btn-info"> Edit </a>
                                <form action="{{route('user.delete' , $users->id)}}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete </button>
                                </form>                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center"> Data Not Found</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
            </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Daftarkan User Baru !</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('user.create')}}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleSelectRounded0">Role</label>
                    <select name="role" class="form-control" id="exampleSelectRounded0">
                        <option selected>Pilih Status</option>
                        <option value="admin">Admin</option>
                        <option value="operator">Operator</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input name="name" type="text" class="form-control"
                        placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="text" class="form-control"
                        placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control"
                        placeholder="Password">
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
