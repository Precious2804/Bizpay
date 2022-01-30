@extends('admin.layout')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="card">
                @if(Session::get('created'))
                <div class="alert alert-success">{{Session::get('created')}}</div>
                @endif
                <div class="card-header">
                    <h4>Create New Bank account here</h4>
                </div>
                <div class="card-body">
                    Create Bank Accounts that would be in charge of receving payments
                </div>
                <div class="card-footer text-right">
                    <form action="{{route('update_admin_bank')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="" class="float-left">Bank Name</label>
                                <input type="text" name="bank" class="form-control" value="{{$bank_details['bank']}}">
                                <span class="text-danger">@error('bank'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="" class="float-left">Bank Account Number</label>
                                <input type="text" name="number" class="form-control" value="{{$bank_details['number']}}">
                                <span class="text-danger">@error('number'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="" class="float-left">Bank Account Name</label>
                                <input type="text" name="name" class="form-control" value="{{$bank_details['name']}}">
                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="" class="float-left">Contact number</label>
                                <input type="text" name="contact" class="form-control" value="{{$bank_details['contact']}}">
                                <span class="text-danger">@error('contact'){{ $message }}@enderror</span>
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary">Submit Now</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>


@stop