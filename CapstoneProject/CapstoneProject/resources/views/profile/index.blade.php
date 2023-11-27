@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center text-center">
      <div class="col register ">
        <form method="POST" action="{{ route('profile.update') }}">
           
          @csrf
          <h1>Profile</h1>
          <p class="navlist-font text-center justify-content-center" style="margin-top: 25px;"> </p>
            
          <div class="row mb-1 justify-content-center text-start">

            <div class="col-md-8">
                <label for="name" class="form-label ">{{ __('Name') }}</label>
            </div>
        </div>
          <div class="row mb-4 justify-content-center text-start">
              {{-- <label for="name" class="col-form-label ">{{ __('Name') }}</label> --}}

              <div class="col-md-8">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="row mb-1 justify-content-center text-start">

            <div class="col-md-8">
                <label for="phone" class="form-label ">{{ __('Phone') }}</label>
            </div>
        </div>

          <div class="row mb-4 justify-content-center" >
              {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

              <div class="col-md-8">
                  <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone Number" value="{{ Auth::user()->phone }}">

                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="row mb-1 justify-content-center text-start">

            <div class="col-md-8">
                <label for="address" class="form-label ">{{ __('Address') }}</label>
            </div>
        </div>

          <div class="row mb-4 justify-content-center">
              {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

              <div class="col-md-8">
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
                      {{ __('Save') }}
                  </button>
              </div>
          </div>
         
          @if (session()->has('profile_update'))
                <div class="row mb-4 justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h5>{{ session('profile_update') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
           @endif
           <div class="row mb-4">
            
        </div>
      </form>
      </div>
    </div>
</div>
@endsection