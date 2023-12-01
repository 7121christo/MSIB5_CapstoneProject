@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Detail') }}</div>

                    @php
                        $total_price = 0;
                    @endphp

                    <div class="card-body">
                        <h5 class="card-title">Pesanan</h5>
                        <h6 class="card-subtitle mb-2 text-muted">By Calon buyer</h6>
                        <p class="card-text">Unpaid</p>
                        <hr>
                            <p>Tas - 1 pcs</p>
                        <hr>
                        <p>Total: Rp 20000</p>
                        <hr>

                            <form action="" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Upload your payment receipt</label>
                                    <input type="file" name="payment_receipt" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit payment</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
