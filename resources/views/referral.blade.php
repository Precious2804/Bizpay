@extends('layout')
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <!--section goes here-->
    <div class="section-body">
      <div class="card">
        <div class="col-lg-12">
          @if(Session::get('fail'))
          <div class="alert alert-danger">{{Session::get('fail')}}</div>
          @endif
          @if(Session::get('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
          @endif
          @if(Session::get('successConfirm'))
          <div class="alert alert-success">{{Session::get('successConfirm')}}</div>
          @endif
          @error('ref_id')<div class=" alert alert-danger">{{ "Sorry! This Referral bonus has been requested for Withdrawal already" }}</div>@enderror
        </div>
        <div class="card-header">
          <h4>Referral Management</h4>
        </div>
        <div class="card-body">
          <div class="float-right">
            <h4>Referral Bonus: ₦{{$loggedUserInfo['ref_bonus']}}</h4>
          </div>
          <label>Your Referral Link:</label>
          <div class="form-group">
            <input type="text" id="box" class="form-control" value="{{$routeName}}" style="border-color: green;" readonly>
          </div>
          <div class="form-group float-right">
            <button id="button" class="btn btn-success">Copy Referral Link</button>
          </div>
        </div>
        <div class="card-footer">
          <div class="alert alert-success" style="opacity: 0.8;"><strong>Hint:</strong> Share your Referral Link to friends to Register on {{env('APP_NAME')}}, and get Instant Bonuses into your {{env('APP_NAME')}} Account. <br> <strong>Note:</strong> The more your share, the more you Earn. <br> <strong>Also, </strong>You are only Eligible to Withdraw your Referral Bonus only until your current coupone code expires </div>
        </div>
      </div>
    </div>
  </section>
</div>


<script>
  let box = document.getElementById("box");
  let button = document.getElementById("button");

  button.onclick = function() {
    box.select();
    document.execCommand("copy");
    button.innerText = "Referral Link Copied!"
    button.style.background = "blue"
  }
</script>

@stop