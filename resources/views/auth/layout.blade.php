<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="description" content="{{env('APP_NAME')}} aims to simplify and enhance the experience of investing in Automobile, Housing, Agricultural sector, oil and gas, Local and Internationally Bonds and Gadget sales." />
<meta name="keywords" content="investment, payment, earning, make money online, investment platform, how to make money, {{env('APP_NAME')}}" />
<meta name="Classification" content="Investment Platform">
<meta name="target" content="Investment Platform">
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="GOOGLEBOT" content="index follow" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="bingbot" content="index follow" />
<meta name="Slurp" content="index follow" />

<meta property="fb:app_id" content="">
<meta property="og:locale" content="en_US" />
<meta property="og:site_name" content="{{env('APP_NAME')}}" />
<meta property="og:title" content="<?php print @$title; ?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="{{env('APP_NAME')}} aims to simplify and enhance the experience of investing in Automobile, Housing, Agricultural sector, oil and gas, Local and Internationally Bonds and Gadget sales." />
<meta property="og:url" content="https://{{env('APP_NAME')}}global.com/">
<meta property="og:image" content="https://{{env('APP_NAME')}}global.com/img/favicon.png">
<meta property="og:image:secure_url" content="https://{{env('APP_NAME')}}global.com/img/favicon.png" />
<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="415" />

<meta name="twitter:card" content="{{env('APP_NAME')}}" />
<meta name="twitter:url" content="https://{{env('APP_NAME')}}global.com/">
<meta name="twitter:description" content="{{env('APP_NAME')}} aims to simplify and enhance the experience of investing in Automobile, Housing, Agricultural sector, oil and gas, Local and Internationally Bonds and Gadget sales." />
<meta name="twitter:image" content="https://{{env('APP_NAME')}}global.com/img/favicon.png" />
<meta name="twitter:domain" content="https://{{env('APP_NAME')}}global.com/">
<meta name="twitter:creator" content="{{env('APP_NAME')}}">

<meta itemprop="name" content="{{env('APP_NAME')}}">
<meta itemprop="description" content="{{env('APP_NAME')}} aims to simplify and enhance the experience of investing in Automobile, Housing, Agricultural sector, oil and gas, Local and Internationally Bonds and Gadget sales.">
<meta itemprop="image" content="https://{{env('APP_NAME')}}global.com/img/favicon.png">

<link rel="stylesheet" href="{{URL::asset('asset/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('asset/css/meanmenu.css')}}">
<link rel="stylesheet" href="{{URL::asset('asset/css/boxicons.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('asset/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('asset/css/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('asset/css/animate.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('asset/fonts/flaticon.css')}}">
<link rel="stylesheet" href="{{URL::asset('asset/css/odometer.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('asset/css/nice-select.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('asset/css/magnific-popup.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('asset/style.css')}}">
<link rel="stylesheet" href="{{URL::asset('asset/css/style.css')}}">
<link rel="stylesheet" href="{{URL::asset('asset/css/responsive.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/css/app.min.css')}}">
<title><?php print @$title; ?></title>
<link rel="icon" type="image/png" href="{{URL::asset('img/favicon.png')}}">
</head>

