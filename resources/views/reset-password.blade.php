<?php
$title = 'Forgot Password | '.env('APP_NAME');
?>
@extends('auth.layout')
@section('content')
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4" style="padding-top: 60px;">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Forgot Password</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('password.update')}}" class="needs-validation">
                                @if (Session::get('email'))
                                <div class="alert alert-success">
                                    {{Session::get('email')}}
                                </div>
                                @endif
                                @if (Session::get('invalid'))
                                <div class="alert alert-success">
                                    {{Session::get('invalid')}}
                                </div>
                                @endif
                                @csrf
                                <input type="hidden" name="token" value="{{$token}}">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="float-left" style="font-weight: bold;">New Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter your new Password">
                                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label class="float-left" style="font-weight: bold;">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm New password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                                        Submit
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