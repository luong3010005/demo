<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khám phá hệ mặt trời</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
    .dropdown-menu {
        position: absolute;
        left: 0;
        top: 100%;
        background-color: #343a40;
        color: #fff;
        min-width: 200px;
    }

    .dropdown-item:hover,
    .dropdown-item:focus {
        background-color: #495057;
    }

    .submenu {
        position: absolute;
        top: 0;
        left: 100%;
        background-color: #343a40;
        color: #fff;
        min-width: 200px;
        display: none;
    }

    .dropdown-menu {
        display: none;
    }

    .dropdown:hover>.dropdown-menu {
        display: block;
    }

    .dropdown-item:hover>.submenu {
        display: block;
    }

    .dropdown-item:hover>.submenu .submenu {
        display: none;
    }
</style>

<body>
    <header>
        <div id="menu-bar" class="fas fa-bars"></div>
        <a href="{{ route('home') }}" class="logo navbar-brand"><span>THIÊN</span>VĂN HỌC</a>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">Trang chủ</a>
                <div class="collapse navbar-collapse">
                    <ul class="nav">
                        @foreach($categories as $category)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"
                                    href="{{ route('category.index1', ['slug' => $category->slug]) }}" id="navbarDropdown"
                                    role="button">
                                    {{ $category->name }}
                                </a>
                                @if($category->children->isNotEmpty())
                                    <ul class="dropdown-menu">
                                        @foreach($category->children as $child)
                                            <li class="dropdown-item dropdown">
                                                <a class="dropdown-toggle"
                                                    href="{{ route('category.index1', ['slug' => $child->slug]) }}">
                                                    {{ $child->name }}
                                                </a>
                                                @if($child->children->isNotEmpty())
                                                    <ul class="submenu dropdown-menu">
                                                        @foreach($child->children as $grandchild)
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('category.index1', ['slug' => $grandchild->slug]) }}">
                                                                    {{ $grandchild->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <a class="navbar-brand" href="{{ route('home') }}">Đài thiên văn</a>
                <a class="navbar-brand" href="{{ route('videos') }}">Video</a>
                <a class="navbar-brand" href="{{route('products.index')}}">Sách hay</a>
                <a class="navbar-brand" href="{{ route('news.index12') }}">Tin tức</a>
            </div>
        </nav>
        <div class="icons">
    <a href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i></a>

    @auth
        <a href="{{ route('login') }}"><i class="" id="user-email">Xin chào:{{ Auth::user()->name }}</i></a>
    @else
        <a href="{{ route('register') }}"><i class="" id="register-btn">Đăng ký</i></a>
        <a href="{{ route('login') }}"><i class="" id="login-btn">Đăng nhập</i></a>
    @endauth
</div>

    </header>
</body>

</html>
