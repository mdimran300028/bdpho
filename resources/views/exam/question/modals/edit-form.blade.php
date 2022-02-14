<!-- Modal -->
<div class="modal fade exampleModal" id="questionEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary"><i class="fa fa-edit"></i> Question Edit Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('question-update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row mb-0">
                        <div class="col-12">
                            <textarea name="description" class="form-control summernote" required></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="question_paper_id">
                    <input type="hidden" name="id">
                </div>
                <div class="modal-footer">
                    <button type="reset" class="d-none">reset</button>
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                    <button type="button" class="btn btn-sm btn-dark escape" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal -->



