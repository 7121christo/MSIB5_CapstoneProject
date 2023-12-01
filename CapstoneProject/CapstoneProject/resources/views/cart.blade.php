@extends('layouts.app')

@section('content')
<div class="container pt-5 text-dark">

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card py-md-4 px-md-5 p-3">
        <div class="row fw-bolder">
            <div class="col-md-4">
                Product
            </div>
            <div class="col-md-2 text-md-center">
                Price
            </div>
            <div class="col-md-3 text-center">
                Quantity
            </div>
            <div class="col-md-2 text-end">
                Subtotal
            </div>
            <div class="col-md-1 text-end">

            </div>
        </div>
    </div>

    @foreach($userCart as $cartItem)
    <div class="card py-md-4 px-md-5 p-3" id="cart-item-{{ $cartItem->id }}">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center">
                {{ $cartItem->product->name }}
            </div>
            <div class="col-md-2 d-flex align-items-center text-center">
                Rp{{ $cartItem->product->price }}
                <input type="hidden" class="product-price" value="{{ $cartItem->product->price }}">
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <input type="number" class="form-control w-25 amount" value="{{ $cartItem->amount }}" min="1" data-cart-id="{{ $cartItem->id }}">
            </div>
            <div class="col-md-2 d-flex align-items-center justify-content-end total_price">
                Rp{{ $cartItem->total_price }}
            </div>
            <div class="col-md-1 d-flex align-items-center justify-content-end">
                <button class="btn btn-sm btn-danger delete-cart-item" data-cart-id="{{ $cartItem->id }}">
                    Hapus
                </button>
            </div>
        </div>
    </div>
    @endforeach

    <div class="row py-4">
        <div class="col">
            <a href="{{ route('indexshop') }}">
                <button class="btn btn-light px-4 py-2 rounded-0 border border-dark" ">
                    Return to Shop
                </button>
            </a>
            
        </div>
        {{-- <div class="col text-end">
            <button class="btn btn-light px-4 py-2 rounded-0 border border-dark">
                Update Cart
            </button>
        </div> --}}
    </div>

    <div class="row justify-content-end">
        <div class="col-md-4">
            <div class="card p-4 rounded-0 border border-dark">
                <h5 class="pb-3"><b>Cart Total</b></h5>
                <div class="row justify-content-between border-bottom border-secondary-subtle py-3">
                    <div class="col">
                        Subtotal:
                    </div>
                    <div class="col text-end" id="total_price">
                        Rp0
                    </div>
                </div>
                <div class="row justify-content-between border-bottom border-secondary-subtle py-3">
                    <div class="col">
                        Shipping:
                    </div>
                    <div class="col text-end">
                        Free
                    </div>
                </div>
                <div class="row justify-content-between py-3">
                    <div class="col">
                        Total:
                    </div>
                    <div class="col text-end" id="total">
                        Rp0
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col text-end">
                        <form action="{{ route('cart.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-muted px-4 py-2 rounded-0">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Update amount on input change
            $('.amount').change(function () {
                var cartId = $(this).data('cart-id');
                var amount = $(this).val();
                var productPrice = $('#cart-item-' + cartId + ' .product-price').val();

                $.ajax({
                    url: '/cart/update/' + cartId,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        amount: amount
                    },
                    success: function (data) {
                        // Update amount
                        $('#cart-item-' + cartId + ' .amount').val(data.amount);

                        // Update total_price
                        $('#cart-item-' + cartId + ' .total_price').text('Rp' + data.total_price);
                    }
                });
                updateTotal();
            });

            // Delete item on button click
            $('.delete-cart-item').click(function () {
                var cartId = $(this).data('cart-id');

                $.ajax({
                    url: '/cart/delete/' + cartId,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function () {
                        // Remove the card element
                        $('#cart-item-' + cartId).remove();
                    }
                });
                updateTotal();
            });

            updateTotal();

            function updateTotal() {
                $.ajax({
                    url: '/cart/total',
                    type: 'GET',
                    success: function (data) {
                        // Update total_price
                        $('#total_price').text('Rp' + data.total_price);

                        // Update total
                        $('#total').text('Rp' + data.total);
                    }
                });
            }
        });
    </script>

@endsection
