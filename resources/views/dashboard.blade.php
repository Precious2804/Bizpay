@extends('layout')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
        <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Coupone Code</h5>
                          <h2 class="mb-3 font-15 text-success"><a href=" {{route('invest')}} " style="color: green;">{{$couponeDetails['coupone_code']}}</a></h2>
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
                          <h5 class="font-15"> Package</h5>
                          <h2 class="mb-3 font-18 text-success">{{$couponeDetails['package']}}</h2>
                          <p class="mb-0"><span class="col-black" style="font-weight: bold;">₦{{$couponeDetails['amount']}}</span></p>
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
                          <h5 class="font-15">Expected Profit</h5>
                          <h2 class="mb-3 font-18">50%</h2>
                          <p class="mb-0"><span class="col-black" style="font-weight: bold;">₦{{$couponeDetails['profit']}} </span></p>
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
                          <h5 class="font-15">Referral Bonus</h5>
                          @if(!$loggedUserInfo['ref_bonus'])
                            <h2 class="mb-3 font-18">NILL</h2>
                          @endif
                          @if($loggedUserInfo['ref_bonus'])
                            <h2 class="mb-3 font-18">₦{{$loggedUserInfo['ref_bonus']}}</h2>
                            <a href="{{route('referral')}}"><button type="button" class="btn btn-block btn-success">Withdraw</button></a>
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
                    <h4>Coupone Details</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tr>
                          <th>Coupone Code</th>
                          <th>User</th>
                          <th>Package</th>
                          <th>Amount(₦)</th>
                          <th>Returns(₦)</th>
                          <th>Creation Date</th>
                          <th>Expiration Date</th>
                          <th>Days Left</th>
                          <th>Coupone Status</th>
                          <th>Withdrawal Status</th>
                        </tr>
                        <tr>
                          <td><a href="{{route('invest')}}" style="color: green;">{{$couponeDetails['coupone_code']}}</a></td>
                          <td>{{$couponeDetails['user_email']}}</td>
                          <td>{{$couponeDetails['package']}}</td>
                          <td>₦{{$couponeDetails['amount']}}</td>
                          <td>₦{{$couponeDetails['profit']}}</td>
                          <td>{{$couponeDetails['created_at']}}</td>
                          <td>{{$couponeDetails['expire_at']}}</td>
                          @if($couponeDetails['days_left'] == "0")
                            <td><div class="badge badge-success">Completed</div></td>
                          @endif
                          @if($couponeDetails['days_left'] != "0")
                            <th scope="col" style="color:green; font-weight:bold">{{$couponeDetails['days_left']}}</th>
                          @endif
                          @if($couponeDetails['status'] == "Expired")
                            <td>
                              <div class="badge badge-danger">{{$couponeDetails['status']}}</div>
                            </td>
                            <td>
                              <a href="{{ route('withdraw') }}"><div class="badge badge-success">Withdraw Now</div></a>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  @endif
                  @if($couponeDetails['status'] == "Active")
                      <td>
                      <div class="badge badge-warning">{{$couponeDetails['status']}}</div>
                      </td>
                      <td>
                        <div class="badge badge-danger">Not Ready</div>
                      </td>
                      </tr>
                    </table>
                    </div>
                    </div>
                  @endif
                  @if($couponeDetails['status'] == "Payment Completed")
                      <td>
                      <div class="badge badge-success">{{$couponeDetails['status']}}</div>
                      </td>
                      <td>
                        <div class="badge badge-success">Successfull</div>
                      </td>
                      </tr>
                    </table>
                    </div>
                    </div>
                  @endif
                </div>
              </div>

          <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Transaction History</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tr>
                          <th>Transaction ID</th>
                          <th>Coupone Code</th>
                          <th>Package</th>
                          <th>Amount(₦)</th>
                          <th>Transaction Type</th>
                          <th>Status</th>
                          <th>Date</th>
                        </tr>
                          @foreach($transact as $item)
                          <tr>
                            <th scope="col">{{$item->trans_id}}</th>
                            <th scope="col">{{$item->coupone_code}}</th>
                            <td>{{$item->package}}</td>
                            <td>₦{{$item->amount}}</td>
                            @if($item->trans_type == "Investment")
                              <th scope="col" class="text-info">{{$item->trans_type}}</th>
                            @endif
                            @if($item->trans_type == "Withdrawal")
                              <th scope="col" class="text-success">{{$item->trans_type}}</th>
                            @endif
                            @if($item->trans_type == "Loan")
                              <th scope="col" class="text-success">{{$item->trans_type}}</th>
                            @endif
                            @if($item->trans_type == "Ref Bonus")
                              <th scope="col" class="text-info">{{$item->trans_type}}</th>
                            @endif
                            <td>{{$item->status}}</td>
                            <td>{{$item->created_at}}</td>
                          </tr>
                          @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </section>
      </div>
@stop