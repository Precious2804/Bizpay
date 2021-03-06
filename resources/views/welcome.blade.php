<?php
$title = 'Welcome to ' . env("APP_NAME");
$active1 = 'active';
?>
@extends('layout2')
@section('content')

<div class="banner-area-three">
    <div class="banner-shape">
        <img src="{{URL::asset('assets/img/banner/banner-shape2.png')}}" alt="Shape">
    </div>
    <div class="banner-slider owl-theme owl-carousel">
        <div class="banner-item">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="banner-content" style="margin-top: 0px;">
                            <!--<span>Your Financial Status Is Good Hands</span>-->
                            <h1 style="  color: #2c7920;">Welcome to <br><?php print $siteName; ?></h1>
                            <p style="font-size: 14px;"><?php print $siteName; ?>is a company and affiliate platform envisioned with; Real Estate Services, Investment Research, Forex and Trading Activities. This is channeled towards the growth and development of their subscribers' businesses as our major aim is to see their businesses thrive tremendously. These subscriptions are in different packages and in return over 50% On Day 3 (First withdrawal) and subsequent 14days withdrawal. Our system offers an automative payment method, No merging hassles and Quick withdrawal gateway. Why not give us a try today?
                                The power to become a millionaire is in your hands.</p>
                            <div class="banner-btn-area">
                                <a class="common-btn three" href="contact" style="background-color: #2c7920;">
                                    Contact Us
                                    <span></span>
                                </a>
                            </div>
                        </div>
                        <div class="banner-slider-img">
                            <img src="{{URL::asset('assets/img/banner/banner-main5.png')}}" alt="Banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-area-two three pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-title three">
                        <span class="sub-title" style="color: #2c7920;">About <?php print $siteName; ?></span>
                        <h2>We Help Our Clients To Grow Their Investment</h2>
                    </div>
                    <p class="about-p">We are {{env('APP_NAME')}}.
                        We Help Our Clients To Grow Their Investment
                        We are Millionaires Club. We help over 5,000 people feel more confident in their most important financial goals, manage employee benefit programs for over 45 Businesses, and support more than 4 Financial institutions with innovative investments and technology solutions to grow their businesses. Our diverse businesses and independence give us insight into the entire market and the stability needed to think and act for the long term as we deliver value to you.</p>
                    <ul>
                        <li>
                            <i class="flaticon-bar-chart" style="color: #2c7920;"></i>
                            <h3>Our Misson</h3>
                            <p>Our mission is to add value with active portfolio management to help our clients reach their long-term financial goals. We achieve this through our investment strategies, adhering to our values and investment principles, and offering employees a challenging and rewarding place to build a career.</p>
                        </li>
                        <li>
                            <i class="flaticon-consulting" style="color: #2c7920;"></i>
                            <h3>Our vision</h3>
                            <p>Our vision is to be a trusted partner for our clients and a respected leader in global asset management.</p>
                        </li>
                        <li>
                            <i class="flaticon-consultation" style="color: #2c7920;"></i>
                            <h3>Our strategy</h3>
                            <p>We???ve invest in Farming, Livestock, Automobile sales, Gadgets sales, Active take in forex and business that yield high profit at the end of the duration.</p>
                        </li>
                    </ul>
                    <a class="common-btn three" style="background-color: #2c7920;" href="about">
                        Read More
                        <span></span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="rv-video-section">

                    <div class="main-video-box video-popup">
                        <!-- <a target="_blank" href="https://youtu.be/9jzsaAyk9DY" class="video-link  mt-30"> -->
                        <div class="single-popup-wrap">
                            <div class="ht-popup-video video-button">
                                <video width="100%" height="300" controls>
                                    <source src="millionaire.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="counter-area three">
    <div class="container">
        <div class="counter-wrap">
            <div class="counter-shape">
                <img src="{{URL::asset('assets/img/counter-shape3.png')}}" alt="Shape">
                <img src="{{URL::asset('assets/img/counter-shape4.png')}}" alt="Shape">
            </div>
            <div class="row">
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <i class="flaticon-project-management" style="color: #2c7920;"></i>
                        <h3>
                            <span class="odometer" data-count="15">00</span>
                        </h3>
                        <p style="color: #2c7920;"> Profitable Investment plans</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <i class="flaticon-like" style="color: #2c7920;"></i>
                        <h3>
                            <span class="odometer" data-count="469">00</span>+
                        </h3>
                        <p style="color: #2c7920;">Satisfied Clients</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <i class="flaticon-trophy" style="color: #2c7920;"></i>
                        <h3>
                            <span class="odometer" data-count="2000">00</span>+
                        </h3>
                        <p style="color: #2c7920;"> Paid withdrawals</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="counter-item right-border">
                        <i class="flaticon-team" style="color: #2c7920;"></i>
                        <h3>
                            <span class="odometer" data-count="1890">00</span>+
                        </h3>
                        <p style="color: #2c7920;"> Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="works-area-two ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="works-img">
                    <img src="{{URL::asset('assets/img/works-shape1.png')}}" alt="Shape">
                    <img src="{{URL::asset('assets/img/works-main.png')}}" alt="Works">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="works-content">
                    <div class="section-title two">
                        <span class="sub-title">Your secured investment</span>
                        <h2>Why Invest with <?php print $siteName; ?>?</h2>
                        <p></p>
                    </div>
                    <ul>
                        <li>
                            <i class='bx bx-check'></i>
                            <h3>Better returns of Investments.</h3>
                            <p>With our powerful strategies, High Profit is sure for our investors. Your profit is surely guaranteed. Efficient installation with a 50% profit and 100% Reliability.</p>
                        </li>
                        <li>
                            <i class='bx bx-check'></i>
                            <h3>Instant withdrawal.</h3>
                            <p>
                                We send your payment immediately you request for it. Withdrawals are processed within 24hours.</p>
                        </li>
                        <li>
                            <i class='bx bx-check'></i>
                            <h3>Profitable plans and packages.</h3>
                            <p>
                                Our investment plans are tailored to the level of your capital opportunities. By investing more for a longer period.</p>
                        </li>
                        <li>
                            <i class='bx bx-check'></i>
                            <h3>No daily Tax.</h3>
                            <p>
                                We do not offer daily tasks to our Investors, Our sponsored ads are completely optional to share. Thus, Investing with {{env('APP_NAME')}} comes with less stress. Withdrawal is done after 30days.</p>
                        </li>
                        <li>
                            <i class='bx bx-check'></i>
                            <h3>Improved customer support.</h3>
                            <p>
                                Our group of highly trained support staffs are always available to assist you.</p>
                        </li>
                        <li>
                            <i class='bx bx-check'></i>
                            <h3>Secured website.</h3>
                            <p>
                                Our website uses an encrypted connection using SSL. We are protected against all types of attacks, Data loss and privacy.</p>
                        </li>
                        <li>
                            <i class='bx bx-check'></i>
                            <h3>Affiliate Program.</h3>
                            <p>
                                We credit you 5% Profit when you refer people and they register using your referral link. Remember that referral is optional.</p>
                        </li>
                        <li>
                            <i class='bx bx-check'></i>
                            <h3>Trusted Company.</h3>
                            <p>
                                We are trusted Company with many years of experience, We are trusted and reliable to rely on.</p>
                        </li>
                    </ul>
                    <a class="common-btn two" style="background-color: #2c7920;" href="about">
                        Learn More
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="book-area" style="margin-bottom: 50px;">
    <div class="container">
        <div class="book-content">
            <div class="book-shape">
                <img src="{{URL::asset('assets/img/book-shape1.png')}}" alt="Shape">
                <img src="{{URL::asset('assets/img/book-shape2.png')}}" alt="Shape">
            </div>
            <h2>??? Want to know more get with our expert right now!</h2>
            <p>With lots of unique information to be shared with you, you can easily contact out support.</p>
            <p>Chat via WhatsApp <a href="https://web.whatsapp.com/send?phone=<?php print $whatsAppPhone; ?>"><?php print '+' . $whatsAppPhone; ?></a></p>
            <a target="_blank" href="https://web.whatsapp.com/send?phone=<?php print $whatsAppPhone; ?>">
                <i class="bx bxl-whatsapp" style="font-size: 100px; color: #2c7920;"></i>
                <span></span>
            </a>
        </div>
    </div>
</div>

@stop