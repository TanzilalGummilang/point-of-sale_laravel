@extends('layouts.master')
@section('title')
  Produk
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

            <button type="button" class="mb-3 btn btn-sm btn-primary btnAdd">
              Tambah
            </button>

            <table id="productTable" class="table table-border table-hover">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody></tbody>
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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function() {
      const rupiah = $.fn.dataTable.render.number( '.', ',', 0, 'Rp. ' )
      const table = $('#productTable').DataTable({
        ajax: '{!! route('products.data') !!}',
        responsive: true,
        autoWidth: false,
        pagingType: 'numbers',
        processing: true,
        serverSide: true,
        order: [9, 'desc'],
        columns: [
          { data: 'id', name: 'id', visible: false},
          { data: 'category.name', name: 'category.name', title: 'Kategori' },
          { data: 'name', name: 'name', title: 'Nama' },
          { data: 'brand', name: 'brand', title: 'Merek' },
          { 
            data: 'purchased_price',
            name: 'purchased_price',
            title: 'Harga Beli',
            width: 110,
            render: rupiah
          },
          { 
            data: 'selling_price',
            name: 'selling_price',
            title: 'Harga Jual',
            width: 110,
            render: rupiah
          },
          { data: 'selling_discount', name: 'selling_discount', title: 'Diskon Jual (%)' },
          { data: 'stock', name: 'stock', title: 'Stok' },
          { data: 'created_at', name: 'created_at', title: 'Dibuat' },
          { data: 'updated_at', name: 'updated_at', title: 'Diubah' },
          { data: 'action', name: 'action', title: 'Action', width: 110, searchable:false, orderable:false }
        ]
      })

      const modalAction = new bootstrap.Modal($('#modalAction'))

      $('.btnAdd').on('click', function() {
        $.ajax({
          method: 'get',
          url: `{{ url('products/create') }}`,
          success: function(res) {
            $('#modalAction').find('.modal-dialog').html(res)
            modalAction.show()
            $('#modalActionLabel').text('Tambah Data Produk')
            $('#modalAction').find('.btn-success').text('Simpan')
            save()
          }
        })
      })

      table.on('click', '.action', function() {
        let data = $(this).data()
        let id = data.id
        let type = data.type

        if (type == 'delete') {
          Swal.fire({
            title: 'Yakin hapus Produk ini?',
            text: "Data akan terhapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#3d5c5c',
            confirmButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                method: 'delete',
                url: `{{ url('products/') }}/${id}`,
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                  table.ajax.reload()
                  Swal.fire(
                    'Terhapus!',
                    res.message
                  )
                }
              })
            }
          })
          return
        }

        $.ajax({
          method: 'get',
          url: `{{ url('products/') }}/${id}/edit`,
          success: function(res) {
            $('#modalAction').find('.modal-dialog').html(res)
            modalAction.show()
            $('#modalActionLabel').text('Edit Data Produk')
            $('#modalAction').find('.btn-success').text('Update')
            save()
          }
        })
      })

      function save() {
        $('#formAction').on('submit', function(e) {
          e.preventDefault()
          const _form = this
          const formData = new FormData(_form)
          const url = this.getAttribute('action')

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
                Swal.fire(
                    'Berhasil!',
                    res.message
                  )
            },
            error: function(res) {
              let errors = res.responseJSON?.errors
              console.log(errors);
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
