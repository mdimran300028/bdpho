<!-- Modal -->
<div class="modal fade exampleModal" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> Page Add Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('page-add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row mb-4">
                        <label for="name" class="col-md-2 col-sm-3 text-right col-form-label bf-1"> Name</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="name" class="form-control" style="font-size: 16px" id="name">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="title" class="col-md-2 col-sm-3 text-right col-form-label"> Title</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="content" class="col-md-2 col-sm-3 text-right col-form-label">Content</label>
                        <div class="col-md-10 col-sm-9">
                            <textarea name="page_content" class="form-control summernote" id="content"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label for="thumbnail" class="col-md-2 col-sm-3 text-right col-form-label bf-1" style="font-size: 16px"> Thumbnail</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="file" name="thumbnail" class="form-control" id="thumbnail">
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
