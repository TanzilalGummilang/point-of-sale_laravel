<div class="modal-content">
  <form id="formAction" action="{{ $product->id ? route('products.update', $product->id) : route('products.store') }}" method="POST">
    @csrf
    @if ($product->id)
      @method('put')
    @endif

    <div class="modal-header">
      <h5 class="modal-title" id="modalActionLabel"></h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

      <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select class="form-select" name="category_id">
          @foreach ($categories as $category)
            @if (old('category_id', $product->category_id) == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" placeholder="Input Here" class="form-control" id="name" name="name"
          value="{{ $product->name }}">
      </div>
      <div class="mb-3">
        <label for="brand" class="form-label">Merek</label>
        <input type="text" placeholder="Input Here" class="form-control" id="brand" name="brand"
          value="{{ $product->brand }}">
      </div>
      <div class="mb-3">
        <label for="purchased_price" class="form-label">Harga Beli</label>
        <input type="number" placeholder="Input Here" class="form-control" id="purchased_price" name="purchased_price"
          value="{{ (int)$product->purchased_price }}">
      </div>
      <div class="mb-3">
        <label for="selling_price" class="form-label">Harga Jual</label>
        <input type="number" placeholder="Input Here" class="form-control" id="selling_price" name="selling_price"
          value="{{ (int)$product->selling_price }}">
      </div>
      <div class="mb-3">
        <label for="selling_discount" class="form-label">Diskon Jual (%)</label>
        <input type="number" placeholder="Input Here" class="form-control" id="selling_discount" name="selling_discount"
          value="{{ $product->selling_discount }}">
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Stok</label>
        <input type="number" placeholder="Input Here" class="form-control" id="stock" name="stock"
          value="{{ $product->stock }}">
      </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-success"></button>
    </div>

  </form>
</div>
