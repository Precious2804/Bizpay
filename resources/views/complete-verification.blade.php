<?php
$title = 'Verify Email | Bizpay Global';
?>
@extends('auth.layout')
@section('content')
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8" style="padding-top: 60px;">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Verification Completed</h4>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-success">Your Email Address has been successfully verified on Bizpay Global. <br> You can now proceed to Login into your account. <span><a href="{{route('auth.login')}}">Login Here</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@stop