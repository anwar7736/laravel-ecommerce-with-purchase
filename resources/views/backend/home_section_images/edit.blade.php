<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Home Image Update</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ route('admin.home_section_images.update',[$item->id]) }}" method="POST" id="ajax_form">
      @csrf
      {{ method_field('PATCH') }}
      <div class="modal-body">
          
          <div class="mb-3">
              <label  class="form-label">Home Section Title</label>
              <input type="text" name="title" class="form-control" value="{{ $item->title}}">
          </div>

          <div class="mb-3">
              <label  class="form-label">Home Section Text</label>
              <input type="text" name="text" class="form-control" value="{{ $item->text}}">
          </div>

          <div class="mb-3">
              <label  class="form-label">Home Section Number</label>
              <input type="number" name="section" class="form-control" value="{{ $item->section}}">
          </div>

          <div class="mb-3">
              <label  class="form-label">Home Section Image</label>
              <input type="file" name="image" class="form-control">
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> Update</button>
      </div>
    </form>
  </div>
</div>