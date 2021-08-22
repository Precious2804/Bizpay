<!DOCTYPE html>
<html lang="en">


<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="Bizpay Global aims to simplify and enhance the experience of investing in Automobile, Housing, Agricultural sector, oil and gas, Local and Internationally Bonds and Gadget sales."/>
        <meta name="keywords" content="investment, payment, earning, make money online, investment platform, how to make money, Bizpay Global"/>
        <meta name="Classification" content="Investment Platform">
        <meta name="target" content="Investment Platform">
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="GOOGLEBOT" content="index follow"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="bingbot" content="index follow" />
        <meta name="Slurp" content="index follow" />

        <meta property="fb:app_id" content="">
        <meta property="og:locale" content="en_US" />
        <meta property="og:site_name" content="Bizpay Global"/>
        <meta property="og:title" content="<?php print @$title;?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:description" content="Bizpay Global aims to simplify and enhance the experience of investing in Automobile, Housing, Agricultural sector, oil and gas, Local and Internationally Bonds and Gadget sales." />
        <meta property="og:url" content="https://bizpayglobal.com/">
        <meta property="og:image" content="https://bizpayglobal.com/img/favicon.png">
        <meta property="og:image:secure_url" content="https://bizpayglobal.com/img/favicon.png" />
        <meta property="og:image:width" content="600" />
        <meta property="og:image:height" content="415" />

        <meta name="twitter:card" content="Bizpay Global"/>
        <meta name="twitter:url" content="https://bizpayglobal.com/">
        <meta name="twitter:description" content="Bizpay Global aims to simplify and enhance the experience of investing in Automobile, Housing, Agricultural sector, oil and gas, Local and Internationally Bonds and Gadget sales."/>
        <meta name="twitter:image" content="https://bizpayglobal.com/img/favicon.png"/>
        <meta name="twitter:domain" content="https://bizpayglobal.com/">
        <meta name="twitter:creator" content="Bizpay Global">

        <meta itemprop="name" content="Bizpay Global">
        <meta itemprop="description" content="Bizpay Global aims to simplify and enhance the experience of investing in Automobile, Housing, Agricultural sector, oil and gas, Local and Internationally Bonds and Gadget sales.">
        <meta itemprop="image" content="https://bizpayglobal.com/img/favicon.png">
  <title>Bizpay</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{URL::asset('assets/css/app.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/bundles/bootstrap-social/bootstrap-social.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{URL::asset('assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{URL::asset('assets/img/favicon.ico')}}" />
</head>

<body>
<div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
            </li>
          </ul>
        </div>
        <a href="{{ route('profile') }}" style="color: green;"><div class="text text-success">{{$loggedUserInfo['first_name']}} {{$loggedUserInfo['last_name']}}</div></a>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown">
              <a href="{{ route('profile') }}" class="dropdown-item has-icon text-success"> <i class="far fa-user"></i> Profile
              </a> 
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}"><span class="logo-name"><img src="{{URL::asset('assets/img/Bizpayglobal_logo.png')}}" style="width: 150px;" alt=""></span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-desktop" style="color:green;"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('invest') }}" class="nav-link"><i class="fas fa-wallet" style="color:green;"></i><span>Investment</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('withdraw') }}" class="nav-link"><i class="fas fa-money-check" style="color:green;"></i><span>Withdrawal</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('referral') }}" class="nav-link"><i class="fas fa-retweet" style="color:green;"></i><span>Referral</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('loan') }}" class="nav-link"><i class="fas fa-credit-card" style="color:green;"></i><span>Loan</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('new_coupone') }}" class="nav-link"><i class="fas fa-barcode" style="color:green;"></i><span>Get New Coupon</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('logout') }}" class="nav-link"><i class="fas fa-sign-out-alt" style="color:red"></i><span style="color:red"> Logout</span></a>
            </li>
          </ul>
        </aside>
      </div>

@yield('content')
        <!--StartofTawk.toScript--><script type="text/javascript"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0]; s1.async=true; s1.src='https://embed.tawk.to/6122cb47649e0a0a5cd25fff/default'; s1.charset='UTF-8'; s1.setAttribute('crossorigin','*'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->

    <footer class="main-footer">
        <div class="footer-left">
          <a href="{{ route('dashboard') }}">BizPay Global Investments</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{URL::asset('assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{URL::asset('assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
  <script src="{{URL::asset('assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{URL::asset('assets/js/page/auth-register.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{URL::asset('assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{URL::asset('assets/js/custom.js')}}"></script>
    <!-- Page Specific JS File -->
    <script src="{{URL::asset('assets/js/page/index.js')}}"></script>
    <script src="{{URL::asset('assets/bundles/apexcharts/apexcharts.min.js')}}"></script>

  </body>

<!-- auth-register.html  21 Nov 2019 04:05:02 GMT -->
</html>