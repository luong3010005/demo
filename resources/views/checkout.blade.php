<div class="" style="margin-bottom: 120px;">
    @include('fonend.header')
</div>

<div class="container mt-5">
    <h1 class="mb-4">Checkout</h1>

    @if (session('cart') && count(session('cart')) > 0)
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Shipping Information Column -->
                <div class="col-md-6 mb-4">
                    <h4>Shipping Information</h4>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="zip">Zip Code</label>
                        <input type="text" name="zip" id="zip" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" name="country" id="country" class="form-control" required>
                    </div>
                </div>

                <!-- Order Summary Column -->
                <div class="col-md-6 mb-4">
                    <h4>Order Summary</h4>
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach (session('cart') as $id => $details)
                                @php
                                    $itemTotal = $details['price'] * $details['quantity'];
                                    $total += $itemTotal;
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $details['image_url']) }}" class="img-fluid" style="max-width: 100px;">
                                    </td>
                                    <td>{{ $details['name'] }}</td>
                                    <td>{{ $details['quantity'] }}</td>
                                    <td>${{ $details['price'] }}</td>
                                    <td>${{ $itemTotal }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right"><strong>Grand Total</strong></td>
                                <td>${{ $total }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Payment Information -->
            <div class="mb-4">
                <h4>Payment Information</h4>
                <p>For simplicity, this example assumes cash on delivery.</p>
            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    @else
        <p class="alert alert-info">Your cart is empty. Add items to your cart before checking out.</p>
    @endif
</div>

<br>
@include('fonend.footer')

<style>
    body {
        background: #f8f9fa;
    }
    .form-group label {
        font-weight: bold;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .table img {
        max-width: 100px;
        max-height: 100px;
        object-fit: cover;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
