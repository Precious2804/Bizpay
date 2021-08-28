@extends('layout')
@section('content')
<!---MAin COntent=-->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-4">
          <div class="card author-box">
            <div class="card-body">
              <div class="author-box-center">
                @if(!$loggedUserInfo['image'])
                <img src="{{URL::asset('assets/img/blank-image.png')}}" alt="" class="rounded-circle author-box-picture">
                @endif
                @if($loggedUserInfo['image'])
                <img alt="image" src="{{URL::asset($loggedUserInfo['image'])}}" class="rounded-circle author-box-picture">
                @endif
                <div class="clearfix"></div>
                <div class="author-box-name">
                  <a href="{{ route('profile') }}">{{$loggedUserInfo['first_name']}} {{$loggedUserInfo['last_name']}}</a>
                </div>
                <div class="author-box-job">{{$loggedUserInfo['email']}}</div>
              </div>
              <div class="text-center">
                <div class="author-box-description">
                  <form action="update_pic" method="POST" enctype="multipart/form-data" class="form-group">
                    @csrf
                    @if (Session::get('successPic'))
                    <div class="alert alert-success">
                      {{Session::get('successPic')}}
                    </div>
                    @endif
                    <input type="file" name="image" class="form-control">
                    <button type="submit" class="btn btn-success form-control">Upload Picture</button>
                  </form>
                </div>
                <div class="w-100 d-sm-none"></div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4>Personal Details</h4>
            </div>
            <div class="card-body">
              <div class="py-4">
                <p class="clearfix">
                  <span class="float-left">
                    Birthday
                  </span>
                  <span class="float-right text-muted">
                    {{$loggedUserInfo['date']}}
                  </span>
                </p>
                <p class="clearfix">
                  <span class="float-left">
                    Phone
                  </span>
                  <span class="float-right text-muted">
                    {{$loggedUserInfo['phone']}}
                  </span>
                </p>
                <p class="clearfix">
                  <span class="float-left">
                    Email
                  </span>
                  <span class="float-right text-muted">
                    {{$loggedUserInfo['email']}}
                  </span>
                </p>
                <p class="clearfix">
                  <span class="float-left">
                    Refered By:
                  </span>
                  <span class="float-right text-muted">
                    {{$loggedUserInfo['referral']}}
                  </span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-8">
          <div class="card">
            <div class="padding-20">
              <div class="tab-content tab-bordered" id="myTab3Content">
                <div id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                  <form method="POST" action="{{route('update_profile')}}" class="needs-validation">
                    @csrf
                    @if (Session::get('success'))
                    <div class="alert alert-success">
                      {{Session::get('success')}}
                    </div>
                    @endif
                    @if (Session::get('bank_updated'))
                    <div class="alert alert-success">
                      {{Session::get('bank_updated')}}
                    </div>
                    @endif
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <label>First Name</label>
                          <input type="text" class="form-control" value="{{$loggedUserInfo['first_name']}}" name="first_name">
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label>Last Name</label>
                          <input type="text" class="form-control" value="{{$loggedUserInfo['last_name']}}" name="last_name">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <label>Phone</label>
                          <input type="tel" class="form-control" value="{{$loggedUserInfo['phone']}}" name="phone">
                        </div>
                      </div>
                      <button class="btn btn-success" type="submit">Save Changes</button>
                  </form>
                  <hr>
                  @if(Session::get('account'))
                  <form action="{{route('update_account')}}" method="POST">
                    @else
                    <form action="{{route('account_valid')}}" method="POST">
                      @endif
                      @if(!$loggedUserInfo['acct_number'])
                      <h6>Update Bank Details</h6>
                      <div class="alert alert-warning">
                        Please Note: Once you update your Bank account details, you would not be permitted to change the bank details for any reason, thanks for understanding
                      </div>
                      @endif
                      <br>
                      @csrf
                      <div class="row">

                        @if(Session::get('account'))
                        @if(Session::get('account'))
                        <div class="form-group col-md-12 col-12">
                          <label>Account Name: </label>
                          <span>{{Session::get('account')}}</span>
                          <input type="hidden" class="form-control" value="{{Session::get('account')}}" name="acct_name">
                        </div>
                        @endif
                        @if(Session::get('number'))
                        <div class="form-group col-md-12 col-12">
                          <label>Account Number: </label>
                          <span>{{Session::get('number')}}</span>
                          <input type="hidden" class="form-control" value="{{Session::get('number')}}" name="acct_number">
                        </div>
                        @endif
                        @if(Session::get('bank'))
                        <div class="form-group col-md-12 col-12">
                          <label>Bank Name: </label>
                          <span>{{Session::get('bank')}}</span>
                          <input type="hidden" class="form-control" value="{{Session::get('bank')}}" name="bank">
                        </div>
                        @endif
                        <button class="btn btn-success" type="submit">Save Account Now</button>
                        @else
                        
                        @if(!$loggedUserInfo['acct_number'])
                        <div class="form-group col-md-6 col-12">
                          <label>Bank Name</label>
                          <select name="bank" id="" class="form-control">
                            <option value="">Select Bank</option>
                            @foreach($bank as $item)
                            <option value="{{$item->codes}}">{{$item->bank_name}}</option>
                            @endforeach
                          </select>
                          <span class="text-danger">@error('bank'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label>Account Number</label>
                          <input type="text" class="form-control" value="{{$loggedUserInfo['acct_number']}}" name="acct_number">
                          <span class="text-danger">@error('acct_number'){{ $message }}@enderror</span>
                        </div>
                      </div>
                      <button class="btn btn-success" type="submit">Confirm account</button>
                    </form>
                    @endif

                    @if($loggedUserInfo['acct_number'])
                    <h6>Bank Details</h6>
                    <div class="form-group col-md-12 col-12">
                      <label>Bank: </label>
                      <span>{{$loggedUserInfo['bank']}}</span>
                    </div>
                    <div class="form-group col-md-12 col-12">
                      <label>Account Number: </label>
                      <span>{{$loggedUserInfo['acct_number']}}</span>
                    </div>
                    <div class="form-group col-md-12 col-12">
                      <label>Account Name: </label>
                      <span>{{$loggedUserInfo['acct_name']}}</span>
                    </div>
                    @endif
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>
@stop