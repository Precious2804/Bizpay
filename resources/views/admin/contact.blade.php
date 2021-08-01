@extends('admin.layout')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Messages from Contact Us</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                            <tr>
                                <th scope="col">Message ID</th>
                                <th>Sender Name</th>
                                <th>Sender Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                            @foreach($contact as $item)
                            <tr>
                                <th scope="col">{{$item->message_id}}</th>
                                <th scope="col">{{$item->name}}</th>
                                <td>{{$item->email}}</td>
                                <td>{{$item->subject}}</td>
                                <td>{{$item->message}}</td>
                                <td>{{$item->created_at}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>


@stop