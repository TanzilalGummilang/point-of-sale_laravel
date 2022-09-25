@extends('layouts.master')
@section('title')
  Kategori
@endsection

@push('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endpush

@section('main-content')
  <div class="main-content">

    <div class="content-wrapper">
      <div class="row same-height">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header mt-2 mb-2">
              <h4>@yield('title')</h4>
            </div>
            <div class="card-body mb-1">

              <table id="categoryTable" class="table table-striped" >
                <thead>
                  <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Row 1 Data 1</td>
                    <td>Row 1 Data 2</td>
                  </tr>
                  <tr>
                    <td>Row 2 Data 1</td>
                    <td>Row 2 Data 2</td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection

@push('js')
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#categoryTable').DataTable({
        responsive: true
      })
    })
  </script>
@endpush
