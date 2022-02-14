<div class="modal fade exampleModal" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> Role Edit Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('user-update') }}" id="editForm" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group row mb-4">
                        <label for="nameEdit" class="col-md-2 col-sm-4 col-form-label text-right"> Name</label>
                        <div class="col-md-10 col-sm-8">
                            <input type="text" name="name" class="form-control" id="nameEdit">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="roleEdit" class="col-md-2 col-sm-4 col-form-label text-right"> Role</label>
                        <div class="col-md-10 col-sm-8">
                            <select name="role" class="form-control" id="roleEdit">
                                <option value="">--Select--</option>
                                <option value="admin">Admin</option>
                                <option value="manager">Manager</option>
                                <option value="partner">Partner</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="emailEdit" class="col-md-2 col-sm-4 col-form-label text-right"> Email</label>
                        <div class="col-md-10 col-sm-8">
                            <input type="text" name="email" class="form-control" id="emailEdit">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label for="passwordEdit" class="col-md-2 col-sm-4 col-form-label text-right"> Password</label>
                        <div class="col-md-10 col-sm-8">
                            <input type="text" name="password" class="form-control" id="passwordEdit">
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


