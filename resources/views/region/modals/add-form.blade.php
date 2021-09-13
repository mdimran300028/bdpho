<div class="modal-header">
    <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> Region Add Form</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="{{ route('region-add') }}" id="addForm" method="post">
    @csrf
    <div class="modal-body">
        <div class="form-group row mb-4">
            <label for="name" class="col-md-2 col-sm-3 col-form-label">Region Name</label>
            <div class="col-md-10 col-sm-9">
                <input type="text" name="name" class="form-control" id="name">
            </div>
        </div>

        <div class="form-group row mb-4">
            <label for="code" class="col-md-2 col-sm-3 col-form-label">Region Code</label>
            <div class="col-md-10 col-sm-9">
                <input type="text" name="code" class="form-control" id="code">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="districts" class="col-md-2 col-sm-3 col-form-label">Districts </label>
            <div class="col-md-10 col-sm-9">
                <select name="districts[]" class="select2 form-control select2-multiple" multiple="multiple" id="districts" style="width: 100%" data-placeholder="Choose. . . . .">
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
                    <input type="radio" id="published" name="status" class="custom-control-input" checked value="1"/>
                    <label class="custom-control-label" for="published">Active</label>
                </div>

                <div class="custom-control custom-radio custom-radio-warning">
                    <input type="radio" id="unpublished" name="status" class="custom-control-input" value="0"/>
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

