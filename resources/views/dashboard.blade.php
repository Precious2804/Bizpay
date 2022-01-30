@extends('layout')
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">

    @if(!$loggedUserInfo['acct_number'])
    <div class="alert alert-warning">
      Note: To continue to use Bizpay, please endeavour to Update your Bank information on the platform, so as to be able to receive payment into your Bank accounts. To do this Click on "Profile" on the side bar navigation of your screen and locate "Update Bank details", to update your account. Thank you.
    </div>
    @endif
    @if($loggedUserInfo['isActivated'] == 0)
    <div class="alert alert-warning">
      Note: It is required that an activation fee of only 1,000 naira was paid before an investment can be placed on our platform. <br> <a href="" style="color: blue;">Click here to activate your account now</a>
    </div>
    @endif

    <div class="row ">
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Total Investments</h5>
                    <p class="mb-0"><span class="col-black" style="font-weight: bold;">{{$loggedUserInfo['no_of_invest']}}</span></p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="{{URL::asset('assets/img/banner/3.png')}}" alt="">
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
                    <h5 class="font-15">Total Investment</h5>
                    <p class="mb-0"><span class="col-black" style="font-weight: bold;">10</span></p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="{{URL::asset('assets/img/banner/3.png')}}" alt="">
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
                    <h5 class="font-15">Total Investment</h5>
                    <p class="mb-0"><span class="col-black" style="font-weight: bold;">10</span></p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="{{URL::asset('assets/img/banner/3.png')}}" alt="">
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
                    <img src="{{URL::asset('assets/img/banner/4.png')}}" alt="">
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
          <h4>Transaction History</h4>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped table-md">
              <tr>
                <th>S/N</th>
                <th>Amount(₦)</th>
                <th>Transaction Type</th>
                <th>Status</th>
                <th>Date</th>
              </tr>
              <?php
              $no = 1;
              ?>
              @foreach($transact as $item)
              <tr>
                <th scope="col">{{$no++}}</th>
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