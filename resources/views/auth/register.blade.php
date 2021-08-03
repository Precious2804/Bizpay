<?php
$title = 'Register | Bizpay Global';
?>

@extends('auth.layout')
@section('content')
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2" style="padding-top: 55px;">
          <div class="card card-primary">
            <div class="card-header">
              <h4 style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 20px">Register Here</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('do-register')}}">
                @csrf
                @if (Session::get('verifyEmail'))
                <div class="alert alert-success">
                  {{Session::get('verifyEmail')}}
                </div>
                @endif
                @if (Session::get('fail'))
                <div class="alert alert-danger">
                  {{Session::get('fail')}}
                </div>
                @endif
                @if (Session::get('ageFail'))
                <div class="alert alert-danger">
                  {{Session::get('ageFail')}}
                </div>
                @endif
                @if (Session::get('usedCoup'))
                <div class="alert alert-danger">
                  {{Session::get('usedCoup')}}
                </div>
                @endif
                <div class="row">
                  <div class="form-group col-6">
                    <label for="frist_name">First Name</label>
                    <input id="frist_name" type="text" class="form-control" placeholder="Enter First Name" name="first_name" value="{{old('first_name')}}" autofocus>
                  </div>
                  <div class="form-group col-6">
                    <label for="last_name">Last Name</label>
                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{old('last_name')}}" placeholder="Enter Last Name">
                  </div>
                  <div class="form-group col-6">
                    <label for="last_name">Phone <strong class="text text-danger">*</strong></label>
                    <input id="last_name" type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Choose a UserName">
                    <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
                  </div>
                  <div class="form-group col-6">
                    <label for="date">Date of Birth <strong class="text text-danger">*</strong></label>
                    <input type="date" name="date" class="form-control" value="{{old('date')}}">
                    <span class="text-danger">@error('date'){{ "The Date of Birth is required" }}@enderror</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Email <strong class="text text-danger">*</strong></label>
                  <input id="email" type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter Email">
                  <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                  <div class="invalid-feedback">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="last_name">Coupon Code <strong class="text text-danger">*</strong></label>
                    <input id="last_name" type="text" class="form-control" name="coupone_code" placeholder="Input Coupone Code(Compulsory)">
                    <span class="text-danger">@error('coupone_code'){{ $message }}@enderror</span>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="">Choose a Package Plan <strong class="text text-danger">*</strong></label>
                    <select name="value" id="" class="form-control">
                      <option value="" class="form-control">Select</option>
                      @foreach($packages as $item)
                      <option value="{{$item->value}}" class="form-control">{{$item->package}} (₦{{$item->value}})</option>
                      @endforeach
                    </select>
                    <span class="text-danger">@error('package'){{ "You must Select a Package" }}@enderror</span>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="last_name">Referral ID</label>
                    <input id="last_name" type="hidden" class="form-control" name="referral" value="{{$referID}}" placeholder="Referral Link(Optional)">
                    <input id="last_name" type="text" disabled class="form-control" value="{{$referID}}" placeholder="Referral ID(Optional)">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label for="password" class="d-block">Password <strong class="text text-danger">*</strong></label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" placeholder="Choose a Password">
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <label for="password2" class="d-block">Re-Password <strong class="text text-danger">*</strong></label>
                    <input id="password2" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                    <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-lg btn-block">
                    Register
                  </button>
                </div>
              </form>
            </div>
            <div class="mb-4 text-muted text-center">
              Already Registered? <a href="{{ route('auth.login') }}">Login</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@stop