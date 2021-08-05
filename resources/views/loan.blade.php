@extends('layout')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Loan Request Form</h4>
                </div>
                <form action="{{ route('get_loan') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                  <div class="card-body">
                    @if(Session::get('invalid'))
                      <div class="alert alert-danger">{{Session::get('invalid')}}</div>
                    @endif
                    @if(Session::get('success'))
                      <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Email Address <strong class="text text-danger">*</strong></label>
                          <input type="email" class="form-control" style="border-color: green;" name="email" placeholder="Enter Email Address" value="{{old('email')}}">
                          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>First Name <strong class="text text-danger">*</strong></label>
                          <input type="text" class="form-control" style="border-color: green;" name="fname" placeholder="Enter Your First Name" value="{{old('fname')}}">
                          <span class="text-danger">@error('fname'){{ "The First name is Required" }}@enderror</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>Last Name <strong class="text text-danger">*</strong></label>
                            <input type="text" class="form-control" style="border-color: green;" name="lname" placeholder="Enter Your Last Name" value="{{old('lname')}}">
                            <span class="text-danger">@error('lname'){{ "The Last Name is Required" }}@enderror</span>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Phone Number <strong class="text text-danger">*</strong></label>
                          <input type="tel" class="form-control" style="border-color: green;" name="phone" placeholder="Enter your Phone number" value="{{old('phone')}}">
                          <span class="text-danger">@error('phone'){{ "The Phone number is Required" }}@enderror</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Amount <strong class="text text-danger">*</strong></label>
                            <input type="number" style="border-color: green;" class="form-control" name="amount" placeholder="Enter Loan request Amount"> 
                            <span class="text-danger">@error('amount'){{ "The Amount field is required" }}@enderror</span>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Reasons for Applying <strong class="text text-danger">*</strong></label>
                          <textarea class="form-control" name="reasons" style="border-color: green;"></textarea>
                          <span class="text-danger">@error('reasons'){{ "Please give the Reasons for this Loan" }}@enderror</span>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Upload ID <strong class="text text-danger">*</strong> <span>(Maximum file size acceptable is 4MB)</span></label>
                          <div class="custom-file">
                            <input type="file" value="{{old('email')}}" class="form-control" id="customFile" style="border-color: green;" name="document">
                            <span class="text-danger">@error('document'){{ $message }}@enderror</span>
                          </div>
                      </div>
                    </div>
                  </div>     
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-success btn-lg" type="submit">REQUEST LOAN</button>
                  </div>
                </form>
              </div>
            </div>

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Loan Transaction History</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tr>
                          <th scope="col">Transaction ID</th>
                          <th>Coupone Code</th>
                          <th style="color: green;">Package</th>
                          <th>Loan Amount(₦)</th>
                          <th style="color: green;">Status</th>
                          <th>Date</th>
                        </tr>
                          @foreach($transact as $item)
                          <tr>
                            @if($item->trans_type == "Loan")
                              <th scope="col">{{$item->trans_id}}</th>
                              <th scope="col">{{$item->coupone_code}}</th>
                              <td style="color: green;">{{$item->package}}</td>
                              <td>₦{{$item->amount}}</td>
                              <td style="color: green;">{{$item->status}}</td>
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
@stop