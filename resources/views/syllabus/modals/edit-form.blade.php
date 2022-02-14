<!-- Modal -->
<div class="modal fade exampleModal" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> Syllabus Edit Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('syllabus-update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group row mb-3">
                        <label for="enTitle" class="col-md-2 col-sm-3 text-right col-form-label"> Category</label>
                        <div class="col-md-10 col-sm-9">
                            <select class="form-control" name="category_id" required>
                                <option value="">--Select--</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="fileEdit" class="col-md-2 col-sm-3 text-right col-form-label">PDF <span class="bf-1">(বাংলা)</span></label>
                        <div class="col-md-10 col-sm-9">
                            <input type="file" name="file" class="form-control" id="fileEdit" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label for="enFileEdit" class="col-md-2 col-sm-3 text-right col-form-label">PDF (English)</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="file" name="en_file" class="form-control" id="enFileEdit" required/>
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



