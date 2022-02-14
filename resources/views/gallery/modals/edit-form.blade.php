<!-- Modal -->
<div class="modal fade exampleModal" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> Gallery Item Edit Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('gallery-update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group row mb-3">
                        <label for="titleEdit" class="col-md-2 col-sm-3 text-right col-form-label"> Title</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="title" class="form-control" id="titleEdit"/>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="descriptionEdit" class="col-md-2 col-sm-3 text-right col-form-label"> Description</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="description" class="form-control" id="descriptionEdit"/>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="typeEdit" class="col-md-2 col-sm-3 text-right col-form-label"> Type</label>
                        <div class="col-md-10 col-sm-9">
                            <select class="form-control" name="type" id="typeEdit" required>
                                <option value="">--Select--</option>
                                <option value="image">Image</option>
                                <option value="video">Video</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-0 image type">
                        <label for="sourceEdit" class="col-md-2 col-sm-3 text-right col-form-label">Image</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="file" name="source" class="form-control" id="sourceEdit"/>
                        </div>
                    </div>



                    <div class="form-group row mb-3 video type" style="display: none">
                        <label for="thumbnailEdit" class="col-md-2 col-sm-3 text-right col-form-label">Thumbnail</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="file" name="thumbnail" class="form-control" id="thumbnailEdit"/>
                        </div>
                    </div>

                    <div class="form-group row mb-0 video type" style="display: none">
                        <label for="sourceEdit" class="col-md-2 col-sm-3 text-right col-form-label">YT Link</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="source" class="form-control" id="sourceEdit" placeholder="https://www.youtube.com/watch?v=pf72ykQH7GY"/>
                        </div>
                    </div>

                    <input type="hidden" name="id"/>
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
