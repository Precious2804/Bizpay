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
                    <h4>Accounts Activation Lists </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                ?>
                                @foreach($activate as $item)
                                <tr>
                                    <th scope="col">{{$no++}}</th>
                                    <th>{{$item->name}}</th>
                                    <th>{{$item->email}}</th>
                                    <th>{{$item->phone}}</th>
                                    <th>
                                        <a href="/activate_now?email={{$item->email}}">
                                            <button class="btn btn-primary">Activate</button>
                                        </a>
                                    </th>
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