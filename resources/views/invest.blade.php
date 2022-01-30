@extends('layout')
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="col-12 col-md-12 col-lg-12">
      @if($loggedUserInfo['isActivated'] == 0)
      <div class="alert alert-warning">
        Note: It is required that an activation fee of only 1,000 naira was paid before an investment can be placed on our platform
      </div>
      <div class="form-group" style="text-align: center;">
        <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal2">Activate to start investing</button>
      </div>
      @else
      <div class="form-group" style="text-align: center;">
        <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Start an new Investment</button>
      </div>
      @endif
      <div class="card">
        @if(Session::get('success'))
        <div class="alert alert-success">
          <span> {{Session::get('success')}}</span>
        </div>
        @endif
        @if(Session::get('not-active'))
        <div class="alert alert-danger">
          <span> {{Session::get('not-active')}}</span>
        </div>
        @endif
        @error('amount')
        <div class="alert alert-warning">
          <span> {{$message}}</span>
        </div>
        @enderror
        <div class="card-header">
          <h4>All Investment Transaction History</h4>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped table-md">
              <tr>
                <th scope="col">S/N</th>
                <th>Amount(₦)</th>
                <th>Status</th>
                <th>Duration</th>
                <th>Days Left</th>
                <th>Action</th>
              </tr>
              <?php
              $no = 1;
              ?>
              @foreach($transact as $item)
              <tr>
                @if($item->trans_type == "Investment")
                <th scope="col">{{$no++}}</th>
                <td>₦{{$item->amount}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->duration}} days</td>
                <td>{{$item->days_left}} days</td>
                <td> <a href="{{route('payment_details')}}?transaction={{$item->trans_id}}"><i class="fas fa-eye"></i></a> </td>
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
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">Create an Investment now</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="{{ route('re_invest') }}" method="POST">
            @csrf
            <div class="form-group">
              <label>Input amount</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <img src="{{URL::asset('assets/img/favicon.ico')}}" alt="" style="width: 25px;">
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="Input amount" name="amount">
              </div>
              <span>Hint: Minimum amount investable is at 10,000 naira</span>
            </div>
            <button type="submit" class="btn btn-success btn-lg m-t-15 waves-effect">INVEST NOW</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">Pay to start investing</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-header">
              Account details to pay for account activation
            </div>
            <div class="card-body">
              <p>
                <span>Bank name: ifeifheifhe</span>
              </p>
              <p>
                <span>Account Name: ifeifheifhe</span>
              </p>
              <p>
                <span>Account Number: ifeifheifhe</span>
              </p>
              <p>
                <span>Contact Number: ifeifheifhe</span>
              </p>
            </div>
            <div class="card-footer">
              <p class="text-info">Endeavour to call the contact details provided above before and after the activation fee is paid</p>
              <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">Confirm Payment here</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">Create an Investment now</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="{{ route('activate_acct') }}" method="POST">
            @csrf
            <div class="form-group">
              <label>Enter your registered name here</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Enter name" name="name">
              </div>
            </div>
            <div class="form-group">
              <label>Enter your registered email address here</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Enter email address" name="email">
              </div>
            </div>
            <div class="form-group">
              <label>Enter your registered phone number here</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Enter phone number" name="phone">
              </div>
            </div>
            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop