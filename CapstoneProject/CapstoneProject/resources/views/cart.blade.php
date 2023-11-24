@extends('layouts.app')

@section('content')
<div class="container pt-5 text-dark">

    <div class="card py-md-4 px-md-5 p-3">
        <div class="row fw-bolder">
            <div class="col-md-4">
                Product
            </div>
            <div class="col-md-2 text-md-center">
                Price
            </div>
            <div class="col-md-3 text-center">
                Quantity
            </div>
            <div class="col-md-2 text-end">
                Subtotal
            </div>
            <div class="col-md-1 text-end">

            </div>
        </div>
    </div>

    <div class="card py-md-4 px-md-5 p-3">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center">
                Mini Distortion Hand Bag
            </div>
            <div class="col-md-2 d-flex align-items-center text-center">
                $650
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <input type="number" class="form-control w-25" value="1" min="1">
            </div>
            <div class="col-md-2 d-flex align-items-center justify-content-end">
                $650
            </div>
            <div class="col-md-1 d-flex align-items-center justify-content-end">
                <button class="btn btn-sm btn-danger">
                    Hapus
                </button>
            </div>
        </div>
    </div>

    <div class="card py-md-4 px-md-5 p-3">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center">
                Horssebit 1955
            </div>
            <div class="col-md-2 d-flex align-items-center text-center">
                $550
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <input type="number" class="form-control w-25" value="2" min="1">
            </div>
            <div class="col-md-2 d-flex align-items-center justify-content-end">
                $1100
            </div>
            <div class="col-md-1 d-flex align-items-center justify-content-end">
                <button class="btn btn-sm btn-danger">
                    Hapus
                </button>
            </div>
        </div>
    </div>

    <div class="row py-4">
        <div class="col">
            <button class="btn btn-light px-4 py-2 rounded-0 border border-dark">
                Return to Shop
            </button>
        </div>
        {{-- <div class="col text-end">
            <button class="btn btn-light px-4 py-2 rounded-0 border border-dark">
                Update Cart
            </button>
        </div> --}}
    </div>

    <div class="row justify-content-end">
        <div class="col-md-4">
            <div class="card p-4 rounded-0 border border-dark">
                <h5 class="pb-3"><b>Cart Total</b></h5>
                <div class="row justify-content-between border-bottom border-secondary-subtle py-3">
                    <div class="col">
                        Subtotal:
                    </div>
                    <div class="col text-end">
                        $1750
                    </div>
                </div>
                <div class="row justify-content-between border-bottom border-secondary-subtle py-3">
                    <div class="col">
                        Shipping:
                    </div>
                    <div class="col text-end">
                        Free
                    </div>
                </div>
                <div class="row justify-content-between py-3">
                    <div class="col">
                        Total:
                    </div>
                    <div class="col text-end">
                        $1750
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col text-end">
                        <button class="btn btn-muted px-4 py-2 rounded-0">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection