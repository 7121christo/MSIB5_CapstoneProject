@extends('layouts.app')

@section('content')
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
  <script type="text/javascript"
		src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
  <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .center-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;

        }

        #snap-container {
            padding: 20px;
            z-index: 1;
            text-align: center;
            margin-top: -400px;
           margin-left:


        }
    </style>



    <div class="container">

        <div class="card" style="width: 18rem;">
            <img src="{{ asset('assets/img/tas.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Detail Pesanan</h5>

              <table>
                <tr>
                    <td>Nama</td>
                    <td> : {{ $user->name }}</td>
                </tr>
                <tr>
                    <td>No Hp</td>
                    <td> : {{ $user->phone }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> : {{ $user->address }}</td>
                </tr>
                <tr>
                    <td>Qty</td>
                    <td> : {{ $totalAmount }}</td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td> : {{ $totalPrice }}</td>
                </tr>
              </table>



              <button class="btn btn-primary mt-3" id="pay-button">Bayar Sekarang</button>

            </div>
          </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div class="center-container">
        <div class="centered-content">
            <div id="snap-container"></div>
        </div>
    </div>
    {{-- <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            @if(isset($snapToken))
                window.snap.embed('{{ $snapToken }}', {
                    embedId: 'snap-container',
                    onSuccess: function (result) {
                        window.location.href = '/invoice/{{ $transaction->id }}'
                        console.log(result);
                    },
                    onPending: function (result) {
                        alert("Waiting for your payment!"); console.log(result);
                    },
                    onError: function (result) {
                        alert("Payment failed!"); console.log(result);
                    },
                    onClose: function () {
                        alert('You closed the popup without finishing the payment');
                    }
                });
            @else
                alert('Snap token is not set. Check your controller.');
            @endif
        });
    </script> --}}

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
          // Also, use the embedId that you defined in the div above, here.
          window.snap.embed('{{ $snapToken }}', {
            embedId: 'snap-container',
            onSuccess: function (result) {
              /* You may add your own implementation here */
              //alert("payment success!"); console.log(result);
              window.location.href = '/invoice/{{ $transaction->id }}'
              console.log(result);
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


