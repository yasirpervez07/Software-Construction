<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Real Villa - Real Estate HTML5 Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Real Villa - Real Estate HTML5 Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:300,500,600,700%7CRoboto:300,400,500,700">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="{{ asset('frontend2/css/font-awesome/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend2/css/flaticon/flaticon.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="{{ asset('frontend2/css/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend2/css/range-slider/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend2/css/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend2/css/magnific-popup/magnific-popup.css') }}" />

    <!-- Template Style -->
    <link rel="stylesheet" href="{{ asset('frontend2/css/style.css') }}" />
    <!-- JS Global Compulsory (Do not remove)-->
    <script src="{{ asset('frontend2/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend2/js/popper/popper.min.js') }}"></script>
    <script src="{{ asset('frontend2/js/bootstrap/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/global.js') }}"></script>

    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="{{ asset('frontend2/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('frontend2/js/counter/jquery.countTo.js') }}"></script>
    <script src="{{ asset('frontend2/js/select2/select2.full.js') }}"></script>
    <script src="{{ asset('frontend2/js/range-slider/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('frontend2/js/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend2/js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend2/js/countdown/jquery.downCount.js') }}"></script>
    <link href="{{ asset('customer/css/styles.css') }}?fd365619e86ad9137a29" rel="stylesheet">

    <!-- Template Scripts (Do not remove)-->
    <script src="{{ asset('frontend2/js/custom.js') }}"></script>
    @include('frontend2.home.ajaxrequests')

</head>

<body>

    <!--=================================
header -->
    <header class="header header-transparent mt-3">
        <nav class="navbar navbar-dark navbar-static-top navbar-expand-lg header-sticky">
            <div class="container-fluid">
                <button type="button" class="navbar-toggler" data-toggle="collapse"
                    data-target=".navbar-collapse">☰</button>
                <a class="navbar-brand" href="index.html">
                    <img class="img-fluid" src="images/logo-light.svg" alt="logo">
                </a>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown active">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('customer.property.index')}}">Property</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('customer.agency.index')}}">Agency</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="public-notice.html">Public Notice</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
                    </ul>


                </div>
                <div class="d-flex align-items-center">
                    <div class="call mr-4">
                        <a href="tel:1-800-555-1234"><i class="fa fa-phone mr-2 fa-flip-horizontal"></i>1-800-555-1234
                        </a>
                    </div>
                    <div class="login mr-4">
                        <a data-toggle="modal" data-target="#loginModal" href="#">Hello sign in<i
                                class="fa fa-user pl-2"></i></a>
                    </div>
                    <div class="add-listing d-none d-sm-block">
                        {{-- <a class="btn btn-primary btn-md" href="submit-property.html"> <i
                                class="fa fa-plus-circle"></i>Add listing </a> --}}
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!--=================================
 header -->

    <!--=================================
 Modal login -->
    <div class="modal login fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="loginModalLabel">Log in & Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs nav-tabs-02 justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab"
                                aria-controls="login" aria-selected="false">Log in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                                aria-controls="register" aria-selected="true">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <form class="form-row mt-4 align-items-center">
                                <div class="form-group col-sm-12">
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group col-sm-12">
                                    <input type="Password" class="form-control" placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                                        <li class="mr-1"><a href="#"><b>Already Registered User? Click here to
                                                    login</b></a></li>
                                    </ul>
                                </div>
                            </form>
                            <div class="login-social-media border pl-4 pr-4 pb-4 pt-0 rounded">
                                <div class="mb-4 d-block text-center"><b class="bg-white pl-2 pr-2 mt-3 d-block">Login
                                        or Sign in with</b></div>
                                <form class="row">
                                    <div class="col-sm-6">
                                        <a class="btn facebook-bg social-bg-hover d-block mb-3" href="#"><span><i
                                                    class="fab fa-facebook-f"></i>Login with Facebook</span></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a class="btn twitter-bg social-bg-hover d-block mb-3" href="#"><span><i
                                                    class="fab fa-twitter"></i>Login with Twitter</span></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a class="btn google-bg social-bg-hover d-block mb-3 mb-sm-0" href="#"><span><i
                                                    class="fab fa-google"></i>Login with Google</span></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a class="btn linkedin-bg social-bg-hover d-block" href="#"><span><i
                                                    class="fab fa-linkedin-in"></i>Login with Linkedin</span></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <form class="form-row mt-4 mb-5 align-items-center">
                                <div class="form-group col-sm-12">
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group col-sm-12">
                                    <input type="email" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="form-group col-sm-12">
                                    <input type="Password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group col-sm-12">
                                    <input type="Password" class="form-control" placeholder="Confirm Password">
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                                        <li class="mr-1"><a href="#"><b>Already Registered User? Click here to
                                                    login</b></a></li>
                                    </ul>
                                </div>
                            </form>
                            <div class="login-social-media border pl-4 pr-4 pb-4 pt-0 rounded">
                                <div class="mb-4 d-block text-center"><b class="bg-white pl-2 pr-2 mt-3 d-block">Login
                                        or Sign in with</b></div>
                                <form class="row">
                                    <div class="col-sm-6">
                                        <a class="btn facebook-bg social-bg-hover d-block mb-3" href="#"><span><i
                                                    class="fab fa-facebook-f"></i>Login with Facebook</span></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a class="btn twitter-bg social-bg-hover d-block mb-3" href="#"><span><i
                                                    class="fab fa-twitter"></i>Login with Twitter</span></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a class="btn google-bg social-bg-hover d-block mb-3 mb-sm-0" href="#"><span><i
                                                    class="fab fa-google"></i>Login with Google</span></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a class="btn linkedin-bg social-bg-hover d-block" href="#"><span><i
                                                    class="fab fa-linkedin-in"></i>Login with Linkedin</span></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=================================
  Modal login -->





    @yield('content')






    <!--=================================
newsletter -->
    <section class="py-5 bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h3 class="text-white mb-0">Sign up to our newsletter to get the latest news and offers.</h3>
                </div>
                <div class="col-md-7 mt-3 mt-md-0">
                    <div class="newsletter">
                        <form>
                            <div class="form-group mb-0">
                                <input type="email" class="form-control" placeholder="Enter email">
                            </div>
                            <button type="submit" class="btn btn-dark b-radius-left-none">Get notified</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
  newsletter -->

    <!--=================================
  footer-->
    <footer class="footer bg-dark space-pt">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-contact-info">
                        <h5 class="text-primary mb-4">About real villa</h5>
                        <p class="text-white mb-4">Real Villa helped thousands of clients to find the right property for
                            their needs.</p>
                        <ul class="list-unstyled mb-0">
                            <li> <b> <i class="fas fa-map-marker-alt"></i></b><span>214 West Arnold St. New York, NY
                                    10002</span> </li>
                            <li> <b><i class="fas fa-microphone-alt"></i></b><span>(123) 345-6789</span> </li>
                            <li> <b><i class="fas fa-headset"></i></b><span>support@realvilla.demo</span> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                    <div class="footer-link">
                        <h5 class="text-primary mb-4">Useful links</h5>
                        <ul class="list-unstyled mb-0">
                            <li> <a href="#">Commercial </a> </li>
                            <li> <a href="#">House </a> </li>
                            <li> <a href="#">Office </a> </li>
                            <li> <a href="#">Residential </a> </li>
                            <li> <a href="#">Residential Tower </a> </li>
                        </ul>
                        <ul class="list-unstyled mb-0">
                            <li> <a href="#">Beverly Hills </a> </li>
                            <li> <a href="#">Los angeles </a> </li>
                            <li> <a href="#">Mission Viejo </a> </li>
                            <li> <a href="#">Newport </a> </li>
                            <li> <a href="#">Beach Pasadena </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <div class="footer-recent-List">
                        <h5 class="text-primary mb-4">Recently listed properties</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <div class="footer-recent-list-item">
                                    <img class="img-fluid" src="images/property/list/01.jpg" alt="">
                                    <div class="footer-recent-list-item-info">
                                        <h6 class="text-white"><a class="category font-md mb-2"
                                                href="property-detail-style-01.html">Awesome family home</a></h6>
                                        <a class="address mb-2 font-sm" href="#">Vermont dr. hephzibah</a>
                                        <span class="price text-white">$3,456,235 </span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="footer-recent-list-item">
                                    <img class="img-fluid" src="images/property/list/02.jpg" alt="">
                                    <div class="footer-recent-list-item-info">
                                        <h6 class="text-white"><a class="category font-md mb-2"
                                                href="property-detail-style-01.html">Lawn court villa</a></h6>
                                        <a class="address mb-2 font-sm" href="#">Newport st. mebane, nc</a>
                                        <span class="price text-white">$1,265,456 </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <h5 class="text-primary mb-4">Subscribe us</h5>
                    <div class="footer-subscribe">
                        <p class="text-white">Sign up to our newsletter to get the latest news and offers.</p>
                        <form>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter email">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Get notified</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center text-md-left">
                        <a href="index.html"><img class="img-fluid footer-logo" src="images/logo-light.svg" alt=""> </a>
                    </div>
                    <div class="col-md-4 text-center my-3 mt-md-0 mb-md-0">
                        <a id="back-to-top" class="back-to-top" href="#"><i class="fas fa-angle-double-up"></i> </a>
                    </div>
                    <div class="col-md-4 text-center text-md-right">
                        <script>
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                        </script></span> <a href="#"> Real villa </a> All Rights Reserved </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--=================================
  footer-->

    <!--=================================
  Javascript -->





</body>

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/real-villa/index-02.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 Jun 2021 10:53:23 GMT -->

</html>
