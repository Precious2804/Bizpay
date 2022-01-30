@extends('layout')
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row">
      @if(Session::get('success'))
      <div class="alert alert-info">
        {{Session::get('success')}}
      </div>
      @endif

      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>All Investments ready for withdrawal</h4>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped table-md">
                <tr>
                  <th scope="col">S/N</th>
                  <th>Returned amount(₦)</th>
                  <th>Status</th>
                  <th>Days Left</th>
                  <th>Action</th>
                </tr>
                <?php
                $no = 1;
                ?>
                @foreach($transact as $item)
                <tr>
                  @if($item->days_left == 0)
                  <th scope="col">{{$no++}}</th>
                  <td>₦{{$item->profit}}</td>
                  <td>{{$item->status}}</td>
                  <td>{{$item->days_left}} days</td>
                  @if($item->status == "Requested Withdrawal")
                  <td><button class="btn btn-warning" disabled>Requested Withdrawal</button></td>
                  @else
                  <td> <a href="{{route('do_withdraw')}}?transaction={{$item->trans_id}}"><button class="btn btn-success">Withdraw</button></a> </td>
                  @endif
                  @endif
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