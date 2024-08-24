<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khám phá hệ mặc trời</title>

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

    .dropdown-item:hover, .dropdown-item:focus {
        background-color: #495057;
    }

    .submenu {
        position: absolute;
        top: 0;
        left: 100%;
        background-color: #343a40;
        color: #fff;
        min-width: 200px;
        display: none; /* Ẩn đi submenu cho đến khi hover */
    }

    .dropdown-menu {
        display: none;
    }

    .dropdown:hover > .dropdown-menu {
        display: block;
    }

    .dropdown-item:hover > .submenu {
        display: block;
    }

    .dropdown-item:hover > .submenu .submenu {
        display: none; /* Chỉ hiển thị khi hover vào submenu tương ứng */
    }
</style>

<body>


    <header>

        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="" class="logo navbar-brand"><span>THIÊN</span>VĂN HỌC</a>

        <nav class="navbar navbar-expand-lg navbar-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#home">Trang chủ</a>
            <div class="collapse navbar-collapse">
            <ul class="nav">
    @foreach($categories as $category)
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{ route('category.index1', ['slug' => $category->slug]) }}" id="navbarDropdown" role="button">
                {{ $category->name }}
            </a>
            @if($category->children->isNotEmpty())
                <ul class="dropdown-menu">
                    @foreach($category->children as $child)
                        <li class="dropdown-item dropdown">
                            <a class="dropdown-toggle" href="{{ route('category.index1', ['slug' => $child->slug]) }}">
                                {{ $child->name }}
                            </a>
                            @if($child->children->isNotEmpty())
                                <ul class="submenu dropdown-menu">
                                    @foreach($child->children as $grandchild)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('category.index1', ['slug' => $grandchild->slug]) }}">
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
        <i class="" id="login-btn"></i>
        <i class="" id="search-btn"></i>
    <a href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i></a>

    @auth
        <a href="{{ route('login') }}"><i class="" id="user-email">Xin chào:{{ Auth::user()->name }}</i></a>
    @else
        <a href="{{ route('register') }}"><i class="" id="register-btn">Đăng ký</i></a>
        <a href="{{ route('login') }}"><i class="" id="login-btn">Đăng nhập</i></a>
    @endauth
