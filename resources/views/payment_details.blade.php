@extends('layout')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <!--section goes here-->
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Payment Details</h4>
                </div>
                <div class="card-body">
                    <div class="float-right">
                        <h4>Payment amount: ₦{{$transaction['amount']}}</h4>
                    </div>
                    <br>
                    <hr>
                    <div class="form-group">
                        <label>Account Name:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" value="" style="border-color: green;" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Bank Name:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" value="" style="border-color: green;" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Account Number:</label>
                        <div class="form-group">
                            <input type="text" id="box" class="form-control" value="" style="border-color: green;" readonly>
                        </div>
                    </div>

                    <div class="form-group float-right">
                        <button id="button" class="btn btn-success">Copy Account Number</button>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="alert alert-success" style="opacity: 0.8;"><strong>Hint:</strong> Copy the account number by clicking the "Copy Account Number" button. <br> Then proceed to make your payment of your earlier requested amount to the account details provided to you. <br> <strong>Also, </strong>Endeavour to contact the account owner displayed above before and after making payments. Thank you</div>
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