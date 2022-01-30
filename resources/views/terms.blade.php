<?php
$title = 'Terms | '.env('APP_NAME');
$active5 = 'active';
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
                    <h3 class="heading text-black">Terms And Condition <span style="color: #2c7920;"> </span></h3>
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

                <div class="col-lg-8 offset-lg-2">
                    <div class="cybersecurity-about-text" style="text-align: justify;">

                        <div class="text">
                            <h3>Introduction</h3>
                            <p>The following Terms and Conditions control your membership on {{env('APP_NAME')}}. You agree that you have read and understood this Agreement (“Agreement”) and that your membership on {{env('APP_NAME')}} (the “Program”) shall be subject to the following Terms and Conditions between you (the “Member”) and {{env('APP_NAME')}}. These Terms and Conditions may be modified at any time by {{env('APP_NAME')}} Administrators without notice. Please review them from time to time since your ongoing use is subject to the terms and conditions as modified. Your continued participation in by {{env('APP_NAME')}} after such modification shall be deemed to be your acceptance of any such modification. If you do not agree to these Terms and Conditions, please do not register to become a member of {{env('APP_NAME')}}</p>
                        </div>
                        <div class="text">
                            <h3>Terms of Participation</h3>
                            <p>Members must be 18 years of age or older to participate. -Members must by {{env('APP_NAME')}} LTD with accurate, complete and updated registration information, including but not limited to an accurate name, mailing address and email address. To the full extent allowed by applicable law, by {{env('APP_NAME')}} at its sole discretion and for any or no reason may refuse to accept applications for membership. {{env('APP_NAME')}} reserves the right to track Member’s activity by both IP Address as well as individual browser activity. Member agrees not to abuse his or her membership privileges by acting in a manner inconsistent with this Agreement. <br>
                                Member agrees not to attempt to earn through other means than the legitimate channels authorized by {{env('APP_NAME')}}. Member agrees not to participate in any fraudulent behaviour of any kind. Spamming is strictly prohibited. Any spamming done to advertise {{env('APP_NAME')}} will result in immediate termination of your account and a forfeiture of your account earning balance. Incidents will be dealt with on a case by case basis.</p>
                        </div>
                        <div class="text">
                            <h3>Refund Policy</h3>
                            <p>As we are offering non-tangible virtual digital goods {{env('APP_NAME')}} which is form of registration fee , we do not generally issue refunds after the purchase of {{env('APP_NAME')}} coupon has been made. Please note that by purchasing the {{env('APP_NAME')}} coupon, you agree to the no Refund Policy. <br>
                                We pay within 24hrs-48hrs after withdrawal is processed. Multiple accounts are allowed on {{env('APP_NAME')}}. Members are allowed to create multiple accounts with condition of registering with different details. <br>
                                Member shall comply with all laws, rules, and regulations that are applicable to member. Member acknowledges that Member may only participate in {{env('APP_NAME')}} if and to the extent that such participation is permitted by such laws, rules, and regulations. If member objects to any of the Terms and Conditions of this Agreement, or any subsequent modifications to this agreement, or becomes dissatisfied with the Program, Member’s only recourse is to immediately discontinue participation in or failure to notify {{env('APP_NAME')}} LTD.</p>
                        </div>
                        <div class="text">
                            <h3>Disclaimer</h3>
                            <p>MEMBER EXPRESSLY AGREES THAT USE OF THE SERVICE IS AT MEMBER’S SOLE RISK. THE SERVICE IS PROVIDED ON AN “AS IS” AND “AS AVAILABLE” BASIS. TO THE MAXIMUM EXTENT ALLOWED BY APPLICABLE NIGERIAN LAW, NIPEXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, EXPRESS OR IMPLIED BY LAW, CUSTOM OR OTHERWISE, INCLUDING WITHOUT LIMITATION ANY WARRANTY OF MERCHANTABILITY, SATISFACTORY QUALITY, FITNESS FOR A PARTICULAR PURPOSE OR NON-INFRINGEMENT. ACTIVITIES THAT PAYS MAKES NO WARRANTY REGARDING ANY GOODS OR SERVICES PURCHASED OR OBTAINED THROUGH THE PROGRAM OR ANY TRANSACTIONS ENTERED INTO THROUGH THE PROGRAM. TO THE MAXIMUM EXTENT ALLOWED BY APPLICABLE NIGERIAN LAW, NEITHER ACTIVITIES THAT PAYS NOR ANY OF ITS MEMBERS, SUBSIDIARIES, PUBLISHERS, SERVICE PROVIDERS, LICENSORS, OFFICERS, DIRECTORS OR EMPLOYEES SHALL BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL OR CONSEQUENTIAL DAMAGES ARISING OUT OF OR RELATING TO THIS AGREEMENT, RESULTING FROM THE USE OR THE INABILITY TO USE THE SERVICE OR FOR THE COST OF PROCUREMENT OF SUBSTITUTE GOODS AND SERVICES OR RESULTING FROM ANY GOODS OR SERVICES PURCHASED OR OBTAINED OR MESSAGES RECEIVED OR TRANSACTIONS ENTERED INTO THROUGH THE PROGRAM OR RESULTING FROM UNAUTHORIZED ACCESS TO OR ALTERATION OF USER’S TRANSMISSIONS OR DATA, INCLUDING BUT NOT LIMITED TO, DAMAGES FOR LOSS OF PROFITS, USE, DATA OR OTHER INTANGIBLE, EVEN IF SUCH PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.
                            To prevent unauthorized access, maintain data accuracy, and ensure the correct use of information, {{env('APP_NAME')}} LTD uses appropriate industry standard procedures to safeguard the confidentiality of Member’s personal information, such as SSL, firewall, encryption, token authentication, application proxies, monitoring technology, and adaptive analysis of the Website’s traffic to track abuse of the {{env('APP_NAME')}} LTD Website and its data. However, no data transmitted over the Internet can be 100% secure. As a result, while {{env('APP_NAME')}} LTD strives to protect its Members personal information, {{env('APP_NAME')}} LTD cannot guarantee the security of any information that Members transmit to or from the participating advertisers/merchants and Member does so at his/her own risk. This Agreement constitutes the entire Agreement between Member and {{env('APP_NAME')}} LTD in connection with general membership in the {{env('APP_NAME')}} LTD and supersedes all prior agreements between the parties regarding the subject matter contained herein.
                                If any provision of this AGREEMENT is found invalid or unenforceable, that provision will be enforced to the maximum extent permissible, and the other provisions of this AGREEMENT will remain in force. Failure of either party to exercise or enforce any of its rights under this AGREEMENT, within two(2) months the cause arose, will act as a waiver of such rights. In the event of any dispute or need for interpretation or enforcement of terms, arising out of this agreement, parties shall refer to arbitration before litigation.</p>
                        </div>
                        <div class="text">
                            <p>To prevent unauthorized access, maintain data accuracy, and ensure the correct use of information, {{env('APP_NAME')}} LTD uses appropriate industry standard procedures to safeguard the confidentiality of Member’s personal information, such as SSL, firewall, encryption, token authentication, application proxies, monitoring technology, and adaptive analysis of the Website’s traffic to track abuse of the {{env('APP_NAME')}} LTD Website and its data. However, no data transmitted over the Internet can be 100% secure. As a result, while {{env('APP_NAME')}} LTD strives to protect its Members personal information, {{env('APP_NAME')}} LTD cannot guarantee the security of any information that Members transmit to or from the participating advertisers/merchants and Member does so at his/her own risk. This Agreement constitutes the entire Agreement between Member and {{env('APP_NAME')}} LTD in connection with general membership in the {{env('APP_NAME')}} LTD and supersedes all prior agreements between the parties regarding the subject matter contained herein.<br>
                                If any provision of this AGREEMENT is found invalid or unenforceable, that provision will be enforced to the maximum extent permissible, and the other provisions of this AGREEMENT will remain in force. Failure of either party to exercise or enforce any of its rights under this AGREEMENT, within two(2) months the cause arose, will act as a waiver of such rights. In the event of any dispute or need for interpretation or enforcement of terms, arising out of this agreement, parties shall refer to arbitration before litigation.</p>
                            <h4>
                                SIGNED:<br>
                                CEO {{env('APP_NAME')}} LTD
                            </h4>
                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>
</div>
@stop