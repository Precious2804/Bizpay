<?php
$title = 'How it works | Bizpay Global';
$active4 = 'active';
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
                    <h3 class="heading text-black">How It Works <span style="color: #2c7920;"> </span></h3>
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

        <div class="cybersecurity-about-box section-space--pb_70">
            <div class="row">

                <div class="col-lg-5 offset-lg-1">
                    <div class="cybersecurity-about-text" style="text-align: justify;">

                        <div class="text">
                            <p>Bizpay Global is a platform where members invest in physical assets such as Real estates, gadgets and Livestock, Gadgets, Agro-based, shares, local and international bonds and stocks <br>
                                Bizpay Global also offers a monetary trade platform (Peer to peer funding market) </p>
                        </div>
                        <div class="text">
                            <p>The core activities that runs on Bizpay Global are:
                            <ul>
                                <li>1. Registration</li>
                                <li>2. Investment</li>
                                <li>3. Referral and</li>
                                <li>4. Withdrawal</li>
                            </ul>
                            </p>
                            <p>Bizpay Global provides an investment opportunity to interested members of the public who wishes to invest with us. Members funds are invested into real estates projects, livestock and gadgets sales with a mouth watering Profit paid within 14-30 Days.</p>
                            <div>
                                <h6>CREATE AN ACCOUNT</h6>
                                <p>
                                    Click the 'Register' button to Create an account with Bizpay and get it activated with a coupon code.
                                </p>
                            </div>
                            <br>

                            <div>
                                <h6>START INVESTING</h6>
                                <p>
                                    You start buy purchasing your choice of Coupon code from our verified vendors.
                                </p>
                            </div>
                            <br>

                            <div>
                                <h6>WITHDRAW</h6>
                                <p>
                                    You withdraw your funds when your subscription has expired (30days). payment is disbursed within 24hours upon request.
                                </p>
                            </div>
                            <br>

                            <div>
                                <h6>REFERRAL PROGRAM</h6>
                                <p>Our system also includes a referral program where members can earn 5% referral bonus on any amount invested by anyone they refer into the system using their referral link.</p>
                            </div>
                            <br>

                            <div>
                                <h6>LOAN</h6>
                                <p> Of course Our goal is to make financial expertise broadly accessible and effective in helping people live the lives their want, that is why we also offer Instant loans to individuals and business owners who creates an account with Bizpay and apply for loan when qualified.
                                    Getting loans on Bizpay is completely easy and just in few clicks you are good to go! Without any bulky documents.
                                    Bizpay global is strictly for adults therefore you must be at least 18 years of age before you are eligible to create an account with us.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 offset-lg-1">
                    <div class="modern-number-01">
                        <h2 class="heading  mr-5"><span class="mark-text">15</span> Profitable Investment plans.</h2>
                        <h6 class="heading mt-30"><img src="{{URL::asset('img/blog-06-960x960.jpg')}}"></h6>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@stop