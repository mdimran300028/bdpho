<div class="modal fade exampleModal" id="editAvatar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> Photo Edit Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('user-avatar-update') }}" id="avatarEditForm" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row mb-4">
                        <label for="" class="col-md-2 col-sm-4 col-form-label text-right"> Name</label>
                        <div class="col-md-10 col-sm-8">
                            <input type="text" name="name" class="form-control" id="" readonly>
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <label id="fileLabel" for="avatar" class="col-md-2 col-sm-4 col-form-label text-right"> Photo</label>
                        <div class="col-md-10 col-sm-8">
                            <input type="file" class="form-control" name="avatar" id="avatar" onchange="showImage(this, 'profile_photo')">
                            <img src="" alt="No Image" class="mt-2 img-thumbnail" id="profile_photo" style="max-width: 200px;">
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


