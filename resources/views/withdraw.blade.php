@extends('layout')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
        <div class="row">
          <div class="col-lg-12">
            @if(Session::get('success'))
              <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::get('successPay'))
              <div class="alert alert-success">{{Session::get('successPay')}}</div>
            @endif
            @if(Session::get('failed'))
              <div class="alert alert-danger">{{Session::get('failed')}}</div>
            @endif
            @if(Session::get('alreadyExists'))
              <div class="alert alert-danger">{{Session::get('alreadyExists')}}</div>
            @endif
            @error('coupone_code')<div class=" alert alert-danger">{{ "Sorry! This Operation cannot be performed on this coupon" }}</div>@enderror
          </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Coupone Code</h5>
                          <h2 class="mb-3 font-15 text-info">{{$couponeDetails['coupone_code']}}</h2>
                          <p class="mb-0"><span class="col-black" style="font-weight: bold; color:green">{{$couponeDetails['days_left']}}</span> Days Left</p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Package</h5>
                          <h2 class="mb-3 font-18 text-success">{{$couponeDetails['package']}}</h2>
                          <p class="mb-0"><span class="col-black" style="font-weight: bold;">{{$couponeDetails['amount']}}</span> Naira</p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/2.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Profit Amount</h5>
                          <h2 class="mb-3 font-18">50%</h2>
                          <p class="mb-0"><span class="col-black" style="font-weight: bold;">{{$couponeDetails['profit']}} </span>Naira </p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          @if($couponeDetails['status'] == "Active")
                            <h5 class="font-15">Withdrawal </h5>
                            <h2 class="mb-3 font-18">Status</h2>
                            <p class="mb-0">Not Ready</p>
                          @endif
                          @if($couponeDetails['status'] == "Expired")
                            <h5 class="font-15">Withdrawal </h5>
                            <h2 class="mb-3 font-18">Status</h2>
                            <p class="mb-0"><button type="submit" data-target="#exampleModalCenter1" data-toggle="modal" style="border-radius: 20px;" class="btn btn-success">Withdraw</button></p>
                          @endif
                          @if($couponeDetails['status'] == "Awaiting Payment")
                            <h5 class="font-15">Received </h5>
                            <h2 class="mb-3 font-18">Payment?</h2>
                            <p class="mb-0"><button type="button" class="btn btn-success" data-toggle="modal" style="border-radius: 10px;" data-target="#exampleModalCenter2">Confirm</button></p>
                          @endif
                          @if($couponeDetails['status'] == "Payment Completed")
                            <h5 class="font-15" style="color: green;">Withdrawal </h5>
                            <h2 class="mb-3 font-18" style="color: green;">Successfull</h2>
                            <p class="mb-0">Congrats!!</p>
                          @endif
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/4.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Withdrawal Transaction History</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tr>
                          <th>Transaction ID</th>
                          <th style="color: green;">Coupone Code</th>
                          <th>Package</th>
                          <th style="color: green;">Amount(₦)</th>
                          <th>Status</th>
                          <th>Date</th>
                        </tr>
                          @foreach($transact as $item)
                          <tr>
                            @if($item->trans_type == "Withdrawal")
                              <th scope="col">{{$item->trans_id}}</th>
                              <th scope="col" style="color: green;">{{$item->coupone_code}}</th>
                              <td>{{$item->package}}</td>
                              <td style="color: green;">₦{{$item->amount}}</td>
                              <td>{{$item->status}}</td>
                              <td>{{$item->created_at}}</td>
                            @endif
                          </tr>
                          @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </section>
      </div>

          <!-- Withdrawal Request Toogle -->
          <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Request For Withdrawal of Investment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you Sure You want to Withdraw your Investment funds now? Click Yes to Confirm
              </div>
              <div class="modal-footer bg-whitesmoke br">
              <form action="{{ route('do_withdraw') }}" method="POST">
                  @csrf
                  <input type="hidden" name="coupone_code" value="{{$couponeDetails['coupone_code']}}">
                  <button type="submit" class="btn btn-success">Yes</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>
          <!-- Confirm Payment Toogle -->
          <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Have You Received Your Payment yet. P.S: Do not click on confirm if you have not received your payment yet
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <form action="{{ route('confirm_pay') }}" method="POST">
                  @csrf
                  <input type="hidden" name="coupone_code" value="{{$couponeDetails['coupone_code']}}">
                  <button type="submit" class="btn btn-success">Confirm</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
@stop