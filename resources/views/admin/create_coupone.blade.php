@extends('admin.layout')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Create Coupon Code Here</h4>
                </div>
                <div class="card-body">
                    Click on the action button "Create Coupon" to create a new Coupon Code
                </div>
                <div class="card-footer text-right">
                    <form action="{{route('create_coup')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-lg btn-primary">Create Coupon</button>
                        @if(Session::get('created'))
                            <div class="text-success">{{Session::get('created')}}</div>
                        @endif
                    </form>        
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger">Used Coupons</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">                                 
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Unique ID</th>
                                            <th scope="col">Coupon Code</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allcoupones as $item)
                                            @if($item->status == "Used")
                                                <tr>
                                                    <th scope="row">{{$item->id}}</th>
                                                    <td>{{$item->unique_id}}</td>
                                                    <th scope="col">{{$item->coupone_code}}</th>
                                                    <td style="color: red;">{{$item->status}}</td>
                                                    <td>{{$item->created_at}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-success">Un-Used Coupons</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">      
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Unique ID</th>
                                            <th scope="col">Coupon Code</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allcoupones as $item)
                                            @if($item->status == "un-used")
                                                <tr>
                                                    <th scope="row">{{$item->id}}</th>
                                                    <td>{{$item->unique_id}}</td>
                                                    <th scope="col">{{$item->coupone_code}}</th>
                                                    <td style="color: green;">{{$item->status}}</td>
                                                    <td>{{$item->created_at}}</td>
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
        </div>
    </section>
</div>


@stop