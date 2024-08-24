<div class="" style="margin-bottom: 120px;">
    @include('fonend.header')
</div>

<div class="container mt-5">
    <h1 class="mb-4">Shopping Cart</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('cart') && count(session('cart')) > 0)
        <form id="cart-form">
            @csrf
            @method('PUT')
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session('cart') as $id => $details)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $details['image_url']) }}" class="img-fluid" style="max-width: 100px;">
                                </td>
                                <td>{{ $details['name'] }}</td>
                                <td>
                                    <div class="input-group">
                                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="changeQuantity({{ $id }}, -1)">-</button>
                                        <input type="number" id="quantity-{{ $id }}" name="cart[{{ $id }}][quantity]" value="{{ $details['quantity'] }}" min="1" class="form-control" style="width: 80px;" readonly>
                                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="changeQuantity({{ $id }}, 1)">+</button>
                                        <input type="hidden" name="cart[{{ $id }}][id]" value="{{ $id }}">
                                    </div>
                                </td>
                                <td>${{ $details['price'] }}</td>
                                <td id="total-{{ $id }}">${{ $details['price'] * $details['quantity'] }}</td>
                                <td>
                                    <form action="{{ route('cart.destroy', $id) }}" method="POST" class="d-inline" onsubmit="event.preventDefault(); removeItem({{ $id }});">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Continue Shopping and Checkout Buttons -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Continue Shopping</a>
                <a href="{{ route('checkout.create') }}" class="btn btn-primary">Proceed to Checkout</a>
            </div>
        </form>
    @else
        <p class="alert alert-info">Your cart is empty.</p>
    @endif
</div>

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function changeQuantity(id, delta) {
        const quantityInput = document.getElementById(`quantity-${id}`);
        let newQuantity = parseInt(quantityInput.value) + delta;

        // Prevent quantity from going below 1
        if (newQuantity < 1) newQuantity = 1;

        // Update the quantity input field
        quantityInput.value = newQuantity;

        // Update the total price for this item
        const price = @json(session('cart'))[id]['price'];
        const totalCell = document.getElementById(`total-${id}`);
        totalCell.innerText = `$${(price * newQuantity).toFixed(2)}`;

        // Update the cart via AJAX
        $.ajax({
            url: '{{ route('cart.update') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                cart: {
                    [id]: {
                        id: id,
                        quantity: newQuantity
                    }
                }
            },
            success: function(response) {
                // Handle success response
                console.log('Cart updated successfully.');
            },
            error: function(xhr) {
                // Handle error response
                alert('Error updating cart.');
            }
        });
    }

    function removeItem(id) {
        $.ajax({
            url: '{{ route('cart.destroy', '') }}/' + id,
            type: 'POST',
            data: {
                _method: 'DELETE',
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Handle success response
                location.reload(); // Reload the page to reflect changes
            },
            error: function(xhr) {
                // Handle error response
                alert('Error removing item from cart.');
            }
        });
    }
</script>
