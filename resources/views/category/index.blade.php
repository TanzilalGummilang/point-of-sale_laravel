@extends('layouts.master')
@section('title')
  Kategori
@endsection

@push('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css"/>
@endpush

@section('main-content')
  <div class="main-content">

    <div class="content-wrapper">
      <div class="col-12">
        <div class="card">
          <div class="card-header mt-2 mb-2">
            <h4>@yield('title')</h4>
          </div>
          <div class="card-body mb-1">

            <table id="categoryTable" class="table table-striped">
              <thead>
                <tr>
                  <th>name</th>
                  <th>created</th>
                  <th>updated</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($categories as $category)
                  <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                  </tr>
                @endforeach

              </tbody>
            </table>

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
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#categoryTable').DataTable({
        responsive: true,
        autoWidth: false,
        pagingType: 'numbers'
      })
    })
  </script>
@endpush
