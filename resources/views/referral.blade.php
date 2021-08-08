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
                    <div class="form-group float-left">  
                      @if($refReqDetails['status'] == "Awaiting Response")
                      <span class="text text-warning">Receive Payment Yet? Click Here:</span>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter1">Confirm Payment</button>
                      @endif
                      @if($refReqDetails['status'] != "Awaiting Response")
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">Withdraw Ref Bonus</button>
                      @endif
                      
                    </div>
                    <div class="form-group float-right">
                      <button id="button" class="btn btn-success">Copy Referral Link</button>
                    </div>
                </div>
                <div class="card-footer">
                  <div class="alert alert-success" style="opacity: 0.8;"><strong>Hint:</strong> Share your Referral Link to friends to Register on Bizpay, and get Instant Bonuses into your Bizpay Account. <br> <strong>Note:</strong> The more your share, the more you Earn. <br> <strong>Also, </strong>You are only Eligible to Withdraw your Referral Bonus only until your current coupone code expires </div>
                </div>
              </div>
            </div>
        </section>
      </div>

      @if($refReqDetails['status'] == "Awaiting Response")
      <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      @endif
      @if($refReqDetails['status'] != "Awaiting Response")
      <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      @endif
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
              @if($refReqDetails['status'] == "Awaiting Response")
                <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Reception of Payment</h5>
              @endif
              @if($refReqDetails['status'] != "Awaiting Response")
                <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Withdrawal of Ref Bonus</h5>
              @endif
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              @if($refReqDetails['status'] == "Awaiting Response")
                PS: Please ensure that you have received the amount equivalent of your referral bonus before Confirming the Payment
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <form action="{{ route('confirm_ref') }}" method="POST">
                  @csrf
                  <input type="hidden" value="{{$refReqDetails['ref_id']}}" name="ref_id">
                  <input type="hidden" value="{{$refReqDetails['bonus_amount']}}" name="bonus_amount">
                  <button type="submit" class="btn btn-success">Confirm</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
              @endif
              @if($refReqDetails['status'] != "Awaiting Response")
                  Are you Sure you want to request for a withdrawal of your Accrued referral bonus. Click on the "Confirm" button to proceed
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <form action="{{ route('withdraw_bonus') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$loggedUserInfo['ref_bonus']}}" name="bonus_amount">
                    <input type="hidden" value="{{$loggedUserInfo['unique_id']}}" name="ref_id">                  
                    <button type="submit" class="btn btn-success">Confirm</button>
                  </form>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              @endif
              </div>
            </div>
          </div>
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

