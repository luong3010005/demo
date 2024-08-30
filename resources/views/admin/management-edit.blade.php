<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Celestial Body</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
</head>
<body data-sidebar="dark">
    @include('admin.index2')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="container mx-auto p-4">
                    <h1 class="text-2xl font-bold mb-4">Edit Celestial Body</h1>

                    <form action="{{ route('update.celestialBody', $celestialBody) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $celestialBody->name) }}"
                                class="mt-1 block w-full border form-control border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Type -->
                        <div class="mb-4">
                            <label for="type" class="block text-gray-700">Type</label>
                            <select name="type" id="type"
        class="mt-1 block w-full border form-control border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
    <option value="sao" {{ $celestialBody->type === 'sao' ? 'selected' : '' }}>Sao</option>
    <option value="hanh_tinh" {{ $celestialBody->type === 'hanh_tinh' ? 'selected' : '' }}>Hành Tinh</option>
    <option value="ve_tinh" {{ $celestialBody->type === 've_tinh' ? 'selected' : '' }}>Vệ Tinh</option>
    <option value="home_vutru" {{ $celestialBody->type === 'home_vutru' ? 'selected' : '' }}>Home Vũ Trụ</option>
</select>

                            @error('type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700">Category</label>
                            <select id="category_id" name="category_id"
                                class="mt-1 block w-full border form-control border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $celestialBody->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="content" class="block text-gray-700">Content</label>
                            <input id="x" value="" type="hidden" name="content">
                                        <trix-editor input="x">{{ old('content', $celestialBody->content) }}</trix-editor>
                            @error('content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <!-- Mass -->
                        <div class="mb-4">
                            <label for="mass" class="block text-gray-700">Mass (kg)</label>
                            <input type="text" name="mass" id="mass" value="{{ old('mass', $celestialBody->mass) }}"
                                class="mt-1 block w-full border form-control border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error('mass')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Radius -->
                        <div class="mb-4">
                            <label for="radius" class="block text-gray-700">Radius (km)</label>
                            <input type="text" name="radius" id="radius" value="{{ old('radius', $celestialBody->radius) }}"
                                class="mt-1 block w-full border form-control border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error('radius')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Distance from Sun -->
                        <div class="mb-4">
                            <label for="distance_from_sun" class="block text-gray-700">Distance from Sun (million km)</label>
                            <input type="text" name="distance_from_sun" id="distance_from_sun" value="{{ old('distance_from_sun', $celestialBody->distance_from_sun) }}"
                                class="mt-1 block w-full border form-control border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error('distance_from_sun')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Orbital Period -->
                        <div class="mb-4">
                            <label for="orbital_period" class="block text-gray-700">Orbital Period (days)</label>
                            <input type="text" name="orbital_period" id="orbital_period" value="{{ old('orbital_period', $celestialBody->orbital_period) }}"
                                class="mt-1 block w-full border form-control border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error('orbital_period')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Discovery Year -->
                        <div class="mb-4">
                            <label for="discovery_year" class="block text-gray-700">Discovery Year</label>
                            <input type="text" name="discovery_year" id="discovery_year" value="{{ old('discovery_year', $celestialBody->discovery_year) }}"
                                class="mt-1 block w-full border form-control border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error('discovery_year')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label for="images" class="block text-gray-700">Image</label>
                            <input type="file" name="images" id="images"
                                class="mt-1 block w-full border form-control border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @if($celestialBody->images)
                                <img src="{{ asset('storage/' . $celestialBody->images) }}" alt="{{ $celestialBody->name }}" class="w-16 h-16 object-cover mt-2">
                            @endif
                            @error('images')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Update Celestial Body</button>
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

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title px-3 py-4">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>
            <hr class="mt-0">
            <h6 class="text-center mb-0">Choose Layouts</h6>
            <div class="p-4">
                <!-- Layout options here -->
            </div>
        </div>
    </div>

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/select2/js/select2.min.js"></script>
    <script src="assets/libs/dropzone/min/dropzone.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>
