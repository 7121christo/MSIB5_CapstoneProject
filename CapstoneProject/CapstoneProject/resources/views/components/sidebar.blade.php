<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-xl-center justify-content-md-between">
            <a href="{{route('home')}}" class="mt-3 text-xl-center logo-img">
                <h3 style="font-family: 'Helvetica Neue', sans-serif; color: #007bff;  font-weight: bold; text-shadow: -6px 5px 7px rgba(0, 0, 0, 0.3);">Coconut Husk Bag</h3>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="fa-solid fa-xmark fa-2xl"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('products') }}">
                        <i class="fa-solid fa-box fa-2xl"></i>
                        <span>Product</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="fa-solid fa-bag-shopping fa-2xl"></i>
                        <span>View Orders</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
