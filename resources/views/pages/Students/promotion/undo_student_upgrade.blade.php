<!-- undo the upgrade for selected student -->
<div class="modal fade" id="undo_the_upgrade_for_selected_student{{ $promotion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('Students_trans.reviewing_one') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('unDoUpgrade')}}/{{  $promotion->id  }}/{{ $promotion->student_id }}" method="POST">
                    @csrf
                    <input type="hidden" name="page_id" value="2">
                    <h5 style="font-family: 'Cairo', sans-serif;">{{ trans('Students_trans.process_of_reviewing_one_student') }}</h5>
                    <h5 style="color: red">{{ $promotion->student->name }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('Students_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
