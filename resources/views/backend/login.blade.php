    <!DOCTYPE html>
    <html lang="en">

    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Parkir</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('backend/vendor/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendor/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendor/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('backend/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.png')}}" />
    </head>

    <body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                {{-- Image Logo --}}
                    {{-- <div class="brand-logo">
                        <img src="{{asset('backend/images/logo.svg')}}" alt="logo">
                    </div> --}}
                {{-- Close Image Logo --}}


                <h4 class="text-center">Hello! Welcome</h4>
                <h6 class="font-weight-light text-center">Login to continue.</h6>

                {{-- @if (session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif --}}
                <form action="{{route('auth')}}" method="POST" class="pt-3">
                    @csrf
                    <div class="form-group">
                    <input type="text" name="email"  class="form-control form-control-lg" id="email" placeholder="Email">
                    {{-- <span style="color: red">@error('username'){{$message}}@enderror</span> --}}
                    </div>
                    <div class="form-group">
                    <input type="password" name="password"  class="form-control form-control-lg" id="password" placeholder="Password">
                    {{-- <span style="color: red">@error('password'){{$message}}@enderror</span> --}}

                    </div>
                    <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOG IN</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('backend/vendor/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('backend/js/off-canvas.js')}}"></script>
    <script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('backend/js/template.js')}}"></script>
    <script src="{{asset('backend/js/settings.js')}}"></script>
    <script src="{{asset('backend/js/todolist.js')}}"></script>
    <!-- endinject -->
    </body>

    </html>
