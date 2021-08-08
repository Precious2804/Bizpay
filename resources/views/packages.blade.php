<?php
    $title = 'Packages | Bizpay Global'; $active7='active';
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
                    <h3 class="heading text-black">Bizpay Global <span style="color: #2c7920;"> Packages</span> </h3>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="cta-button-group--one text-center">
                    <a href="https://web.whatsapp.com/send?phone=<?php print $whatsAppPhone;?>" class="btn btn--white btn-one"><span class="btn-icon mr-2"><i class="far fa-comment-alt-dots"></i></span> Let's talk</a>
                    <a href="contact" class="btn btn--secondary  btn-two"><span class="btn-icon mr-2"><i class="far fa-info-circle"></i></span> Get in-touch</a>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="provide-area pt-5  pb-70">
    <div class="container">
        <div class="section-title three">
            <span class="sub-title" style="color: #2c7920;"></span>
            <h2>Our pricing list</h2>
            <p></p>
        </div>

        <div class="pricing-table-area ">
            <div class="pricing-table-content-area">
                <div class="container">
                    <div class="row pricing-table-two">
                        @foreach($packages as $item)
                        <div class="col-lg-4 col-md-6 pricing-table wow move-up">
                            <div class="pricing-table__inner">
                                <div class="pricing-table__header">
                                    <h5 class="pricing-table__title">{{$item->package}}</h5>
                                    <div class="pricing-table__price-wrap">
                                        <h6 class="currency">₦</h6>
                                        <h6 class="price">{{$item->value}}</h6>
                                        <h6 class="period">/month</h6>
                                    </div> <br>
                                    <div>₦{{$item->ref_bonus}} Referral Bonus</div>
                                    <div>₦{{$item->spons_bonus}} Sponsord Bonus</div>
                                    <div>₦{{$item->min_withdraw}} Minimum Withdrawable</div>
                                    <br>
                                    <div>
                                        <a href="{{route('get-coupon')}}" target="_blank" class="ht-btn ht-btn-default btn--secondary" style="background-color: #2c7920;">Get started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


@stop