<!-- Modal -->
<div class="modal fade exampleModal" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> Notice Edit Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('notice-update') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group row mb-4">
                        <label for="bnTitleEdit" class="col-md-2 col-sm-3 text-right col-form-label bf-1" style="font-size: 16px"> টাইটেল</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="bn_title" class="form-control bf-1 " style="font-size: 16px" id="bnTitleEdit">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="bnDescriptionEdit" class="col-md-2 col-sm-3 text-right col-form-label bf-1" style="font-size: 16px">বিবরণ</label>
                        <div class="col-md-10 col-sm-9">
                            <textarea name="bn_description" class="form-control summernote" style="font-size: 16px" id="bnDescriptionEdit" required></textarea>
                        </div>
                    </div>

{{--                    <div class="form-group row mb-4">--}}
{{--                        <label for="enTitleEdit" class="col-md-2 col-sm-3 text-right col-form-label"> Title</label>--}}
{{--                        <div class="col-md-10 col-sm-9">--}}
{{--                            <input type="text" name="en_title" class="form-control" id="enTitleEdit">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row mb-0">--}}
{{--                        <label for="enDescriptionEdit" class="col-md-2 col-sm-3 text-right col-form-label">Description</label>--}}
{{--                        <div class="col-md-10 col-sm-9">--}}
{{--                            <textarea name="en_description" class="form-control" id="enDescriptionEdit"></textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}

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



