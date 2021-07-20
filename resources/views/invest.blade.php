@extends('layout')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
        <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Running Investment</h4>
                  </div>
                  @if(Session::get('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                  @endif
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tr>
                          <th>Coupone Code</th>
                          <th>User</th>
                          <th>Package Type</th>
                          <th>Amount(₦)</th>
                          <th>Minimum Withdrawal(₦)</th>
                          <th>Investment Date/Time</th>
                          <th>Withdrawal Date</th>
                          <th>Coupone Status</th>
                          <th>Withdrawal Status</th>
                        </tr>
                        <tr>
                          <td>{{$couponeDetails['coupone_code']}}</td>
                          <td>{{$couponeDetails['user_email']}}</td>
                          <td>{{$couponeDetails['package']}}</td>
                          <td>₦{{$couponeDetails['amount']}}</td>
                          <td>₦{{$couponeDetails['profit']}}</td>
                          <td>{{$couponeDetails['created_at']}}</td>
                          <td>{{$couponeDetails['expire_at']}}</td>
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
                    <div class="card-footer">                      
                      <div class="col-lg-5 col-md-5 col-xl-5 float-right">
                        <div class="row">
                          <div class="col-lg-6">
                            <a href="{{ route('new_coupone') }}" style="color: white;"><button class="btn btn-block btn-success btn-lg">Get a New Coupone</button></a>
                          </div>
                          <div class="col-lg-6">
                            <button type="button" class="btn btn-block btn-success btn-lg" data-toggle="modal" data-target="#exampleModal">Re-invest Now</button>                         
                          </div>
                        </div>
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
                    <div class="card-footer">
                      <div class="col-lg-5 col-md-5 col-xl-5 float-right">
                        <div class="row">
                          <div class="col-lg-6">
                            <button class="btn btn-block btn-lg" style="background-color:#b6adb4; color: #fff !important; text-decoration: none !important; opacity:0.5" >Get a New Coupone</button>
                          </div>
                          <div class="col-lg-6">
                            <button class="btn btn-block btn-lg" style="background-color:#b6adb4; color: #fff !important; text-decoration: none !important; opacity:0.5" >Resubscribe</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif
                </div>
              </div>

              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Investment Transaction History</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tr>
                          <th scope="col">#</th>
                          <th>Transaction ID</th>
                          <th>Coupone Code</th>
                          <th>Package</th>
                          <th>Amount(₦)</th>
                          <th>Date</th>
                        </tr>
                          @foreach($transact as $item)
                          <tr>
                            @if($item->trans_type == "Investment")
                              <td>{{$item->id}}</td>
                              <th scope="col">{{$item->trans_id}}</th>
                              <th scope="col">{{$item->coupone_code}}</th>
                              <td>{{$item->package}}</td>
                              <td>₦{{$item->amount}}</td>
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
        <!-- Modal with form -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="formModal">Resubscribe / Re-invest</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="" action="{{ route('re_invest') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                  <label>Input Coupon Code</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">
                                        <img src="{{URL::asset('assets/img/favicon.ico')}}" alt="" style="width: 25px;">
                                      </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Input Coupon Code" name="coupone_code">
                                    <span class="text-danger">@error('coupone_code'){{ $message }}@enderror</span>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label>Package Type</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">
                                        <img src="{{URL::asset('assets/img/favicon.ico')}}" alt="" style="width: 25px;">
                                      </div>
                                    </div>
                                    <select name="value" id="" class="form-control">
                                      <option value="">Select Package Plan</option>
                                      @foreach($packages as $item)
                                        <option value="{{$item->value}}">{{$item->package}}</option>
                                      @endforeach
                                    </select>
                                    <span class="text-danger">@error('package'){{ "You must Select a Package" }}@enderror</span>                                  
                                  </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg m-t-15 waves-effect">INVEST NOW</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
      </div>
@stop