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
                                    <th scope="col">Email</th>
                                    <th scope="col">Profit</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allwith as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->unique_id}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>₦{{$item->profit}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        @if($item->status == "Requested")
                                        <a href="{{route('approve_with')}}?withdraw={{$item->unique_id}}"><button class="btn btn-primary">Approve</button></a>
                                        @elseif($item->status == "Approved")
                                        <a href="{{route('delete_with')}}?withdraw={{$item->unique_id}}"><button class="btn btn-danger">Delete</button></a>
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