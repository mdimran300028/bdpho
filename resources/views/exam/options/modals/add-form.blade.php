<!-- Modal -->
<div class="modal fade exampleModal" id="addOption" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary"><i class="fa fa-edit"></i> Option Add Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('option-add') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="optionQuestionId" name="question_id" value=""/>

                    <div class="form-group row mb-2">
{{--                        <label for="description" class="col-md-1 col-sm-3 col-form-label text-right">Question</label>--}}
                        <div class="col-12">
                            <textarea name="option" class="form-control summernote" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-12">
                            <div class="form-check form-check-right">
                                <input class="form-check-input" type="checkbox" name="is_answer" value="1" id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">Set it as mark scheme</label>
                            </div>
                        </div>
                    </div>
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

<script>
  $('#addOption form').submit(function (e) {
    e.preventDefault();
    let questionId = $('#optionQuestionId').val();
    $('.loader').show();
    let url = $(this).attr('action');
    let data = $(this).serialize();
    let method = $(this).attr('method');
    $.ajax({
      type : method,
      url  : url,
      data : data,
      success: function (data) {
        $('.loader').hide();
        console.log(data);
        $('#options-'+questionId).empty().html(data);
        $("#addOption").modal('hide');
        $("#addOption form .note-editable").html(null);
        $("#addOption form input[name=is_answer]").prop('checked',false);
      }
    })
  });
</script>



