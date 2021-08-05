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
                            <h4>Pending Loan Requests</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Loan ID</th>
                                            <th scope="col">Loan Coupon</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Reason</th>
                                            <th scope="col">Document</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Creation Date/Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allloan as $item)
                                                <tr>
                                                <th scope="col">{{$item->id}}</th>
                                                    <th scope="col">{{$item->loan_id}}</th>
                                                    <th>{{$item->loan_coupone}}</th>
                                                    <th>{{$item->email}}</th>
                                                    <th>{{$item->fname}}</th>
                                                    <th>{{$item->lname}}</th>
                                                    <th>{{$item->phone}}</th>
                                                    <th>{{$item->amount}}</th>
                                                    <th>{{$item->reasons}}</th>
                                                    <th><a href="{{ asset('storage/'.$item->document) }}" target="_blank"><img src="{{ asset('storage/'.$item->document) }}" width="70px" height="50px" alt=""></a></th>
                                                    @if($item->status == "Awaiting Approval")
                                                        <th><a href="/approve/{{$item->loan_id}}"><button type="button" class="btn btn-danger">Approve Now</button></a></th>
                                                    @endif
                                                    @if($item->status == "Approved")
                                                        <th class="text-success">{{$item->status}}</th>
                                                    @endif
                                                    <th>{{$item->created_at}}</th>
                                                </tr>
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