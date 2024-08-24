<div class="" style="margin-bottom: 120px;">
    @include('fonend.header')
</div>


<section class="py-5">
    <div class="container">
    <div class="breadcrumb">
    <a href="{{ route('home') }}">Trang chủ</a> »
    <a href="{{ url()->previous() }}">Quay lại</a> »
    <span>{{ $celestialBody->name }}</span>
</div>

        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <!-- Image Section -->
              <p>  <div class="text-center">
                    @if($celestialBody->images)
                        <img src="{{ asset('storage/' . $celestialBody->images) }}" alt="{{ $celestialBody->name }}" class="" style="width: 100%;">
                    @else
                        <img src="{{ asset('storage/default-image.jpg') }}" alt="No Image Available" class="img-fluid img-full">
                    @endif
                </div></p>
                
                <!-- Title and Content -->
                <div class="text-center mb-5">
                    <h1 class="display-4 mb-3">{{ $celestialBody->name }}</h1>
                    <p class="lead">{!! $celestialBody->content !!}</p>
                </div>

                <!-- Details Section -->
                <div class="details-card">
                    <h2>Details</h2>
                    <div class="detail-item"><strong>Type:</strong> <span>{{ $celestialBody->type }}</span></div>
                    <div class="detail-item"><strong>Mass:</strong> <span>{{ $celestialBody->mass }} kg</span></div>
                    <div class="detail-item"><strong>Radius:</strong> <span>{{ $celestialBody->radius }} km</span></div>
                    <div class="detail-item"><strong>Distance from Sun:</strong> <span>{{ $celestialBody->distance_from_sun }} AU</span></div>
                    <div class="detail-item"><strong>Orbital Period:</strong> <span>{{ $celestialBody->orbital_period }} days</span></div>
                    <div class="detail-item"><strong>Discovery Year:</strong> <span>{{ $celestialBody->discovery_year }}</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<br>

@include('fonend.footer')

<style>
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

    body {
        background: #eee;
    }
    .container {
        margin-top: 50px;
    }
    h1 {
        font-size: 3rem;
        font-weight: bold;
        color: #343a40;
    }
    p.lead {
        font-size: 1.25rem;
        color: #555;
    }
    .details-card {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 30px;
        border: 1px solid #ddd;
    }
    .details-card h2 {
        font-size: 1.75rem;
        color: #007bff;
        margin-bottom: 20px;
    }
    .details-card .detail-item {
        font-size: 1.2rem;
        margin-bottom: 15px;
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }
    .details-card .detail-item:last-child {
        border-bottom: none;
    }
    .img-fluid {
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        border: 1px solid #ddd;
    }
    .img-full {
        width: 100%;
    }
    .btn-custom {
        margin: 10px;
        padding: 12px 25px;
        font-size: 1.1rem;
        border-radius: 30px;
        transition: all 0.3s ease;
    }
    .btn-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
</style>
