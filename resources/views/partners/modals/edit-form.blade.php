<!-- Modal -->
<div class="modal fade exampleModal" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> Partner Information Edit Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('partner-update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group row mb-3">
                        <label for="nameEdit" class="col-md-2 col-sm-3 text-right col-form-label"> Name</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="name" class="form-control" id="nameEdit" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="titleEdit" class="col-md-2 col-sm-3 text-right col-form-label"> Title</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="title" class="form-control" id="titleEdit"/>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="shortDescriptionEdit" class="col-md-2 col-sm-3 text-right col-form-label"> Description</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="short_description" class="form-control" id="shortDescriptionEdit"/>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="longDescriptionEdit" class="col-md-2 col-sm-3 text-right col-form-label"> Long Description</label>
                        <div class="col-md-10 col-sm-9">
                            <textarea name="long_description" id="longDescriptionEdit" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label for="logoEdit" class="col-md-2 col-sm-3 text-right col-form-label">Logo</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="file" name="logo" class="form-control" id="logoEdit" required/>
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



