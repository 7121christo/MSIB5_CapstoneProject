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
            <a href="" class="mt-3"><button type="button" class="btn btn-success "  style="--bs-btn-padding-y: .5rem; --bs-btn-padding-x: 1.6rem; --bs-btn-font-size: 2rem;">Buy Now !</button></a>
        </div>
        
    </div>
    
    {{-- Collection --}}
    <div class="collection justify-content-center text-center">
        <h1>Collection 2023</h1>
        <div class="row justify-content-center">
            <div class="col-10 mt-3">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{asset('assets/img/bag_img.jpg')}}" class="d-block w-100 rounded" style="height:500; width: 568;" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{asset('assets/img/bag2_img.jpg')}}" class="d-block w-100 rounded" style="height:500; width: 568;" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{asset('assets/img/bag3_img.jpg')}}" class="d-block w-100 rounded" style="height:500; width: 568;" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
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
