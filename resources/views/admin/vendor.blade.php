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
                    <h4>Create New Vendor Here</h4>
                </div>
                <div class="card-body">
                    Create Vendor Accounts that would be in charge of sales of Coupon Codes
                </div>
                <div class="card-footer text-right">
                    <form action="{{route('create-vendor')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="" class="float-left">Vendor Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Vendor Name">
                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-gorup col-lg-6">
                                <label for="" class="float-left">Vendor Whatsapp Link <span class="text-italize"></span></label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Vendor Whatsapp Link">
                                <span class="text-danger">@error('link'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="" class="float-left">Vendor Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary">Create Vendor</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-12">
            @if(Session::get('deleted'))
                <div class="alert alert-success">{{Session::get('deleted')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>List of Vendor accounts on Bizpay</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th scope="col">Vendor ID</th>
                                <th>Vendor Name</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Operation</th>
                            </tr>
                            @foreach($vendors as $item)
                            <tr>
                                <th scope="col">{{$item->vendor_id}}</th>
                                <th scope="col">{{$item->name}}</th>
                                <td>{{$item->phone}}</td>
                                @if($item->image == "/storage/No Image")
                                <td><img src="{{URL::asset('assets/img/Bizpayglobal_logo_only.png')}}" alt="Bizpay Global" width="80px" height="70px"></td>
                                @else
                                <td><img src="{{ asset($item->image) }}" alt="" width="80px" height="70px"></td>
                                @endif
                                <td>{{$item->created_at}}</td>
                                <td><a href="/del-vendor/{{$item->vendor_id}}"><i class="fas fa-trash" style="color: red;"></i></a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@stop