<?php
$title = 'Get Coupon | Bizpay Global';
$active1 = 'active';
?>

@extends('layout2')
@section('content')

<div class="counter-area three" style="height: 100px;">
    <div class="container"></div>
</div>


<!--<div class="cta-image-area_one section-space--ptb_80 cta-bg-image_one">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-8 col-lg-7">
                <div class="cta-content md-text-center">
                    <h3 class="heading text-white">Request for <span> Coupon</span> <br> from a verified vendor.</h3>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="cta-button-group--one text-center">
                    <a href="https://web.whatsapp.com/send?phone=<?php /*print $whatsAppPhone;*/ ?>" class="btn btn--white btn-one"><span class="btn-icon mr-2"><i class="far fa-comment-alt-dots"></i></span> Let's talk</a>
                    <a href="contact" class="btn btn--secondary  btn-two"><span class="btn-icon mr-2"><i class="far fa-info-circle"></i></span> Get in-touch</a>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<div class="site-wrapper-reveal">
    <!--===========  feature-images-wrapper  Start =============-->
    <div class="feature-images-wrapper section-space--ptb_100">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <!-- section-title-wrap Start -->
                    <div class="section-title-wrap text-center">
                        <h3 class="heading">Request coupon <br> from <span class="text-color-primary"> verified vendor.</span></h3>
                    </div>
                    <!-- section-title-wrap Start -->
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="feature-images__one">
                        <div class="row">
                            @foreach($vendors as $item)
                            <div class="col-lg-4 col-md-6 wow move-up">
                                <div class="ht-box-images style-01">
                                    <div class="image-box-wrap">
                                        <div class="box-image">
                                            @if($item->image == "/storage/No Image")
                                            <img src="{{URL::asset('assets/img/Bizpayglobal_logo_only.png')}}" alt="" height="120px" width="140px">
                                            @else
                                            <img class="img-fulid" src="{{URL::asset($item->image)}}" alt="" height="120px" width="140px">
                                            @endif
                                        </div>
                                        <div class="content">
                                            <h5 class="heading">{{$item->name}}</h5>
                                            <div class="text-default"> {{$item->phone}} <br> Click on the button below to message this seller for a Coupon</div>
                                            <div class="circle-arrow">
                                                <div class="middle-dot"></div>
                                                <div class="middle-dot dot-2"></div>
                                                <a href="https://web.whatsapp.com/send?phone={{$item->phone}}" target="_blank">
                                                    <i class="bx bx-arrow-to-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>

                    <div class="section-under-heading text-center section-space--mt_80">Challenges are just opportunities in disguise. <a href="{{route('auth.register')}}">Get Started!</a></div>

                </div>
            </div>
        </div>
    </div>
    @stop