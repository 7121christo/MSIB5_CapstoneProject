@extends('layouts.app')

@section('content')
    <div class="container shop">
        <h1>Product Catalog</h1>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0">

                    <div class="card-group  justify-content-start">
                        <div class="row">
                        @foreach ($products as $product)
                            <div class="card col-md-3 col-6 m-3 border-0 " style="width: 18rem;">
                                <img class="card-img-top rounded" {{--src="{{ url('storage/' . $product->image) }}"--}}src="{{ asset('images/products/'. $product->image) }}" alt="image"  width="200" style="height: 200;">
                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8 text-start ps-0">
                                            <p class="card-text">{{ $product->name }}</p>
                                            <p class="card-text">Rp {{ $product->price }},00</p>
                                        
                                        </div>
                                        <div class="col-4 text-end">
                                            <p>Stock:   {{$product->stock}}</p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <form action="{{ route('detailshop', $product) }}" method="get">
                                    <button type="submit" class="btn btn-success">Show detail</button>
                                     </form>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
