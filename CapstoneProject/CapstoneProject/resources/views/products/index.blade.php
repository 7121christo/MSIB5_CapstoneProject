@extends('dashboard')

@section('content')
<div id="main">

    <!-- <div class="card"> -->
        <h2 class="mb-3" style="font-weight: 800; font-size: 3rem">Products List</h2>
        <!-- <div class="card-body"> -->
            <a href="{{ route('products') }}" class="btn btn btn-outline-primary mb-3 shadow-sm" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add Products<i class="ms-2 fa-sharp fa-solid fa-plus"></i>
            </a>

            <div class="card shadow-sm">
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr class="h5">
                            <th>No.</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $pd)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ asset('images/products/'. $pd->image) }}" alt="image" class="img-thumbnail" width="200">
                                </td>
                                <td>{{ $pd->name }}</td>
                                <td>{{ $pd->price }}</td>
                                <td>{{ $pd->description }}</td>
                                <td>{{ $pd->stock }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropUpdate{{ $pd->id }}">
                                        <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropDelete{{ $pd->id }}">
                                        <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- {{ $categories->Links() }} --}}
        <!-- </div> -->
    <!-- </div> -->
    @include('products.create')
    @include('products.update')
    @include('products.delete')
</div>
@endsection
