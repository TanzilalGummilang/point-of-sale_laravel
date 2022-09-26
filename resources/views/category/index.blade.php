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
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                {{-- @foreach ($categories as $category)
                  <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                  </tr>
                @endforeach --}}

              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>

    {{-- modalAction --}}
    <div class="modal fade" id="modalAction" tabindex="-1" aria-labelledby="modalActionLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
      </div>
    </div>
    {{-- end modalAction --}}

  </div>
@endsection

@push('js')
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.js"></script>
  <script>
    $(document).ready(function() {
      const table = $('#categoryTable').DataTable({
        responsive: true,
        autoWidth: false,
        pagingType: 'numbers',
        processing: true,
        serverSide: true,
        ajax: '{!! route('categories.data') !!}',
        columns: [
          { data: 'id', name: 'id', visible: false},
          { data: 'name', name: 'name', title: 'Nama' },
          { data: 'created_at', name: 'created_at', title: 'Dibuat' },
          { data: 'updated_at', name: 'updated_at', title: 'Diubah' },
          { data: 'action', name: 'action', title: 'Action' }
        ]
      })

      const modalAction = new bootstrap.Modal($('#modalAction'))

      table.on('click', '.action', function() {
        let data = $(this).data()
        let id = data.id
        let type = data.type

        $.ajax({
          method: 'get',
          url: `{{ url('categories/') }}/${id}/edit`,
          success: function(res) {
            $('#modalAction').find('.modal-dialog').html(res)
            modalAction.show()
            $('#modalActionLabel').text('Edit Data Kategori')
            $('#modalAction').find('.btn-primary').text('Update')
            save()
          }
        })
      })

      function save() {
        $('#formAction').on('submit', function(e) {
          e.preventDefault()
          // console.log(this)
          const _form = this
          const formData = new FormData(_form)
          const url = this.getAttribute('action')
          // console.log(url)

          $.ajax({
            method: 'post',
            url: url,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
              table.ajax.reload()
              modalAction.hide()
            },
            error: function(res) {
              let errors = res.responseJSON?.errors
              $(_form).find('.text-danger').remove()
              if (errors) {
                for (const [key, value] of Object.entries(errors)) {
                  $(`[name="${key}"]`).parent().append(
                    `<span class="text-danger">${value}</span>`)
                }
              }
            }
          })
        })
      }

    })
  </script>
@endpush
