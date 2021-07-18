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
                          <td>
                            <div class="badge badge-success">{{$couponeDetails['status']}}</div>
                          </td>
                          <td>
                            <div class="badge badge-danger">Not Ready</div>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="col-lg-3 col-md-3 col-xl-3 float-right">
                    <a href="{{ route('new_coupone') }}" style="color: white;"><button class="btn btn-block btn-primary btn-lg">Get a New Coupone</button></a>
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
                          <th>Transaction ID</th>
                          <th>Coupone Code</th>
                          <th>Package</th>
                          <th>Amount(₦)</th>
                          <th>Transaction Type</th>
                          <th>Date</th>
                        </tr>
                        <tr>
                          @foreach($transact as $item)
                            <th scope="col">{{$item->trans_id}}</th>
                            <th scope="col">{{$item->coupone_code}}</th>
                            <td>{{$item->package}}</td>
                            <td>₦{{$item->amount}}</td>
                            <td>{{$item->trans_type}}</td>
                            <td>{{$item->created_at}}</td>
                          @endforeach
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </section>
      </div>
@stop