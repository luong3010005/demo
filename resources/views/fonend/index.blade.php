<div class="" style="margin-bottom: 120px;">
    @include('fonend.header')
</div>

<section class="section-products py-5">
    <div class="container">
        <div class="row justify-content-center text-center mb-4">
            <div class="col-md-8 col-lg-6">
                <div class="header">
                    <h3 class="text-primary">Thiên văn học</h3>
                    <h2 class="display-4">{{ $category->name }}</h2>
                </div>
            </div>
        </div>

        @if($category->slug === 'cac-vi-sao')
            <!-- Show filtered child categories for "Các Vì Sao" -->
            <div class="row">
                @foreach($category->children as $child)
                <div class="col-md-12 mb-4">
                    <h3 class="text-primary">{{ $child->name }}</h3>
                    <div class="row">
                        @forelse($child->celestialBodies ?? [] as $body)
                        <div class="col-md-7 col-lg-4 col-xl-3 mb-4">
                            <div class="card h-100">
                                @if($body->images)
                                    <img src="{{ asset('storage/' . $body->images) }}" alt="{{ $body->name }}" class="card-img-top h-100">
                                @else
                                    <img src="{{ asset('storage/default-image.jpg') }}" alt="No Image" class="card-img-top">
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $body->name }}</h5>
                                    <p class="card-text" style="font-size: 23px;">{!! Str::limit($body->description, 50) !!}</p>
                                    <a href="{{ route('celestialBody.show', ['slug' => $body->slug]) }}" class="btn btn-primary mt-auto">Xem thêm chi tiết</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <p>Không có thiên thể nào trong danh mục này.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <!-- Show Celestial Bodies for the current category -->
            <div class="row">
                @forelse($category->celestialBodies ?? [] as $body)
                <div class="col-md-7 col-lg-4 col-xl-3 mb-4">
                    <div class="card h-100">
                        @if($body->images)
                            <img src="{{ asset('storage/' . $body->images) }}" alt="{{ $body->name }}" class="card-img-top h-100">
                        @else
                            <img src="{{ asset('storage/default-image.jpg') }}" alt="No Image" class="card-img-top">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $body->name }}</h5>
                            <p class="card-text" style="font-size: 23px;">{!! Str::limit($body->description, 50) !!}</p>
                            <a href="{{ route('celestialBody.show', ['slug' => $body->slug]) }}" class="btn btn-primary mt-auto">Xem thêm chi tiết</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p>Không có thiên thể nào trong danh mục này.</p>
                </div>
                @endforelse
            </div>
        @endif
    </div>
</section>

<br>

@include('fonend.footer')

<style>
    body {
        background: #eee;
    }
    .card-text {
        transform: none !important;
        zoom: 1 !important;
        perspective: none !important;
        transform-origin: initial !important;
        transition: none !important;
        font-size: 20px;
    }
</style>
