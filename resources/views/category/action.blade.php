<div class="modal-content">
  <form id="formAction" action="{{ $category->id ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
    @csrf
    @if ($category->id)
      @method('put')
    @endif

    <div class="modal-header">
      <h5 class="modal-title" id="modalActionLabel"></h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" placeholder="Input Here" class="form-control" id="name" name="name"
          value="{{ $category->name }}">
      </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-success"></button>
    </div>

  </form>
</div>
