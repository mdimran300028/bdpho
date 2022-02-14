<!-- Modal -->
<div class="modal fade exampleModal" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> Category Edit Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('category-update') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group row mb-4">
                        <label for="editName" class="col-md-2 col-sm-3 col-form-label">Category Name</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="name" class="form-control" id="editName">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="editCode" class="col-md-2 col-sm-3 col-form-label">Category Code</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="code" class="form-control" id="editCode">
                            <input type="hidden" name="id" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="editClasses" class="col-md-2 col-sm-3 col-form-label">Classes </label>
                        <div class="col-md-10 col-sm-9">
                            <select name="classes[]" class="select2 select2-multiple form-control" multiple="multiple" id="editClasses" style="width: 100%" data-placeholder="Choose. . . . .">
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label class="col-md-2 col-sm-3 col-form-label">Status</label>
                        <div class="col-md-10 col-sm-9">
                            <div class="custom-control custom-radio custom-radio-success mb-2">
                                <input type="radio" id="editPublished" name="status" class="custom-control-input" value="1"/>
                                <label class="custom-control-label" for="editPublished">Active</label>
                            </div>

                            <div class="custom-control custom-radio custom-radio-warning">
                                <input type="radio" id="editUnpublished" name="status" class="custom-control-input" value="2"/>
                                <label class="custom-control-label" for="editUnpublished">Inactive</label>
                            </div>
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



