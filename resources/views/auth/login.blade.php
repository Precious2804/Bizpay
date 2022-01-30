<?php
    $title = 'Login | '.env('APP_NAME'); 
?>
@extends('auth.layout')
@section('content')
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <br><br><br><br>  
          <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('do-login') }}" class="needs-validation">
                @if (Session::get('info'))
                    <div class="alert alert-danger">
                        {{Session::get('info')}}
                    </div>
                @endif                
                @if (Session::get('infoEmail'))
                    <div class="alert alert-danger">
                        {{Session::get('infoEmail')}}
                    </div>
                @endif                
                @if (Session::get('status'))
                    <div class="alert alert-success">
                        {{Session::get('status')}}
                    </div>
                @endif                
                @if (Session::get('success_reg'))
                    <div class="alert alert-success">
                        {{Session::get('success_reg')}}
                    </div>
                @endif                
                @if (Session::get('noauth'))
                    <div class="alert alert-danger">
                        {{Session::get('noauth')}}
                    </div>
                @endif                
                @if (Session::get('unverified'))
                    <div class="alert alert-danger">
                        {{Session::get('unverified')}} <br>
                        <a href="{{route('auth.resend-email')}}">Resend Verification Email</a>
                    </div>
                @endif                
                @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="{{route('password.request')}}" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                    <div class="invalid-feedback">
                      Please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="{{ route('auth.register') }}">Register</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @stop