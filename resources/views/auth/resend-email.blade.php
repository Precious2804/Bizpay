<?php
$title = 'Resend Verify | Bizpay Global';
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
                            <h4>Resend Verification Email Link</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('resend') }}" class="needs-validation">
                                @if (Session::get('unknown'))
                                <div class="alert alert-danger">
                                    {{Session::get('unknown')}}
                                </div>
                                @endif
                                @if (Session::get('verifyEmail'))
                                <div class="alert alert-success">
                                    {{Session::get('verifyEmail')}}
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
                                    <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                                        Send Email Now
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