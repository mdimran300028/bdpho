<!-- Modal -->
<div class="modal fade exampleModal" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> Student Info Edit Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('division-update') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group row mb-4">
                        <label for="editName" class="col-md-2 col-sm-3 col-form-label">Name</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="name" class="form-control" id="editName">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="editName" class="col-md-2 col-sm-3 col-form-label">School</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="school" class="form-control" id="editName">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="editName" class="col-md-2 col-sm-3 col-form-label">Division</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="division" class="form-control" id="editName">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="editCode" class="col-md-2 col-sm-3 col-form-label">District</label>
                        <div class="col-md-10 col-sm-9">
                            <select class="form-control" name="district_id" required>
                                <option value="">--Select--</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="editName" class="col-md-2 col-sm-3 col-form-label">Category</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="category" class="form-control" id="editName">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="editName" class="col-md-2 col-sm-3 col-form-label">Class</label>
                        <div class="col-md-10 col-sm-9">
                            <select class="form-control" name="class_id" required>
                                <option value="">--Select--</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="editName" class="col-md-2 col-sm-3 col-form-label">Email</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="email" class="form-control" id="editName">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="editName" class="col-md-2 col-sm-3 col-form-label">Mobile</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="mobile" class="form-control" id="editName">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="editName" class="col-md-2 col-sm-3 col-form-label">Gender</label>
                        <div class="col-md-10 col-sm-9">
                            <select class="form-control" name="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="editName" class="col-md-2 col-sm-3 col-form-label">Post Code</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="post_code" class="form-control" id="editName">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="editName" class="col-md-2 col-sm-3 col-form-label">Address</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="address" class="form-control" id="editName">
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



