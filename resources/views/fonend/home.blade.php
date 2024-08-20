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
        }

        .dropdown:hover > .dropdown-menu {
            display: block;
        }

        .dropdown-menu .dropdown:hover > .submenu {
            display: block;
        }

       
        .dropdown-menu, .submenu {
            display: none;
        }

       
        .dropdown:hover .dropdown-menu,
        .dropdown-item:hover .submenu {
            display: block;
        }
    </style>
<body>


    <header>

        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="#" class="logo"><span>THIÊN</span>VĂN HỌC</a>

        <nav class="navbar navbar-expand-lg navbar-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#home">Trang chủ</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @foreach($categories as $category)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                                {{ $category->name }}
                            </a>
                            @if($category->children->isNotEmpty())
                                <ul class="dropdown-menu">
                                    @foreach($category->children as $child)
                                        <li class="dropdown-item dropdown">
                                            <a class="dropdown-toggle" href="#">
                                                {{ $child->name }}
                                            </a>
                                            @if($child->children->isNotEmpty())
                                                <ul class="submenu dropdown-menu">
                                                    @foreach($child->children as $grandchild)
                                                        <li><a class="dropdown-item" href="#">{{ $grandchild->name }}</a></li>
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
            <a class="navbar-brand" href="#home">Đài thiên văn</a>
            <a class="navbar-brand" href="#home">Video</a>
            <a class="navbar-brand" href="#home">Sách hay</a>


        </div>
    </nav>


        <div class="icons">
            <i class="fas h" id="search-btn"></i>
            <i class="fas fa-user" id="login-btn"></i>
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
    <!-- <section class="services" style="width: 100%;padding: 40px;" id="services">

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

            <div class="box">
                <i class="fas fa-hotel"></i>
                <h3>affordable hotels</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate
                    exercitationem ut minima itaque iusto ipsum corrupti!</p>
            </div>
            <div class="box">
                <i class="fas fa-utensils"></i>
                <h3>food and drinks</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate
                    exercitationem ut minima itaque iusto ipsum corrupti!</p>
            </div>
            <div class="box">
                <i class="fas fa-bullhorn"></i>
                <h3>safty guide</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate
                    exercitationem ut minima itaque iusto ipsum corrupti!</p>
            </div>
            <div class="box">
                <i class="fas fa-globe-asia"></i>
                <h3>around the world</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate
                    exercitationem ut minima itaque iusto ipsum corrupti!</p>
            </div>
        </div>
    </section> -->



    <section>
        <div class="lading-container">

            <div class="lading-image">
                <video autoplay muted loop>
                    <source src="images/vd3.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="lading-content">
                <h2>INTERIOR</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut libero magna. Suspendisse id laoreet
                    ligula, id condimentum quam. Nulla feugiat velit vitae viverra lacinia. Nullam felis erat,
                    condimentum gravida iaculis elementum, accumsan et risus.</p>
                <p>Nam accumsan dignissim dolor a lacinia. Nulla mattis sem nec tincidunt blandit. Aenean eget ante id
                    sapien porttitor tincidunt.</p>
                <p><button type="submit">see more</button></p>
            </div>

        </div>
    </section>





    <section>
        <div class="lading-container">


            <div class="lading-content">
                <h2>INTERIOR</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut libero magna. Suspendisse id laoreet
                    ligula, id condimentum quam. Nulla feugiat velit vitae viverra lacinia. Nullam felis erat,
                    condimentum gravida iaculis elementum, accumsan et risus.</p>
                <p>Nam accumsan dignissim dolor a lacinia. Nulla mattis sem nec tincidunt blandit. Aenean eget ante id
                    sapien porttitor tincidunt.</p>
                <p><button type="submit">see more</button></p>
            </div>
            <div class="lading-image">
                <video autoplay muted loop>
                    <source src="images/vd3.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </section>


    <section class="gallery" style="width: 100%; padding:40px;" id="gallery" >
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

            <div class="box">
                <img src="images/sao-kim.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/sao-moc.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/sao-moc.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/sao-kim.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/sao-moc.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/sao-kim.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/sao-moc.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/sao-moc.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
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
                <p> <a href="https://www.facebook.com/phuluong.vong.7?mibextid=LQQJ4d">  </p>  <i class="fab fa-facebook" style="color: #74C0FC;"></i></a> <a href="tel:+0586908367"> <i class="fas fa-phone-square-alt" style="color: #B197FC;"></i></a>< </p>
            </div>
            <div class="box">
                <img src="images/c.jpg" alt="" class="user-img">

                </i>
                <h3>NGUYEN VAN CANH</h3>
                <p style="padding: 2px;">MEMBER</p>
                <p> <a href="https://www.facebook.com/nguyen.koten.581?mibextid=JRoKGi">  </p>  <i class="fab fa-facebook" style="color: #74C0FC;"></i></a> <a href="tel:+0365379592"> <i class="fas fa-phone-square-alt" style="color: #B197FC;"></i></a>< </p>
            </div>
            <div class="box">
                <img src="images/k.jpg" alt="" class="user-img">

                </i>
                <h3>NGO HO TUAN KIET</h3>
                <p style="padding: 2px;">MEMBER</p>
                <p> <a href="https://www.facebook.com/tuankiet2005bp?mibextid=LQQJ4d">  </p>  <i class="fab fa-facebook" style="color: #74C0FC;"></i></a> <a href="tel:+0379245697"> <i class="fas fa-phone-square-alt" style="color: #B197FC;"></i></a>< </p>
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

                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/l.jpg" alt="">
                        <h3>john deo</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa adipisci quisquam sunt nesciunt
                            fugiat odit minus illum asperiores dolorum enim sint quod ipsam distinctio molestias
                            consectetur ducimus beatae, reprehenderit exercitationem!</p>
                      
                    </div>
                </div>
                <div class="swiper-slide1">
                    <div class="box">
                        <img src="images/pic2.png" alt="">
                        <h3>john deo</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa adipisci quisquam sunt nesciunt
                            fugiat odit minus illum asperiores dolorum enim sint quod ipsam distinctio molestias
                            consectetur ducimus beatae, reprehenderit exercitationem!</p>
                      
                    </div>
                </div>
               
                <div class="swiper-slide1">
                    <div class="box">
                        <img src="images/pic4.png" alt="">
                        <h3>john deo</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa adipisci quisquam sunt nesciunt
                            fugiat odit minus illum asperiores dolorum enim sint quod ipsam distinctio molestias
                            consectetur ducimus beatae, reprehenderit exercitationem!</p>
                      
                    </div>
                </div>

            </div>

        </div>

    </section>



    <!-- contact section ends -->

    <!-- brand section  -->
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