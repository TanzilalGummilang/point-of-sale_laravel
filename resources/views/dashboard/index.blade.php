@extends('layouts.master')
@section('title')
  Dashboard
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

            <h5 class="mb-3 mt-1">Point of Sale</h5>
            <h6 class="fw-normal">Aplikasi Transaksi Berbasis Web</h6>

          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
