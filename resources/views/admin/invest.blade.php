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
                    <h4>All Investment History</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Unique ID</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Profit</th>
                                    <th scope="col">Days Left</th>
                                    <th scope="col">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allInvest as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->trans_id}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>₦{{$item->profit}}</td>
                                    <td>{{$item->days_left}} days</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        @if($item->status == "Requested Withdrawal")
                                        <a href="{{route('admin.withdraw')}}"><button class="btn btn-primary">Continue</button></a>
                                        @elseif($item->status == "Ongoing")
                                        <a href="/cancel_invest?trans={{$item->trans_id}}"><button class="btn btn-danger">Cancel</button></a>
                                        @elseif($item->status == "Initiated")
                                        <a href="/confirm_invest?trans={{$item->trans_id}}"><button class="btn btn-success">Confirm</button></a>
                                        @elseif($item->status == "Cancelled")
                                        <a href="/activate_invest?trans={{$item->trans_id}}"><button class="btn btn-info">Activate</button></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@stop