<div class="modal fade" id="modal-confirm-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="form-confirm-delete" method="POST" action="">
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><i></i> {!! trans('app.label.confirm_delete') !!}</h4>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">{!! trans('app.message.question.delete') !!}</h4>
                    <hr>
                    <div class="form-horizontal" id="data-confirm-delete"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{!! trans('app.button.delete') !!}</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">{!! trans('app.button.close') !!}</button>
                </div>
            </div>
        </form>
    </div>
</div>
