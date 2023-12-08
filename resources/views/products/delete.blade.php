<!-- Modal -->
@foreach ( $products as $item )
<div class="modal fade" id="staticBackdropDelete{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('products.delete', ['id' => $item->id] ) }}" method="POST" enctype="multipart/form-data">
                @method('DELETE')
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <p>Are you sure delete products "{{ $item->name }}"?</p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
