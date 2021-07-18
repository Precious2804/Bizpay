<!DOCTYPE html>
<html lang="en">


<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
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
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{$loggedUserInfo['image']}}"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello {{$loggedUserInfo['username']}}</div>
              <a href="{{ route('profile') }}" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile
              </a> 
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}"><span class="logo-name">BizPay</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('invest') }}" class="nav-link"><i class="fas fa-wallet"></i><span>Investment</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('withdraw') }}" class="nav-link"><i class="fas fa-money-check"></i><span>Withdrawal</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('referral') }}" class="nav-link"><i class="fas fa-retweet"></i><span>Referral</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('loan') }}" class="nav-link"><i class="fas fa-credit-card"></i><span>Loan</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('new_coupone') }}" class="nav-link"><i class="fas fa-barcode"></i><span>Get New Coupone</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('logout') }}" class="nav-link"><i class="fas fa-sign-out-alt" style="color:red"></i><span>Logout</span></a>
            </li>
          </ul>
        </aside>
      </div>

@yield('content')

    <footer class="main-footer">
        <div class="footer-left">
          <a href="{{ route('welcome') }}">BizPay Investments</a>
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