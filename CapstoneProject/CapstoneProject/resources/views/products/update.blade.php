<!-- Modal -->
@foreach ( $products as $item )
<div class="modal fade" id="staticBackdropUpdate{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Products</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('products.update', ['id' => $item->id] ) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $item->name) }}" >
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $item->price) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" required>{{ old('description', $item->description) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if ( $item->image )
                            <input type="hidden" name="image" id="image" class="form-control" value="{{ 'image' ,$item->image }}">
                            <p>Current image : {{ $item->image }}</p>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="stock">Stock</label>
                        <input type="text" name="stock" id="stock" class="form-control" value="{{ old('stock', $item->stock) }}">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
