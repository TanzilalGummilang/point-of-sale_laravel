@extends('layouts.master')
@section('title')
  Penjualan
@endsection

@section('main-content')
  <div class="main-content">

    <div class="content-wrapper">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header mt-2 mb-2">
            <h4>@yield('title')</h4>
          </div>
          <div class="card-body mb-1">

            <h5 class="mb-3 mt-1">Pilih Produk</h5>

            <div class="mt-2">
              <label for="name" class="form-label">Nama</label>
              <select class="form-select form-select-sm" id="name" name="name" required>
                <option value="">-- pilih --</option>
      
                @foreach ($products as $product)
                  <option value="{{ $product->id }}" data-price="{{ $product->selling_price }}">{{ $product->name }}</option>
                @endforeach
      
              </select>
            </div>

            <div class="mt-2">
              <label for="price" class="form-label">Harga</label>
              <input class="form-control form-control-sm" type="number" id="price" name="price" value="" placeholder="0" readonly>
            </div>
      
            <div class="mt-2">
              <label for="qty" class="form-label">Qty</label>
              <input type="number" class="form-control form-control-sm" id="qty" name="qty" placeholder="0">
            </div>
      
            <div class="mt-2">
              <label for="sub-total" class="form-label">Sub Total</label>
              <input type="number" class="form-control form-control-sm" id="sub-total" name="sub-total" placeholder="0" readonly>
            </div>
      
            <div class="mt-3">
              <button class="btn btn-primary btn-sm">Tambah ke Daftar Beli</button>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
