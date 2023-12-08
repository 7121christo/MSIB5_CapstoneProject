@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 100px;">
    <h1>Billing Details</h1>
    <div class="row justify-content-start ">
        <div class="col-8 col-md register justify-content-start ">
            <form method="POST" action="{{ route('precheckout.update') }}">
               
              @csrf
              
              <p class="navlist-font text-center justify-content-center" style="margin-top: 25px;"> </p>
                
              <div class="row mb-1 justify-content-start text-start">
    
                <div class="col-md-8">
                    <label for="name" class="form-label ">{{ __('Name') }}</label>
                </div>
            </div>
              <div class="row mb-4 justify-content-start text-start">
                  {{-- <label for="name" class="col-form-label ">{{ __('Name') }}</label> --}}
    
                  <div class="col-md-12">
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
    
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
    
              <div class="row mb-1 justify-content-startr text-start">
    
                <div class="col-md-8">
                    <label for="phone" class="form-label ">{{ __('Phone') }}</label>
                </div>
            </div>
    
              <div class="row mb-4 justify-content-start" >
                  {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}
    
                  <div class="col-md-12">
                      <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone Number" value="{{ Auth::user()->phone }}">
    
                      @error('phone')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
    
              <div class="row mb-1 justify-content-start text-start">
    
                <div class="col-md-8">
                    <label for="address" class="form-label ">{{ __('Address') }}</label>
                </div>
            </div>
    
              <div class="row mb-4 justify-content-start">
                  {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}
    
                  <div class="col-md-12">
                      <textarea id="address"  class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" value="{{ Auth::user()->address }}" rows="5"> {{ Auth::user()->address }}</textarea>
    
                      @error('address')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
    
              
    
              <div class="row mb-4 justify-content-center">
                  <div class="col-md-8 d-grid gap-2">
                      <button type="submit" class="btn btn-danger btn-lg text-dark form-button border ">
                          {{ __('Update') }}
                      </button>
                  </div>
              </div>
             
              @if (session()->has('checkout_update'))
                    <div class="row mb-4 justify-content-center">
                        <div class="col-md-8">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <h5>{{ session('checkout_update') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
               @endif
               <div class="row mb-4">
                
            </div>
          </form>
          </div>
      <div class="col register">
        <div class="card py-md-4 px-md-4  border-0">
            <div class="row fw-bolder">
                <div class="col-md-8">
                    Product
                </div>
                
                <div class="col-md-4 text-center">
                    Quantity
                </div>
            </div>
        </div>

        @foreach ($cartItems as $cartItem)
        <div class="card py-md-4 px-md-4 p-3 border-0 " id="cart-item-{{ $cartItem->id }}">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    {{ $cartItem->product->name }}
                </div>
                <div class="col-md-4 d-flex justify-content-center">
                    {{$cartItem->amount}}
                </div>
                
        
            </div>
        </div>
        @endforeach

        <div class="card p-4 rounded-0 border border-0">
            <h5 class="pb-3"><b>Total</b></h5>
            <div class="row justify-content-between border-bottom border-secondary-subtle py-3">
                <div class="col">
                    Subtotal:
                </div>
                <div class="col text-end" id="total_price">
                    Rp {{number_format($totalPrice,2,",",".")}}
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
                    Rp {{number_format($totalPrice,2,",",".")}}
                </div>
            </div>
            <div class="row pt-4">
                <div class="col text-end">
            <form action="{{ route('checkout') }}{{--{{ route('cart.checkout') }}  --}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-muted px-4 py-2 rounded-0 border-dark" >Checkout</button>
                    </form>
                </div>
            </div>
        </div>


      </div>
    </div>
</div>
    
@endsection