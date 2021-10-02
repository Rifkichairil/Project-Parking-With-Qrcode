    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Parkir</title>
        <link rel="stylesheet" href="{{asset('backend/vendor/feather/feather.css')}}">
        <link rel="stylesheet" href="{{asset('backend/vendor/ti-icons/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('backend/vendor/css/vendor.bundle.base.css')}}">
        <link rel="stylesheet" href="{{asset('backend/vendor/datatables.net-bs4/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('backend/vendor/ti-icons/css/themify-icons.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backend/js/select.dataTables.min.css')}}">
        <link rel="stylesheet" href="{{asset('backend/css/vertical-layout-light/style.css')}}">
        @yield('style')

    </head>
    <body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        @include('backend.partials._navbar_guest')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

            <!-- partial:partials/_settings-panel.html -->
            {{-- @include('backend.partials._settings-panel') --}}
            <!-- partial -->

            <!-- partial:partials/_sidebar.html -->
            @include('backend.partials._sidebar')
            <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
                {{-- Welcome site --}}
                <div class="row">
                    <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome  ! </h3>
                        {{-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> --}}
                        </div>
                        {{-- <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                            <a class="dropdown-item" href="#">January - March</a>
                            <a class="dropdown-item" href="#">March - June</a>
                            <a class="dropdown-item" href="#">June - August</a>
                            <a class="dropdown-item" href="#">August - November</a>
                            </div>
                        </div>
                        </div>
                        </div> --}}
                    </div>
                    </div>
                </div>
                {{-- Close Welcome --}}

                @yield('content')

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('backend.partials._footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <script src="{{asset('backend/vendor/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('backend/vendor/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/vendor/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('backend/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('backend/js/off-canvas.js')}}"></script>
    <script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('backend/js/template.js')}}"></script>
    <script src="{{asset('backend/js/settings.js')}}"></script>
    <script src="{{asset('backend/js/todolist.js')}}"></script>
    <script src="{{asset('backend/js/dashboard.js')}}"></script>
    <script src="{{asset('backend/js/Chart.roundedBarCharts.js')}}"></script>
    <script src="{{asset('backend/js/file-upload.js')}}"></script>
    <script src="{{asset('backend/js/typeahead.js')}}"></script>
    <script src="{{asset('backend/js/select2.js')}}"></script>
    @yield('script')


    </body>

    </html>

