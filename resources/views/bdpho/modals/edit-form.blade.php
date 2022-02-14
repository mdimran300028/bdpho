<!-- Modal -->
<div class="modal fade exampleModal" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> National Event Edit Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('bdpho-update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row mb-4">
                        <label for="editName" class="col-md-2 col-sm-3 col-form-label text-right"> Name</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="name" class="form-control" id="editName">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="editCode" class="col-md-2 col-sm-3 col-form-label text-right"> Code</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="code" class="form-control" id="editCode">
                            <input type="hidden" name="id" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="" class="col-md-2 col-sm-3 col-form-label text-right"></label>
                        <div class="col-md-10 col-sm-9">
                            <img src="" alt="" class="logo" height="100">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="editLogo" class="col-md-2 col-sm-3 col-form-label text-right">Logo</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="file" name="logo" class="form-control" id="editLogo">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row mb-0">
                                <label class="col-md-4 col-sm-6 col-form-label text-right">Registration </label>
                                <div class="col-md-8 col-sm-6">
                                    <div class="custom-control custom-radio custom-radio-success mb-2">
                                        <input type="radio" id="publishedE" name="registration_status" class="custom-control-input" checked value="1"/>
                                        <label class="custom-control-label" for="publishedE">Open</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-radio-warning">
                                        <input type="radio" id="unpublishedE" name="registration_status" class="custom-control-input" value="2"/>
                                        <label class="custom-control-label" for="unpublishedE">Close</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row mb-0">
                                <label class="col-md-4 col-sm-6 col-form-label text-right">Event Status</label>
                                <div class="col-md-8 col-sm-6">
                                    <div class="custom-control custom-radio custom-radio-success mb-2">
                                        <input type="radio" id="eventPublishedE" name="status" class="custom-control-input" checked value="1"/>
                                        <label class="custom-control-label" for="eventPublishedE">Open</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-radio-warning">
                                        <input type="radio" id="eventUnpublishedE" name="status" class="custom-control-input" value="2"/>
                                        <label class="custom-control-label" for="eventUnpublishedE">Close</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id"/>
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



