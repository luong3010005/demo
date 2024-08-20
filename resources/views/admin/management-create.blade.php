<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Add Product | Skote - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets\images\favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- select2 css -->
    <link href="assets\libs\select2\css\select2.min.css" rel="stylesheet" type="text/css">

    <!-- dropzone css -->
    <link href="assets\libs\dropzone\min\dropzone.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css -->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">


</head>

<body data-sidebar="dark">



    <!-- Left Sidebar End -->
    @include('admin.index2')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="container mt-4">
                    <h1 class="text-2xl font-bold mb-4">Manage Celestial Bodies</h1>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <!-- Form for Celestial Body -->
                    <form action="{{ route('celestial_body.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card mb-4">
                            <div class="card-header">Thêm thiên thể</div>
                            <div class="card-body">
                                <!-- Name Field -->
                                <div class="form-group">
                                    <label for="celestial_body_name">Tên</label>
                                    <input type="text" id="celestial_body_name" name="name" class="form-control"
                                        required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Type Field -->
                                <div class="mb-4">
                                    <label for="type" class="block text-gray-700">Type</label>
                                    <select name="type" id="type"
                                        class="mt-1 block w-full border form-control border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        required>
                                        <option value="">Chọn</option>
                                        <option value="Sao">Sao</option>
                                        <option value="Hành tinh">Hành Tinh</option>
                                        <option value="Vệ tinh">Vệ tinh</option>
                                    </select>
                                    @error('type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Category Field -->
                                <div class="form-group">
                                    <label for="celestial_body_category_id">Category</label>
                                    <select id="celestial_body_category_id" name="category_id" class="form-control"
                                        required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mass">Thông tin chi tiết </label>
                                    <form …>
                                        <input id="x" value="" type="hidden" name="content">
                                        <trix-editor input="x"></trix-editor>
                                    </form>
                                    @error('mass')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Mass Field -->
                                <div class="form-group">
                                    <label for="mass">Khối lượng (Mass)</label>
                                    <input type="number" id="mass" name="mass" class="form-control" step="any">
                                    @error('mass')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>



                                <!-- Radius Field -->
                                <div class="form-group">
                                    <label for="radius">Bán kính (Radius)</label>
                                    <input type="number" id="radius" name="radius" class="form-control" step="any">
                                    @error('radius')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Distance from Sun Field -->
                                <div class="form-group">
                                    <label for="distance_from_sun">Khoảng cách từ Mặt Trời (Distance from Sun)</label>
                                    <input type="number" id="distance_from_sun" name="distance_from_sun"
                                        class="form-control" step="any">
                                    @error('distance_from_sun')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Orbital Period Field -->
                                <div class="form-group">
                                    <label for="orbital_period">Chu kỳ quỹ đạo (Orbital Period)</label>
                                    <input type="number" id="orbital_period" name="orbital_period" class="form-control"
                                        step="any">
                                    @error('orbital_period')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Discovery Year Field -->
                                <div class="form-group">
                                    <label for="discovery_year">Năm khám phá (Discovery Year)</label>
                                    <input type="number" id="discovery_year" name="discovery_year" class="form-control"
                                        min="1000" max="{{ date('Y') }}">
                                    @error('discovery_year')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Images Field -->
                                <div class="form-group">
                                    <label for="images">Hình ảnh (Images)</label>
                                    <input type="file" id="images" name="images" class="form-control">
                                    @error('images')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Celestial Body</button>
                            </div>
                        </div>
                    </form>

                </div>


            </div>
        </div>

    </div>


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Skote.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-right d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar="" class="h-100">
            <div class="rightbar-title px-3 py-4">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <!-- Settings -->
            <hr class="mt-0">
            <h6 class="text-center mb-0">Choose Layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="assets\images\layouts\layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                    <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets\images\layouts\layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                        data-bsstyle="assets/css/bootstrap-dark.min.css" data-appstyle="assets/css/app-dark.min.css">
                    <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets\images\layouts\layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-5">
                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch"
                        data-appstyle="assets/css/app-rtl.min.css">
                    <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                </div>


            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets\libs\jquery\jquery.min.js"></script>
    <script src="assets\libs\bootstrap\js\bootstrap.bundle.min.js"></script>
    <script src="assets\libs\metismenu\metisMenu.min.js"></script>
    <script src="assets\libs\simplebar\simplebar.min.js"></script>
    <script src="assets\libs\node-waves\waves.min.js"></script>

    <!-- select 2 plugin -->
    <script src="assets\libs\select2\js\select2.min.js"></script>

    <!-- dropzone plugin -->
    <script src="assets\libs\dropzone\min\dropzone.min.js"></script>

    <!-- init js -->
    <script src="assets\js\pages\ecommerce-select2.init.js"></script>

    <!-- App js -->
    <script src="assets\js\app.js"></script>

</body>

</html>