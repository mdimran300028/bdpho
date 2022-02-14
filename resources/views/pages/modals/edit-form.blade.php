<form action="{{ route('page-update') }}" method="post">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="form-group row mb-2">
                <label for="nameEdit" class="col-md-1 col-sm-3 text-right col-form-label"> Name</label>
                <div class="col-md-11 col-sm-9">
                    <input type="text" name="name" value="{{ $page->name }}" class="form-control" id="nameEdit" readonly>
                </div>
            </div>

            <div class="form-group row mb-2">
                <label for="titleEdit" class="col-md-1 col-sm-3 text-right col-form-label"> Title</label>
                <div class="col-md-11 col-sm-9">
                    <input type="text" name="title" value="{{ $page->title }}" class="form-control" id="titleEdit">
                </div>
            </div>

            <div class="form-group row mb-2">
                <label for="contentEdit" class="col-md-1 col-sm-3 text-right col-form-label">Content</label>
                <div class="col-md-11 col-sm-9">
                    <textarea name="page_content" class="form-control summernote" id="contentEdit">{!! $page->content !!}</textarea>
                </div>
            </div>

            <div class="form-group row mb-2">
                <label for="thumbnail" class="col-md-1 col-sm-3 text-right col-form-label bf-1" style="font-size: 16px"> Image</label>
                <div class="col-md-11 col-sm-9">
                    <input type="file" name="thumbnail" class="form-control" id="thumbnail">
                </div>
            </div>

            <input type="hidden" value="{{ $page->id }}" name="id"/>

            <div class="form-group row mb-0">
                <label for="" class="col-md-1 col-sm-3 text-right col-form-label"></label>
                <div class="col-md-11 col-sm-9">
                    <div class="row">
                        <div class="col d-none"><button type="reset" class="d-none">reset</button></div>
                        <div class="col"><button type="submit" class="btn btn-sm btn-block btn-success">Update</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
