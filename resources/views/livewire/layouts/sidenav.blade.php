<div class="sidenav-black-overlay"></div>

<div class="sidenav-wrapper" id="sidenavWrapper">
    <!-- Go Back Button-->
    <div class="go-back-btn" id="goBack">
        <svg class="bi bi-x" width="24" height="24" viewBox="0 0 16 16" fill="currentColor"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"></path>
            <path fill-rule="evenodd"
                d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"></path>
        </svg>
    </div>


    <!-- Sidenav Profile-->
    <div class="sidenav-profile">
        <div class="sidenav-style1"></div>
        @guest
            <!-- User Thumbnail-->
            <div class="user-profile"><img src="{{ asset('frontend2mob/img/icons/ACoding.png') }}" alt=""></div>
            <!-- User Info-->
            <div class="user-info">
                <h6 class="user-name mb-0">Pak Realtors</h6>
            </div>
        @endguest

        @auth
            <!-- User Thumbnail-->
            <div class="user-profile"><img src="{{ asset('frontend2mob/img/bg-img/avatar.png') }}" alt=""></div>
            <!-- User Info-->
            <div class="user-info">
                <h6 class="user-name mb-0">{{ auth()->user()->name }}</h6><span>{{ auth()->user()->role->name }}</span>
            </div>
        @endauth
    </div>


    <!-- Sidenav Nav-->
    <ul class="sidenav-nav ps-0">
        <li><a href="{{ route('customer.home') }}">
                <svg width="18" height="18" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                    <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                </svg>Home</a></li>
        <li><a href="{{ route('customer.property.index') }}"><svg width="18" height="18" viewBox="0 0 16 16"
                    class="bi bi-building" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                    <path
                        d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                </svg>Properties <span class="badge bg-success rounded-pill ms-2">1000+</span></a></li></a></li>
        <li><a href="{{ route('customer.agency.index') }}">
                <svg id="Layer_5"  height="20" viewBox="0 0 64 64" width="20"
                class="bi bi-building" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m9 49.184v-13.184h-2v13.184c-1.161.414-2 1.514-2 2.816 0 1.654 1.346 3 3 3s3-1.346 3-3c0-1.302-.839-2.402-2-2.816zm-1 3.816c-.552 0-1-.448-1-1s.448-1 1-1 1 .448 1 1-.448 1-1 1z" />
                    <path
                        d="m14 36c-1.654 0-3 1.346-3 3 0 1.302.839 2.402 2 2.816v13.184h2v-13.184c1.161-.414 2-1.514 2-2.816 0-1.654-1.346-3-3-3zm0 4c-.552 0-1-.448-1-1s.448-1 1-1 1 .448 1 1-.448 1-1 1z" />
                    <path
                        d="m53 49.184v-13.184h-2v13.184c-1.161.414-2 1.514-2 2.816 0 1.654 1.346 3 3 3s3-1.346 3-3c0-1.302-.839-2.402-2-2.816zm-1 3.816c-.552 0-1-.448-1-1s.448-1 1-1 1 .448 1 1-.448 1-1 1z" />
                    <path
                        d="m58 36c-1.654 0-3 1.346-3 3 0 1.302.839 2.402 2 2.816v13.184h2v-13.184c1.161-.414 2-1.514 2-2.816 0-1.654-1.346-3-3-3zm0 4c-.552 0-1-.448-1-1s.448-1 1-1 1 .448 1 1-.448 1-1 1z" />
                    <path
                        d="m44 33c-.395 0-.77.081-1.116.22-.345-1.275-1.501-2.22-2.884-2.22-.771 0-1.468.301-2 .78-.532-.48-1.229-.78-2-.78-.352 0-.686.072-1 .184v-8.605c4.158-1.178 7.235-4.724 7.87-8.959l4.228 2.326c-2.479 1.821-4.098 4.749-4.098 8.054 0 5.514 4.486 10 10 10s10-4.486 10-10-4.486-10-10-10c-1.371 0-2.679.278-3.87.78l-6.161-3.389c-.318-5.781-5.109-10.391-10.969-10.391s-10.651 4.61-10.969 10.392l-6.161 3.388c-1.191-.502-2.498-.78-3.87-.78-5.514 0-10 4.486-10 10s4.486 10 10 10 10-4.486 10-10c0-3.306-1.619-6.233-4.099-8.055l4.229-2.326c.635 4.239 3.71 7.783 7.871 8.961v18.433c0 .455-.105.911-.306 1.319l-.839-4.194c-.601-3.002-3.259-5.181-6.32-5.181-1.397 0-2.535 1.138-2.535 2.535 0 .502.147.988.426 1.406l1.029 1.544c.381.571.627 1.233.712 1.914l.692 5.533c.114.923.406 1.8.837 2.547l3.303 6.794v1.77h-2v6h22v-6h-2v-1.667l1.6-2.133c.903-1.203 1.4-2.694 1.4-4.2v-13c0-1.654-1.346-3-3-3zm9-1c-1.799 0-3.455-.604-4.792-1.609 1.125-1.492 2.895-2.391 4.792-2.391s3.667.899 4.792 2.391c-1.337 1.005-2.993 1.609-4.792 1.609zm-3-9c0-1.654 1.346-3 3-3s3 1.346 3 3-1.346 3-3 3-3-1.346-3-3zm3-7c4.411 0 8 3.589 8 8 0 1.893-.664 3.633-1.768 5.004-.792-.986-1.796-1.763-2.931-2.278 1.034-.917 1.699-2.239 1.699-3.726 0-2.757-2.243-5-5-5s-5 2.243-5 5c0 1.487.665 2.809 1.699 3.726-1.135.516-2.139 1.292-2.931 2.278-1.104-1.371-1.768-3.111-1.768-5.004 0-4.411 3.589-8 8-8zm-42 16c-1.799 0-3.455-.604-4.792-1.609 1.125-1.492 2.895-2.391 4.792-2.391s3.667.899 4.792 2.391c-1.337 1.005-2.993 1.609-4.792 1.609zm-3-9c0-1.654 1.346-3 3-3s3 1.346 3 3-1.346 3-3 3-3-1.346-3-3zm11 1c0 1.893-.664 3.633-1.768 5.004-.792-.986-1.796-1.763-2.931-2.278 1.034-.917 1.699-2.239 1.699-3.726 0-2.757-2.243-5-5-5s-5 2.243-5 5c0 1.487.665 2.809 1.699 3.726-1.135.516-2.139 1.292-2.931 2.278-1.104-1.371-1.768-3.111-1.768-5.004 0-4.411 3.589-8 8-8s8 3.589 8 8zm4-12c0-4.963 4.037-9 9-9s9 4.037 9 9c0 2.017-.685 3.907-1.842 5.432-.823-1.659-2.186-2.965-3.844-3.717 1.026-.916 1.686-2.234 1.686-3.715 0-2.757-2.243-5-5-5s-5 2.243-5 5c0 1.481.66 2.799 1.686 3.715-1.659.752-3.022 2.059-3.845 3.718-1.157-1.524-1.841-3.414-1.841-5.433zm12-2c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm-8.638 9.003c.838-2.379 3.066-4.003 5.638-4.003 2.57 0 4.798 1.624 5.638 4.001-.876.709-1.886 1.262-2.998 1.603-.505-.949-1.492-1.604-2.64-1.604s-2.135.655-2.639 1.604c-1.113-.341-2.123-.893-2.999-1.601zm17.638 41.997h-18v-2h18zm1-12c0 1.075-.355 2.141-1 3l-2 2.667v2.333h-14v-2.23l-3.536-7.267c-.33-.575-.538-1.2-.62-1.859l-.692-5.534c-.123-.987-.479-1.947-1.032-2.775l-1.03-1.545c-.059-.088-.09-.191-.09-.298 0-.295.24-.534.535-.534 2.111 0 3.944 1.503 4.359 3.573l1.286 6.427h2.438l.854-1.709c.345-.69.528-1.464.528-2.235v-19.014c0-.552.448-1 1-1s1 .448 1 1v12 4h2v-4c0-.552.448-1 1-1s1 .448 1 1v4h2v-4c0-.552.448-1 1-1s1 .448 1 1v2 2h2v-2c0-.552.448-1 1-1s1 .448 1 1z" />
                </svg>
                Agencies <span class="badge bg-success rounded-pill ms-2">500+</span></a></li></a></li>

        <li>
            <div class="night-mode-nav">
                <svg width="18" height="18" viewBox="0 0 16 16" class="bi bi-moon" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z" />
                </svg>Night Mode<div class="form-check form-switch">
                    <input class="form-check-input form-check-success" type="checkbox" id="darkSwitch">
                </div>
            </div>
        </li>
        @guest

            <li><a href="{{ route('login') }}">
                    <svg width="18" height="18" viewBox="0 0 16 16" class="bi bi-box-arrow-right" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                        <path fill-rule="evenodd"
                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                    </svg>Login</a>
            </li>

            {{-- <li class="affan-dropdown-menu">
                <a href="#">
                    <svg width="18" height="18" viewBox="0 0 16 16" class="bi bi-cart-check" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        <path fill-rule="evenodd"
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>Shop
                </a>
                <ul>
                    <li><a href="page-shop-grid.html">- Shop Grid</a></li>
                    <li><a href="page-shop-list.html">- Shop List</a></li>
                    <li><a href="page-shop-details.html">- Shop Details</a></li>
                    <li><a href="page-cart.html">- Cart</a></li>
                    <li><a href="page-checkout.html">- Checkout</a></li>
                </ul>
            </li>
            <li>
                <a href="settings.html">
                    <svg width="18" height="18" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
                        <path fill-rule="evenodd"
                            d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
                    </svg>Settings
                </a>
            </li>
            <li><a href="elements.html">
                    <svg width="18" height="18" viewBox="0 0 16 16" class="bi bi-folder2-open" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14V3.5zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5V6zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7H1.633z" />
                    </svg>Elements<span class="badge bg-danger rounded-pill ms-2">220+</span></a></li>
            <li><a href="pages.html">
                    <svg width="18" height="18" viewBox="0 0 16 16" class="bi bi-collection" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z" />
                    </svg>Pages<span class="badge bg-success rounded-pill ms-2">38</span></a>
            </li> --}}

        @endguest

        @auth


            <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <svg width="18" height="18" viewBox="0 0 16 16" class="bi bi-box-arrow-right" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                        <path fill-rule="evenodd"
                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                    </svg>Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

        @endauth
    </ul>
    <!-- Social Info-->
    <div class="social-info-wrap"><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i
                class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-dribbble"></i></a></div>
    <!-- Copyright Info-->
    <div class="copyright-info">
        <p>&copy; 2021 All rights reserved by <br><a href="{{ route('home') }}">Pak Realtors</a></p>
    </div>
</div>
