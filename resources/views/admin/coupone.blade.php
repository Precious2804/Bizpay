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
                    <h4>Create Coupon Code for Pacakge plan "{{$selectPack['package']}}"</h4>
                </div>
                <div class="card-body">
                    <span style="font-weight:bold">Hint:</span>
                    <div>Select the number of coupon codes that you wish to generate for this Package</div>
                    <div>Click on the action button "Create Coupon" to create a new Coupon Code for the <span class="text-success">"{{$selectPack['package']}}"</span></div>
                </div>
                <div class="card-footer text-right">
                    <form action="{{route('create_coup')}}" method="POST">
                        @csrf
                        <div class="row float-right">
                            <input type="hidden" name="package" value="{{$selectPack['package']}}">
                            <select name="no_of_coup" id="">
                                <option value="">How many?</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                                <option value="60">60</option>
                                <option value="70">70</option>
                                <option value="80">80</option>
                                <option value="90">90</option>
                                <option value="100">100</option>
                            </select>
                            <button type="submit" class="btn btn-lg btn-primary">Create Coupon</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>