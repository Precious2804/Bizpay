<?php
$title = 'Loan | '.env('APP_NAME');
$active3 = 'active';
?>
@extends('layout2')
@section('content')

<div class="counter-area three" style="height: 100px;">
    <div class="container"></div>
</div>

<div class="cta-image-area_one section-space--ptb_80 cta-bg-image_one" style="background: white;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-8 col-lg-7">
                <div class="cta-content md-text-center">
                    <h3 class="heading text-black">{{env('APP_NAME')}} <span style="color: #2c7920;"> Loan</span> <br> Get quick loan as coupon code when qualified. 70% Interest applies on all packages.</h3>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="cta-button-group--one text-center">
                    <a href="https://web.whatsapp.com/send?phone=<?php print $whatsAppPhone; ?>" class="btn btn--white btn-one"><span class="btn-icon mr-2"><i class="far fa-comment-alt-dots"></i></span> Let's talk</a>
                    <a href="contact" class="btn btn--secondary  btn-two"><span class="btn-icon mr-2"><i class="far fa-info-circle"></i></span> Get in-touch</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="feature-large-images-wrapper">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <!-- section-title-wrap Start -->
                <div class="section-title-wrap text-center section-space--mb_60">
                    <h6 class="section-sub-title mb-20"></h6>
                </div>
                <!-- section-title-wrap Start -->
            </div>
        </div>

        <div class="container d-flex justify-content-center" style="padding-bottom:10px">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Get Quick Cash</h2>
                    <h3>Anytime, Anywhere</h3>
                    <p>
                        Never go broke again. No long queues. No bulky documents. <br>
                        No long wait times. Just your smartphone and a {{env('APP_NAME')}} wallet
                    </p>
                    <div style="padding-bottom: 10px;">
                        <a href="{{route('loan')}}" target="_blank" class="ht-btn ht-btn-default btn--secondary" style="background-color: #2c7920;">Get started</a>
                    </div>
                    <img src="{{URL::asset('asset/img/PNG image 2.PNG')}}" alt="{{env('APP_NAME')}}">
                </div>
                <div class="col-lg-6">
                    <img src="{{URL::asset('asset/img/PNG image.PNG')}}" alt="{{env('APP_NAME')}}">
                </div>
            </div>
        </div>
        <br><br>
        <div class="container d-flex justify-content-center">
            <div class="col-lg-6" style="text-align: center;">
                <h3>Why Choose {{env('APP_NAME')}} Loan?</h3>
                <p>
                    We use machine learning to predict borrower's behaviour and instantly evaluate loan applications.
                    We aim at offering digital financial services to help you get closer to your personal and business goals
                </p>
            </div>
        </div>
        <br>
        <div class="container d-flex justify-content-center">
            <div class="col-lg-6 text-primary" style="text-align: center;">
                <a href="{{route('about-loan')}}">Terms and Conditions for Loan</a>
            </div>
        </div>
    </div>
</div>

@stop