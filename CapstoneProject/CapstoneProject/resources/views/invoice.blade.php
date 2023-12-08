@extends('layouts.app')

@section('content')
<div class="container billing">
  <div class="row justify-content-center text-center">
    
      <h1>Invoice</h1>

      <div class="card col col-md-4 border-2" style="width: 30%;">
          {{-- <img src="{{ asset('assets/img/tas.jpg') }}" class="card-img-top" alt="..."> --}}
          <div class="card-body justify-content-center text-center">
            <h5 class="card-title">Order Detail</h5>

            <div class="row justify-content-center text-center">
              <div class="col lis">
                  <td>Name</td>
                  <td> : {{ Auth::user()->name }}</td>
              </div>
            </div>  
            <div class="row justify-content-center text-center">
              <div class="col lis">
                  <td>Phone</td>
                  <td> : {{ Auth::user()->phone }}</td>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col lis">
                  <td>Address</td>
                  <td> : {{ Auth::user()->address }}</td>
              </div>
            </div>

              {{-- <tr>
                  <td>Qty</td>
                  <td> : {{ $totalAmount }}</td>
              </tr> --}}
            <div class="row justify-content-center text-center">
              <div class="col lis">
                  <td>Total </td>
                  <td> : Rp {{ number_format($total,2,",",".") }}</td>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col lis">
                  <td>Status </td>
                  <td> : {{ $order->is_paid }}</td>
              </div>
            </div>




            <a href="{{route('indexshop')}}"><button class="btn btn-success mt-3" id="pay-button">Back to Shop</button></a>
            <a href="{{route('indextransaction')}}"><button class="btn btn-success mt-3" id="pay-button">See Transaction</button></a>
          </div>
        </div>
    
  </div>
    
</div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}


@endsection


