@extends('admin.layout')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            @if(Session::get('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
                    <div class="card">
                        <div class="card-header">
                            <h4>Pending Withdrawal Requests</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Unique ID</th>
                                            <th scope="col">Referral ID</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Bonus Amount</th>
                                            <th scope="col" style="color: green;">Status</th>
                                            <th scope="col">Creation Date/Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allreferral as $item)
                                            @if($item->status == "Awaiting Response")
                                                <tr>
                                                    <th scope="col">{{$item->id}}</th>
                                                    <th scope="col">{{$item->unique_id}}</th>
                                                    <th>{{$item->ref_id}}</th>
                                                    <th>{{$item->email}}</th>
                                                    <th>{{$item->phone}}</th>
                                                    <th>{{$item->bonus_amount}}</th>
                                                    <th style="color: green;">{{$item->status}}</th>
                                                    <th>{{$item->created_at}}</th>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-success">Completed Payments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Unique ID</th>
                                            <th scope="col">Referral ID</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Bonus Amount</th>
                                            <th scope="col" style="color: green;">Status</th>
                                            <th scope="col">Creation Date/Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allreferral as $item)
                                            @if($item->status == "Payment Completed")
                                                <tr>
                                                    <th scope="col">{{$item->id}}</th>
                                                    <th scope="col">{{$item->unique_id}}</th>
                                                    <th>{{$item->ref_id}}</th>
                                                    <th>{{$item->email}}</th>
                                                    <th>{{$item->phone}}</th>
                                                    <th>{{$item->bonus_amount}}</th>
                                                    <th style="color: green;">{{$item->status}}</th>
                                                    <th>{{$item->created_at}}</th>
                                                </tr>
                                            @endif    
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@stop