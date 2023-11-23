@extends('layouts.app')

@section('content')
{{-- <div style="height: 500px;"></div> --}}
<div class="container">
    {{-- Jumbotron --}}
    <div class="jumbo justify-content-center text-center">
        <h1>Coconut Husk Bag</h1>
        <div class="row justify-content-center text-center">
            <p class="col-10 d-flex ">Website to introduce Coconut Husk Bag Aromatherapy products as well as empowerment in the field of Digital Entrepreneurship and expanding marketing networks
                Coconut Husk Bag itself is an aromatherapy bag product with a typical Jepara batik motif made from coconut husk as a fashionable, environmentally friendly product.
            </p>
        </div>
        
    </div>
    
    {{-- Collection --}}
    <div class="collection justify-content-center text-center">
        <h1>Collection 2023</h1>
        <div class="row">
            <div class="col col-lg-3 col-md-8 mb-3" >
                <div class="collection-product"></div>
            </div>
            <div class="col col-lg-3 col-md-8 mb-3" >
                <div class="collection-product"></div>
            </div>
            <div class="col col-lg-3 col-md-8 mb-3" >
                <div class="collection-product"></div>
            </div>
            <div class="col col-lg-3 col-md-8 mb-3" >
                <div class="collection-product"></div>
            </div>
            
        </div>
    </div>
</div>
{{-- <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
