
<div class="" style="margin-bottom: 140px;">
@include('fonend.header')
</div>
<style>
    body {
        background: #eee
    }

    .ratings i {
        font-size: 16px;
        color: red
    }

    .strike-text {
        color: red;
        text-decoration: line-through
    }

    .product-image {
        width: 100%
    }

    .dot {
        height: 7px;
        width: 7px;
        margin-left: 6px;
        margin-right: 6px;
        margin-top: 3px;
        background-color: blue;
        border-radius: 50%;
        display: inline-block
    }

    .spec-1 {
        color: #938787;
        font-size: 15px
    }

    h5 {
        font-weight: 400
    }

    .para {
        font-size: 16px
    }
    .breadcrumb {
    font-size: 14px;
    color: #555;
}

.breadcrumb a {
    color: #0073e6;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

.breadcrumb span {
    color: #333;
}

</style>




    <div class="container">
    <div class="breadcrumb">
    <a href="{{ route('home') }}">Trang chủ</a> »
    <a href="{{ url()->previous() }}">Quay lại</a> »
    <span>{{ $news->name }}</span>
</div>
    <h1 class="text-2xl font-bold">{{ $news->name }}</h1>
    
    @if ($news->images)
        <img src="{{ asset('storage/' . $news->images) }}" alt="{{ $news->name }}" class="my-4 w-100 h-auto rounded">
    @endif

    <div class="mt-4">
    {!! $news->long_description !!}
    </div>

</div>





    <!-- contact section ends -->

    <!-- brand section  -->



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