<body>

    <div class="navbar-area sticky-top">

        <div class="mobile-nav">
            <a href="{{route('welcome')}}" class="logo">
                <img src="{{URL::asset('img/logo.png')}}" alt="Logo">
            </a>
        </div>

        <div class="main-nav three">
            <div class="container ">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{route('welcome')}}">
                    <img src="{{URL::asset('img/logo.png')}}" style="width: 50%; height:75px" alt="Logo">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{route('welcome')}}" class="nav-link <?php print @$active1 ?>">Home </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('about')}}" class="nav-link <?php print @$active2 ?>">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('how-it-works')}}" class="nav-link <?php print @$active4 ?>">How it works </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('contact')}}" class="nav-link <?php print @$active6 ?>">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle">Accounts <i class="bx bx-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="{{route('auth.login')}}" class="nav-link">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('auth.register')}}" class="nav-link">Register</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div id="myModalRight" class="modal fade modal-right" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{{URL::asset('img/logo.png')}}" alt="Logo">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2>About Us</h2>
                    <p>We are Biz pay.<br>
                        We help over 2000 people feel more confident in their most important financial goals, manage employee benefit programs for over 45 Businesses, and support more than 4 Financial institutions with innovative investments and technology solutions to grow their businesses.
                        Our diverse businesses and independence give us insight into the entire market and the stability needed to think and act for the long term as we deliver value to you.</p>
                    <div class="image-area">
                        <h2>Updates</h2>
                        <div class="row">
                            <div class="col-6 col-lg-4">
                                <a>
                                    <img src="{{URL::asset('img/3.jpeg')}}" alt="Instagram">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </div>
                            <div class="col-6 col-lg-4">
                                <a>
                                    <img src="{{URL::asset('img/5.jpeg')}}" alt="Instagram">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </div>
                            <div class="col-6 col-lg-4">
                                <a>
                                    <img src="{{URL::asset('img/4.jpeg')}}" alt="Instagram">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </div>
                            <div class="col-6 col-lg-4">
                                <a>
                                    <img src="{{URL::asset('img/6.jpeg')}}" alt="Instagram">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </div>
                            <div class="col-6 col-lg-4">
                                <a>
                                    <img src="{{URL::asset('img/2.jpeg')}}" alt="Instagram">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </div>
                            <div class="col-6 col-lg-4">
                                <a>
                                    <img src="{{URL::asset('img/1.jpeg')}}" alt="Instagram">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="social-area">
                        <h3>Our Social Contact</h3>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.twitter.com/" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/" target="_blank">
                                    <i class='bx bxl-linkedin'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/" target="_blank">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @yield('content')

            <!--StartofTawk.toScript--><script type="text/javascript"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0]; s1.async=true; s1.src='https://embed.tawk.to/6122cb47649e0a0a5cd25fff/default'; s1.charset='UTF-8'; s1.setAttribute('crossorigin','*'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->

    <hr>
        <footer class="footer-area three pt-100 pb-70" style="background: white !important;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="footer-item">
                            <div class="footer-logo">
                                <a class="logo" href="./">
                                    <img src="{{URL::asset('img/logo.png')}}" alt="Logo">
                                </a>
                                <p style="color: #000000 !important;">Our diverse businesses and independence give us insight into the entire market and the stability needed to think and act for the long term as we deliver value to you.</p>
                                <ul>
                                    <li>
                                        <i style="color: #2c7920;" class='bx bx-phone-call'></i>
                                        <span style="color: #2c7920;">Phone: </span>
                                        <a style="color: #000000 !important;" href="tel:<?php print $phone;?>"><?php print $phone;?></a>
                                    </li>
                                    <li>
                                        <i style="color: #2c7920;" class='bx bx-mail-send'></i>
                                        <span style="color: #2c7920;">Email: </span>
                                        <a style="color: #000000 !important;" href="mailto:<?php print $email;?>"><span style="color: #000000 !important;" class="__cf_email__" data-cfemail="a3cbc6cfcfcce3c5cacdcccd8dc0ccce"><?php print $email;?></span></a>
                                    </li>
                                    <li>
                                        <a style="color: #000000 !important;" href="https://instagram.com/{{env('APP_NAME')}}global_?utm_medium=copy_link"><i style="color: #2c7920;" class='bx bxl-instagram'></i><span style="color: #000000 !important;" class="__cf_email__" data-cfemail="a3cbc6cfcfcce3c5cacdcccd8dc0ccce">Instagram</span></a>
                                    </li>
                                    <li>
                                        <a style="color: #000000 !important;" href="https://m.facebook.com/{{env('APP_NAME')}}-Global-Investment-107467634964906/?tsid=0.46218908728939245&source=result"><i style="color: #2c7920;" class='bx bxl-facebook-square'></i><span style="color: #000000 !important;" class="__cf_email__" data-cfemail="a3cbc6cfcfcce3c5cacdcccd8dc0ccce">Facebook</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                        <div class="footer-item">
                            <div class="footer-links">
                                <h3 style="color: #2c7920;">Quick Links</h3>
                                <ul>
                                    <li>
                                        <a href="/about" class="text-black">About</a>
                                    </li>
                                    <li>
                                        <a href="/loan-page" class="text-black">Loan</a>
                                    </li>
                                    <li>
                                        <a href="/how-it-works" class="text-black">How it works</a>
                                    </li>
                                    <li>
                                        <a href="{{route('auth.login')}}" class="text-black">Login</a>
                                    </li>
                                    <li>
                                        <a href="{{route('auth.register')}}" class="text-black">Register</a>
                                    </li>
                                    <li>
                                        <a href="/terms" class="text-black">Terms</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


    <div class="copyright-area three">
        <div class="container">
            <div class="copyright-item">
                <p>Copyright ©<?php $d = date('Y');
                                print $d; ?> <?php print $siteName; ?>.</p>
            </div>
        </div>
    </div>


    <div class="go-top">
        <i class='bx bxs-up-arrow'></i>
        <i class='bx bxs-up-arrow'></i>
    </div>


    <script src="{{URL::asset('asset/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{URL::asset('asset/js/popper.min.js')}}"></script>
    <script src="{{URL::asset('asset/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('asset/js/form-validator.min.js')}}"></script>
    <script src="{{URL::asset('asset/js/contact-form-script.js')}}"></script>
    <script src="{{URL::asset('asset/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{URL::asset('asset/js/jquery.meanmenu.js')}}"></script>
    <script src="{{URL::asset('asset/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('asset/js/plugins/lightgallery.min.js')}}"></script>
    <script src="{{URL::asset('asset/js/wow.min.js')}}"></script>
    <script src="{{URL::asset('asset/js/odometer.min.js')}}"></script>
    <script src="{{URL::asset('asset/js/jquery.appear.min.js')}}"></script>
    <script src="{{URL::asset('asset/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{URL::asset('asset/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{URL::asset('asset/js/custom.js')}}"></script>
</body>

</html>