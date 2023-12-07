{{-- @extends('layouts.app') --}}
@extends('dashboard')

@section('content')
<h2 class="mb-3" style="font-weight: 800; font-size: 3rem">Order List</h2>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div ><h2>{{ __('Transactions') }}</h2></div> --}}
                    <div class="card shadow-sm">
                        <table class="table table-hover">
                            <thead class="table-primary">

                                <tr class="h5">
                                    <th>Order ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)

                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->is_paid }}</td>


                                    </tr>


                                    {{-- <a href="{{ route('show_order', $order) }}">
                                        <h5 class="card-title">Order ID {{ $order->id }}</h5>
                                    </a>
                                    <h6 class="card-subtitle mb-2 text-muted">By {{ $order->user->name }}</h6>

                                    @if ($order->is_paid == 1)
                                        <p class="card-text">Paid</p>
                                    @else
                                        <p class="card-text">Unpaid</p> --}}
                                        @if ($order->payment_receipt)
                                            <div class="d-flex flew-row justify-content-around">
                                                <a href="{{ url('storage/' . $order->payment_receipt) }} "
                                                    class="btn btn-primary">Show payment
                                                    receipt</a>
                                                @if (Auth::user()->is_admin)
                                                    <form action="{{ route('confirm_payment', $order) }}" method="post">
                                                        @csrf
                                                        <button class="btn btn-success" type="submit">Confirm</button>
                                                    </form>
                                                @endif
                                            </div>
                                        {{-- @endif
                                    @endif --}}
@endif
                        @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
