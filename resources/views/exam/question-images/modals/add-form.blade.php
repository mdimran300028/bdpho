<!-- Modal -->
<div class="modal fade exampleModal" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary"><i class="fa fa-edit"></i> Option Add Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('question-image-add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row mb-0">
                        <label id="fileLabel" for="image" class="col-md-2 col-sm-4 col-form-label text-right"> Photo</label>
                        <div class="col-md-10 col-sm-8">
                            <input type="file" class="form-control" name="image" id="image" onchange="showImage(this, 'photo')">
                            <img src="" alt="No Image" class="mt-2 img-thumbnail" id="photo" style="max-width: 200px;">
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
      }
    })
  });
</script>



