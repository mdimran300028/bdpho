<!-- Modal -->
<div class="modal fade exampleModal" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> Organizer Add Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('organizer-add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group row mb-3">
                        <label for="name" class="col-md-2 col-sm-3 text-right col-form-label"> Name</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="name" class="form-control" id="name"/>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="title" class="col-md-2 col-sm-3 text-right col-form-label"> Title</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="title" class="form-control" id="title"/>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="description" class="col-md-2 col-sm-3 text-right col-form-label"> Description</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="description" class="form-control" id="description"/>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="email" class="col-md-2 col-sm-3 text-right col-form-label"> Email</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="email" name="email" class="form-control" id="email"/>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label for="photo" class="col-md-2 col-sm-3 text-right col-form-label">Photo</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="file" name="photo" class="form-control" id="photo"/>
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
