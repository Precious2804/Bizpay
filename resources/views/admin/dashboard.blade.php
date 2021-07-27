@extends('admin.layout')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-body">
        <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Number of Users</h5>
                          <h2 class="mb-3 font-15 text-success">{{$users}}</h2>
                          <p class="mb-0"><span class="col-black" style="font-weight: bold; color:green"></span></p>
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
                          <h5 class="font-15">Bizpay Transactions</h5>
                          <h2 class="mb-3 font-18 text-success">{{$transacts}}</h2>
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
                          <h5 class="font-15">Unapproved Loans</h5>
                          <h2 class="mb-3 font-18 text-success">{{$loan}}</h2>
                          <p class="mb-0"><span class="col-black" style="font-weight: bold;"></span></p>
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
                          <h5 class="font-15">Pending Withdrawals</h5>
                            <h2 class="mb-3 font-18 text-success">{{$withdraw}}</h2>
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
        </div>
        <div class="card">
                        <div class="card-header">
                            <h4 class="text-success">Completed Withdrawal Payments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Unique ID</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Coupon Code</th>
                                            <th scope="col">Package</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Profit</th>
                                            <th scope="col" style="color: green;">Status</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allwith as $item)
                                            @if($item->status == "Payment Completed")
                                                <tr>
                                                    <th scope="col">{{$item->id}}</th>
                                                    <th scope="col">{{$item->unique_id}}</th>
                                                    <th>{{$item->email}}</th>
                                                    <th>{{$item->phone}}</th>
                                                    <th>{{$item->coupone_code}}</th>
                                                    <th>{{$item->package}}</th>
                                                    <th>{{$item->amount}}</th>
                                                    <th>{{$item->profit}}</th>
                                                    <th style="color:green">{{$item->status}}</th>
                                                    <th><a href="/delete-with/{{$item->unique_id}}"><i class="fas fa-trash" style="color: red;"></i></a></th>
                                                </tr>
                                            @endif    
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
    </section>
</div>
@stop