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
        <h1 class="mb-4">Chi Tiết Đơn Hàng #{{ $order->id }}</h1>

        <div class="card mb-4">
            <div class="card-body">
                <p><strong>Tên:</strong> {{ $order->name }}</p>
                <p><strong>Địa Chỉ:</strong> {{ $order->address }}, {{ $order->city }}, {{ $order->zip }}, {{ $order->country }}</p>
                <p><strong>Tổng Tiền:</strong> {{ number_format($order->total_amount, 2) }} VNĐ</p>
            </div>
        </div>

        <h2 class="mb-4">Danh Sách Sản Phẩm</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 2) }} VNĐ</td>
                            <td>{{ number_format($item->price * $item->quantity, 2) }} VNĐ</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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