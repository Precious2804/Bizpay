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
                    <h4>Request New Coupone Code</h4>
                  </div>
                  @if($couponeDetails['status'] == "Active")
                    <div class="card-body alert-warning">
                        Your Coupone is still Active, you can't send a Get Coupone Request to the Admin, until the already Running Coupone Investment Expires
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-lg" style="background-color:#b6adb4; color: #fff !important; text-decoration: none !important; opacity:0.5" >Send Message to Admin</button>
                    </div>
                  @endif
                  @if($couponeDetails['status'] == "Expired")
                  <div class="card-body alert-success">
                    Hint: Click on the "Send Message to Admin" button to make a request to the Admin to get a Coupone Code
                  </div>
                  <div class="card-footer text-right">
                    <div class="col-md-5 col-lg-5 col-xl-5 float-right">
                      <a href="https://wa.link/f3ek2i"><button class="btn btn-success btn-lg">Send Message to Admin</button><i class="fas fa-whatsapp"></i></a>
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