@extends('layouts.app')

@section('content')
    <div class="container shop-detail" style="margin-bottom: 200px;">
        <h1 class="head">Product Details</h1>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card pt-5 pb-5">
                    
                    <div class="card-body ">
                        <div class="row d-flex justify-content-evenly ">
                            <div class="col-5">
                                <img src="{{ asset('images/products/'. $product->image) }}" alt="image" width="400px" style="height: 400;" class="rounded img-thumbnail ">
                            </div>
                            <div class="col-7">
                                <h1>{{ $product->name }}</h1>
                                <h6>{{ $product->description }}</h6>
                                <h3>Rp{{ $product->price }}</h3>
                                <hr>
                                <p>{{ $product->stock }} left</p>

                                <form action="{{ route('cart.add', $product) }}" method="post">
                                @csrf
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" aria-describedby="basic-addon2"
                                                name="amount" value=1 min=1 max={{ $product->stock }}>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-success" type="submit">Add to Cart</button>
                                                </div>
                                            </div>
                                    </form>
                            </div>
                        </div>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
