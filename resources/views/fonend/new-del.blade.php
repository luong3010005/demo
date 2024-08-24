
<div class="" style="margin-bottom: 120px;">
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
</style>

<div class=" mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        @foreach ($news as $item)

            <div class="col-md-11">
                <div class="row p-2 bg-white border rounded">
                    <div class="col-md-3 mt-1">
                        @if ($item->images)
                            <img src="{{ asset('storage/' . $item->images) }}" alt="{{ $item->name }}"
                                class="img-fluid img-responsive rounded product-image">
                        @endif
                    </div>
                    <div class="col-md-9 mt-1">
                        <h3>{{ $item->name }}</h3>
                        <p class="mt-2 text-justify text-truncate para mb-0">{{ Str::limit($item->short_description, 400) }}
                        </p>
                        <a href="{{ route('news.show', $item->slug) }}" class="btn btn-primary mt-2">See More</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<br>
@include('fonend.footer')
