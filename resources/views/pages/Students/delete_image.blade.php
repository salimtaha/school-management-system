<!-- Modal -->
<div class="modal fade" id="deleteImage{{ $image->id }}">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"> {{ trans('Students_trans.Delete_attachment') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
   </div>
   <div class="modal-body">
    <p>{{ trans('Students_trans.Delete_attachment_tilte') }}</p>
  </div>
  <div class="modal-footer">
   <button type="button" class="btn btn-secondary" id="close-modal"  data-dismiss="modal">{{ trans('Students_trans.Close') }}</button>
   <form action="{{url('deleteStudentImage')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <input type="hidden" name="image_id" value="{{ $image->id }}">
        <input type="hidden" name="image_name" value="{{ $image->fileName }}">
        <input type="hidden" name="student_name" value="{{ $image->imageable->name }}">
        <button type="submit" class="btn btn-danger">{{ trans('Students_trans.delete') }}</button>

   </form>
   </div>
  </div>
 </div>
</div>