</div>

      

    </header>


    <div class="login-form-container">

        <i class="fas fa-times" id="form-close"></i>

        <form action="">
            <h3>login</h3>
            <input type="email" class="box" placeholder="enter your email">
            <input type="password" class="box" placeholder="enter your password">
            <input type="submit" value="login now" class="btn">
            <input type="checkbox" id="remember">
            <label for="remember">remember me</label>
            <p>forget password? <a href="#">click here</a></p>
            <p>don't have and account? <a href="#">register now</a></p>
        </form>

    </div>



    <section class="home" id="home">
        <div class="content">
            <h3>Adventure is Worthwhile</h3>
            <p>Discover new places with us, adventure awaits</p>
            <a href="#" class="btn">Discover More</a>
        </div>

        <div class="controls">
            <span class="vid-btn active" data-src="images/vd1.mp4"></span>
            <!-- <span class="vid-btn" data-src="images/h1.jpg"></span>
            <span class="vid-btn" data-src="images/h2.jpg"></span> -->
            <span class="vid-btn" data-src="images/vd2.mp4"></span>
            <span class="vid-btn" data-src="images/vid-5.mp4"></span>
        </div>

        <div class="video-container">
            <video src="images/vd1.mp4" id="video-slider" loop autoplay muted></video>
        </div>

        <div class="image-container">
            <img id="image-slider" />
        </div>
    </section>
    <br>
    <section class="services" style="width: 100%;padding: 40px;" id="services">

        <h1 class="heading">
            <span>s</span>
            <span>e</span>
            <span>r</span>
            <span>v</span>
            <span>i</span>
            <span>c</span>
            <span>e</span>
            <span>s</span>
        </h1>

        <div class="box-container">
            @foreach ($homeVutruItems as $item)
                <div class="box">
                    <i class=""> @if ($item->images)
                        <img src="{{ asset('storage/' . $item->images) }}" alt="{{ $item->name }}" class=""
                            style="width: 35px;">
                    @endif                     </i>
                    <h3>affordable hotels</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate
                        exercitationem ut minima itaque iusto ipsum corrupti!</p>
                </div>
            @endforeach

        </div>
    </section>

    @foreach ($CelestialBody as $item)

        <section>

            <div class="lading-container">

                <div class="lading-image">
                    @if ($item->images)
                        <img src="{{ asset('storage/' . $item->images) }}" alt="{{ $item->name }}" class="card-img-top">
                    @endif
                </div>
                <div class="lading-content">
                    <h2>{{ $item->name }}</h2>
                    <p>{!! Str::limit($item->content, 900) !!}</p>
                    <a href="{{ route('celestial-body.show', $item->slug) }}" class="btn btn-primary">See More</a>
                </div>

            </div>
        </section>
    @endforeach



    @foreach ($CelestialBody1 as $item)

        <section>

            <div class="lading-container">


                <div class="lading-content">
                    <h2>{{ $item->name }}</h2>
                    <p>{!! Str::limit($item->content, 900) !!}</p>
                    <a href="{{ route('celestial-body.show', $item->slug) }}" class="btn btn-primary">See More</a>
                </div>
                <div class="lading-image">
                    @if ($item->images)
                        <img src="{{ asset('storage/' . $item->images) }}" alt="{{ $item->name }}" class="card-img-top">
                    @endif
                </div>
            </div>
        </section>
    @endforeach

    <section class="gallery" style="width: 100%; padding:40px;" id="gallery">
        <h1 class="heading">
            <span>H</span>
            <span>À</span>
            <span>N</span>
            <span>H</span>
            <span>T</span>
            <span>I</span>
            <span>N</span>
            <span>H</span>
        </h1>
        <div class="box-container">
        @foreach ($CelestialBodyimg as $item)

                <div class="box">
                    @if ($item->images)
                        <img src="{{ asset('storage/' . $item->images) }}" alt="{{ $item->name }}">
                    @endif
                    <div class="content">
                        <h3>{{ $item->name }}</h3>
                        <p>{!! Str::limit($item->content, 300) !!}</p>
                        <a href="{{ route('celestial-body.show', $item->slug) }}" class="btn btn-primary">See More</a>
                    </div> 
                </div>

                 
            @endforeach




        </div>
    </section>

    <section class="services" style="width: 100%;padding: 40px;" id="services">

        <h1 class="heading">
            <span>T</span>
            <span>H</span>
            <span>À</span>
            <span>N</span>
            <span>H</span>
            <span>V</span>
            <span>I</span>
            <span>Ê</span>
            <span>N</span>
        </h1>

        <div class="box-container">

            <div class="box">
                <img src="images/l.jpg" alt="" class="user-img">

                </i>
                <h3>VONG PHU LUONG </h3>
                <p style="padding: 2px;">LEADER</p>
                <p> <a href="https://www.facebook.com/phuluong.vong.7?mibextid=LQQJ4d"> </p> <i class="fab fa-facebook"
                    style="color: #74C0FC;"></i></a> <a href="tel:+0586908367"> <i class="fas fa-phone-square-alt"
                        style="color: #B197FC;"></i></a>
                < </p>
            </div>
            <div class="box">
                <img src="images/c.jpg" alt="" class="user-img">

                </i>
                <h3>NGUYEN VAN CANH</h3>
                <p style="padding: 2px;">MEMBER</p>
                <p> <a href="https://www.facebook.com/nguyen.koten.581?mibextid=JRoKGi"> </p> <i class="fab fa-facebook"
                    style="color: #74C0FC;"></i></a> <a href="tel:+0365379592"> <i class="fas fa-phone-square-alt"
                        style="color: #B197FC;"></i></a>
                < </p>
            </div>
            <div class="box">
                <img src="images/k.jpg" alt="" class="user-img">

                </i>
                <h3>NGO HO TUAN KIET</h3>
                <p style="padding: 2px;">MEMBER</p>
                <p> <a href="https://www.facebook.com/tuankiet2005bp?mibextid=LQQJ4d"> </p> <i class="fab fa-facebook"
                    style="color: #74C0FC;"></i></a> <a href="tel:+0379245697"> <i class="fas fa-phone-square-alt"
                        style="color: #B197FC;"></i></a>
                < </p>
            </div>

        </div>
    </section>




    <section class="review" id="review">

        <h1 class="heading">
            <span>T</span>
            <span>I</span>
            <span>N</span>
            <span>T</span>
            <span>Ứ</span>
            <span>C</span>
            <span>M</span>
            <span>Ớ</span>
            <span>I</span>
            <span>N</span>
            <span>H</span>
            <span>Ấ</span>
            <span>T</span>


        </h1>

        <div class="swiper-container review-slider">

            <div class="swiper-wrapper">

                @foreach ($news as $item)
                    <div class="swiper-slide">
                        <div class="box">
                            @if ($item->images)
                                <img src="{{ asset('storage/' . $item->images) }}" alt="{{ $item->name }}"
                                    class="mb-5 w-full h-auto rounded">
                            @endif
                            <h3>{{ $item->name }}</h3>
                            <p class="mt-2">{{ Str::limit($item->short_description, 100) }}</p>
                            <a href="{{ route('news.show', $item->slug) }}" class="btn btn-primary mt-2">See More</a>
                        </div>
                    </div>
                @endforeach




            </div>

        </div>

    </section>




    <br>



    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>about us</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda quas magni pariatur est
                    accusantium voluptas enim nemo facilis sit debitis.</p>
            </div>
            <div class="box">
                <h3>branch locations</h3>
                <a href="#">india</a>
                <a href="#">USA</a>
                <a href="#">japan</a>
                <a href="#">france</a>
            </div>
            <div class="box">
                <h3>quick links</h3>
                <a href="#">home</a>
                <a href="#">book</a>
                <a href="#">packages</a>
                <a href="#">services</a>
                <a href="#">gallery</a>
                <a href="#">review</a>
                <a href="#">contact</a>
            </div>
            <div class="box">
                <h3>follow us</h3>
                <a href="#">facebook</a>
                <a href="#">instagram</a>
                <a href="#">twitter</a>
                <a href="#">linkedin</a>
            </div>

        </div>

        <h1 class="credit"> created by <span> mr. web designer </span> | all rights reserved! </h1>

    </section>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- custom js file link  -->
    <script src="{{ asset('js/home.js') }}"></script>

</body>

</html>