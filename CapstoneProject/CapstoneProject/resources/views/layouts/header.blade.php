{{-- Header --}}

<nav class="navbar navbar-expand-lg  bg-white mt-3">
    <div class="container">
      <a class="navbar-brand nav-font fs-3 mb-3" href="">Coconut Husk Bag</a>
      <button class="navbar-toggler mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarToggler" >
        <div class="navbar-nav ms-auto ">
          <a class="nav-link navlist-font" aria-current="page" href="{{route('home')}}" >Home</a>
          <a class="nav-link navlist-font" href="{{route('indexshop')}}">Shop</a>
          @guest
          <a class="nav-link navlist-font" href="{{route('register')}}" >Sign Up</a>


          @else
          <a class="nav-link navlist-font text-danger fw-bold" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
          </a>


              <div class="dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle navlist-font" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  @auth
                  {{ Auth::user()->name }}
                  @endauth
                </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route('profile')}}"><i class="fa fa-user me-3" aria-hidden="true"> </i>Profile </a></li>
                  <li><a class="dropdown-item" href="{{route('cart.index')}}"><i class="fa fa-shopping-cart me-3" aria-hidden="true"></i>Cart</a></li>
                  <li><a class="dropdown-item" href="{{ route('indextransaction') }}"><i class="fa fa-history me-3" aria-hidden="true"></i>Transaction</a></li>
                  @if (Auth::user()->is_admin==1)
                    <li><a class="dropdown-item" href="{{route('products')}}"><i class="fa fa-lock me-3" aria-hidden="true"></i>Dashboard</a></li>
                  @endif

                </ul>
              </div>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>




          @endguest
          {{-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="What are you looking for?" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form> --}}

        </div>
      </div>

    </div>
  </nav>
{{-- !Header --}}
