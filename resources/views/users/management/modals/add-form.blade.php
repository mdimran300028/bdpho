<div class="modal fade exampleModal" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> User Add Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('user-add') }}" id="addForm" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group row mb-4">
                        <label for="name" class="col-md-2 col-sm-4 col-form-label text-right"> Name</label>
                        <div class="col-md-10 col-sm-8">
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="role" class="col-md-2 col-sm-4 col-form-label text-right"> Role</label>
                        <div class="col-md-10 col-sm-8">
                            <select name="role" class="form-control" id="role">
                                <option value="">--Select--</option>
                                <option value="admin">Admin</option>
                                <option value="manager">Manager</option>
                                <option value="partner">Partner</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="email" class="col-md-2 col-sm-4 col-form-label text-right"> Email</label>
                        <div class="col-md-10 col-sm-8">
                            <input type="text" name="email" class="form-control" id="email">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label for="password" class="col-md-2 col-sm-4 col-form-label text-right"> Password</label>
                        <div class="col-md-10 col-sm-8">
                            <input type="text" name="password" class="form-control" id="password">
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
