@extends('admin.layout')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Available Package Plans</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Package ID</th>
                                    <th scope="col">Pacakge Name</th>
                                    <th scope="col">Pacakge Value</th>
                                    <th scope="col">Referral Bonus</th>
                                    <th scope="col">Sponsord Bonus</th>
                                    <th scope="col">Minimum Withdrawable</th>
                                    <th scope="col">Date/Time Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($packages as $item)
                                    <tr>
                                        <th scope="col">{{$item->id}}</th>
                                        <th scope="col">{{$item->package_id}}</th>
                                        <th>{{$item->package}}</th>
                                        <th>{{$item->value}}</th>
                                        <th>{{$item->ref_bonus}}</th>
                                        <th>{{$item->spons_bonus}}</th>
                                        <th>{{$item->min_withdraw}}</th>
                                        <th>{{$item->created_at}}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Create a New Package Plan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('creating_package') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="">Pacakage Name</label>
                                <input type="text" name="package" placeholder="Enter Package name" class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="">Package Value/Amount</label>
                                <input type="text" name="value" placeholder="Package value/Amount" class="form-control">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="">Referral Bonus</label>
                                <input type="text" name="ref_bonus" placeholder="Ref Bonus" class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="">Sponsord Referral Bonus</label>
                                <input type="text" name="spons_bonus" placeholder="Sponsord Post Bonus" class="form-control">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="">Minimum Amount Withdrawable</label>
                                <input type="text" name="min_withdraw" placeholder="Minimim withdraw" class="form-control">
                            </div>
                        </div>
                        <div class="form-group float-right">
                            <button type="submit" class="btn btn-lg btn-success">Create Package Plan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@stop