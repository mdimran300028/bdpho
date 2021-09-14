<div class="modal fade exampleModal" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> Region Edit Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('region-update') }}" id="editForm" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group row mb-4">
                        <label for="nameEdit" class="col-md-2 col-sm-3 col-form-label">Region Name</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="name" class="form-control" id="nameEdit">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="codeEdit" class="col-md-2 col-sm-3 col-form-label">Region Code</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="code" class="form-control" id="codeEdit">
                        </div>
                    </div>

                    <input type="hidden" name="id"/>

                    <div class="form-group row mb-3">
                        <label for="districtsEdit" class="col-md-2 col-sm-3 col-form-label">Districts </label>
                        <div class="col-md-10 col-sm-9">
                            <select name="districts[]" class="select2 select2-multiple form-control" multiple="multiple" id="districtsEdit" style="width: 100%" data-placeholder="Choose. . . . .">
                                @foreach($divisions as $division)
                                    <optgroup label="{{ $division->name }} Division:">
                                        @foreach($division->districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label class="col-md-2 col-sm-3 col-form-label">Status</label>
                        <div class="col-md-10 col-sm-9">
                            <div class="custom-control custom-radio custom-radio-success mb-2">
                                <input type="radio" id="publishedEdit" name="status" class="custom-control-input" checked value="1"/>
                                <label class="custom-control-label" for="published">Active</label>
                            </div>

                            <div class="custom-control custom-radio custom-radio-warning">
                                <input type="radio" id="unpublishedEdit" name="status" class="custom-control-input" value="0"/>
                                <label class="custom-control-label" for="unpublished">Inactive</label>
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


