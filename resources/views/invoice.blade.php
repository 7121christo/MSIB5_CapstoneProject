@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class= "my-3">Invoice</h1>


              <h5 class="card-title">Detail pesanan</h5>
              <div class="card" style="width: 18rem;">
                {{-- <img src="{{ asset('assets/img/tas.jpg') }}" class="card-img-top" alt="..."> --}}
                <div class="card-body">
                  <h5 class="card-title">Detail Pesanan</h5>

                  <table>
                    <tr>
                        <td>Nama</td>
                        <td> : {{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td>No Hp</td>
                        <td> : {{ Auth::user()->phone }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td> : {{ Auth::user()->address }}</td>
                    </tr>

                    {{-- <tr>
                        <td>Qty</td>
                        <td> : {{ $totalAmount }}</td>
                    </tr> --}}
                    <tr>
                        <td>Total Harga</td>
                        <td> : {{ $totalPrice }}</td>
                    </tr>
                  </table>




                  <button class="btn btn-primary mt-3" id="pay-button">Bayar Sekarang</button>

                </div>
              </div>

            </div>
          </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


@endsection


