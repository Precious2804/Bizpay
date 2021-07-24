<?php
    $title = 'Contact Us | Bizpay Global'; $active6='active';
?>

@extends('layout2')
@section('content')

<div class="counter-area three" style="height: 100px;">
    <div class="container"></div>
</div>

<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_box text-center">
                    <h2 class="breadcrumb-title">Contact us</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="./">Home</a> | </li>
                        <li class="breadcrumb-item">Contact us </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-wrapper-reveal">
    <div class="contact-us-section-wrappaer section-space--pt_100 section-space--pb_70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-lg-6">
                    <div class="conact-us-wrap-one mb-30">
                        <h3 class="heading">To make requests for <br>further information, <br><span class="text-color-primary">contact us</span> via our social channels. </h3>
                        <div class="sub-heading">We just need a couple of hours! <br> No more than 2 working days since receiving your issue ticket.</div>
                    </div>
                </div>

                <div class="col-lg-6 col-lg-6">
                    <div class="contact-form-wrap">
                        <form id="contact-form" action="" method="post">
                            <div class="contact-form">
                                <div class="contact-input">
                                    <div class="contact-inner">
                                        <input name="con_name" type="text" placeholder="Name *">
                                    </div>
                                    <div class="contact-inner">
                                        <input name="con_email" type="email" placeholder="Email *">
                                    </div>
                                </div>
                                <div class="contact-inner">
                                    <input name="con_subject" type="text" placeholder="Subject *">
                                </div>
                                <div class="contact-inner contact-message">
                                    <textarea name="con_message" placeholder="Please describe what you need."></textarea>
                                </div>
                                <div class="submit-btn mt-20">
                                    <button class="ht-btn ht-btn-md" type="submit">Send message</button>
                                    <p class="form-messege"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="contact-us-info-wrappaer section-space--pb_100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="conact-info-wrap mt-30">
                        <h5 class="heading mb-20">San Francisco</h5>
                        <ul class="conact-info__list">
                            <li>58 Howard Street #2 San Francisco, CA 941</li>
                            <li><a href="#" class="hover-style-link text-color-primary">contact.sanfrancisco@mitech.com</a></li>
                            <li><a href="#" class="hover-style-link text-black font-weight--bold">(+68)1221 09876</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="conact-info-wrap mt-30">
                        <h5 class="heading mb-20">New York</h5>
                        <ul class="conact-info__list">
                            <li>58 Howard Street #14 New York</li>
                            <li><a href="#" class="hover-style-link text-color-primary">contact.newyork@mitech.com</a></li>
                            <li><a href="#" class="hover-style-link text-black font-weight--bold">(+47)1221 09878</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="conact-info-wrap mt-30">
                        <h5 class="heading mb-20">Russia</h5>
                        <ul class="conact-info__list">
                            <li>The Courtyard Building 11 Curtain Road, Russia</li>
                            <li><a href="#" class="hover-style-link text-color-primary">contact.russia@mitech.com</a></li>
                            <li><a href="#" class="hover-style-link text-black font-weight--bold">(+53)1221 09877</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>-->


    <div class="cta-image-area_one section-space--ptb_80 cta-bg-image_two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-lg-7">
                    <div class="cta-content md-text-center">
                        <h3 class="heading">We are always available  <span class="text-color-primary"> success</span></h3>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="cta-button-group--two text-center">
                        <a target="_blank" href="https://web.whatsapp.com/send?phone=<?php print $whatsAppPhone;?>" class="btn btn--white btn-one"><span class="btn-icon mr-2"><i class="far fa-comment-alt-dots"></i></span> Let's talk</a>
                        <a href="about" class="btn btn--secondary btn-two "><span class="btn-icon mr-2"><i class="far fa-info-circle"></i></span> Get more info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop