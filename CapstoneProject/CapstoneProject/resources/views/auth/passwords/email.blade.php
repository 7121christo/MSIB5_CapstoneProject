@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px;">
    <div class="row ">
        <div class="col-8 col-md " >
            <div class="pic-image justif-content-center "><img src="{{asset('assets/img/bag_img.jpg')}}" class="rounded mx-auto d-block" style="height:400; width: 568; size:100%; margin-top:95px;" alt=""></div>
          </div>
      <div class="col register justify-content-center" >
        <form method="POST" action="{{ route('password.email') }}">

          @csrf

          
         
          <h1 style="margin-top: 125px;">Password Reset</h1>
          <p class="navlist-font" style="margin-top: 25px;"> Enter your email to get reset link</p>

          

          <div class="row mb-4">
              {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

              <div class="col-md-8">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="row mb-4">
              <div class="col-md-8 d-grid gap-2">
                  <button type="submit" class="btn btn-danger btn-lg text-dark form-button border ">
                      {{ __('Send Password Reset Link') }}
                  </button>
              </div>
          </div>
          @if (session('status'))
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                       </div>
                    </div>
                </div>
         @endif
      </form>
      </div>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
