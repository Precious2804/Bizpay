@extends('admin.layout')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="card">
                @if(Session::get('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                <div class="card-header">
                    <h4>Registered Users on Bizpay</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Unique ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Bank Name</th>
                                    <th scope="col">Account Number</th>
                                    <th scope="col">Account Name</th>
                                    <th scope="col">Referral Bonus</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allusers as $item)
                                    <tr>
                                        <th scope="col">{{$item->id}}</th>
                                        <th scope="col">{{$item->unique_id}}</th>
                                        <th>{{$item->first_name}}</th>
                                        <th>{{$item->last_name}}</th>
                                        <th>{{$item->email}}</th>
                                        <th>{{$item->phone}}</th>
                                        <th>{{$item->bank}}</th>
                                        <th>{{$item->acct_number}}</th>
                                        <th>{{$item->acct_name}}</th>
                                        @if($item->ref_bonus == NULL)
                                            <th>0</th>
                                        @endif
                                        @if($item->ref_bonus != NULL)
                                            <th>{{$item->ref_bonus}}</th>
                                        @endif
                                        <th><a href="/delete-user/{{$item->unique_id}}"><i class="fas fa-trash" style="color: red;"></i></a></th>
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