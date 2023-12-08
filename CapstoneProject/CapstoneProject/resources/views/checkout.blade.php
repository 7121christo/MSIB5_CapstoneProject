@extends('layouts.app')

@section('content')
    {{-- <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
  <script type="text/javascript"
		src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
  <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <style>
        .center-container {
            display: flex;
            align-items: center;
            justify-content: center;
           

        }

        #snap-container {
            padding: 20px;
            z-index: 1;
            text-align: center;
            
           margin-left:


        }
    </style>



    <div class="container billing">
      <div class="row justify-content-center text-center">
        
          <h1>Payment Page</h1>

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
                      <td> : {{ number_format($totalPrice,2,",",".") }}</td>
                  </div>
                </div>
  
  
  
  
                <button class="btn btn-success mt-3" id="pay-button">Pay Now</button>
  
              </div>
            </div>
        
      </div>
        
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

    <div class="center-container">
        <div class="centered-content">
            <div id="snap-container"></div>
        </div>
    </div>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
          // Also, use the embedId that you defined in the div above, here.
        window.snap.pay('{{ $snapToken }}', {
            // embedId: 'snap-container',
            onSuccess: function (result) {
              /* You may add your own implementation here */
              alert("payment success!"); console.log(result);

            },
            onPending: function (result) {
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function (result) {
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function () {
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          });
        });
      </script>









@endsection


