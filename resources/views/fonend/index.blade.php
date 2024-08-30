@extends('layouts.app') <!-- Hoặc layout mà bạn đang sử dụng -->

@section('content')
<div class="" style="margin-bottom: 120px;">
    @include('fonend.header')
</div>

<section class="section-products py-5">
    <div class="container">
        <div class="row justify-content-center text-center mb-4">
            <div class="col-md-8 col-lg-6">
                <div class="header">
                    <h3 class="text-primary">ĐÀI THIÊN VĂN</h3>
                </div>
            </div>
        </div>
        
        <div class="row">
            @foreach($maps as $body)
            <div class="col-md-7 col-lg-4 col-xl-3 mb-4">
                <div class="card h-100">
                    @if($body->image)
                        <img src="{{ asset('storage/' . $body->image) }}" alt="{{ $body->name }}" class="card-img-top h-100">
                    @else
                        <img src="{{ asset('storage/default-image.jpg') }}" alt="No Image" class="card-img-top">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $body->name }}</h5>
                        <p class="card-text" style="font-size: 23px;">{!! Str::limit($body->content, 50) !!}</p>
                        <a href="{{ route('celestialBody.show', ['slug' => $body->slug]) }}" class="btn btn-primary mt-auto">Xem thêm chi tiết</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@include('fonend.footer')

<style>
    body {
        background: #eee;
    }
    .card-text {
        font-size: 20px;
    }
</style>
@endsection
