@extends('layout')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Request New Coupon Code</h4>
                  </div>
                  @if($couponeDetails['status'] == "Active" || $couponeDetails['status'] == "Expired" || $couponeDetails['status'] == "Awaiting Payment")
                    <div class="card-body alert-warning">
                        You are currently not eligible to send a Get Coupon Request to the Admin, until the already Running Coupon Investment has been completed and payment is confirmed
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-lg" style="background-color:#b6adb4; color: #fff !important; text-decoration: none !important; opacity:0.5" >Get a New Coupon</button>
                    </div>
                  @endif
                  @if($couponeDetails['status'] == "Payment Completed")
                  <div class="card-body alert-success">
                    Hint: Click on the "Get a New Coupon" button to make a request to the Admin to get a Coupon Code
                  </div>
                  <div class="card-footer text-right">
                    <div class="col-md-5 col-lg-5 col-xl-5 float-right">
                      <a href="{{route('get-coupone')}}" target="_blank"><button class="btn btn-success btn-lg">Get a New Coupon</button><i class="fas fa-whatsapp"></i></a>
                    </div>
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@stop