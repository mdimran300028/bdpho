<!-- Modal -->
<div class="modal fade exampleModal" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> Past Paper Add Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('past-paper-add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group row mb-3">
                        <label for="enTitle" class="col-md-2 col-sm-3 text-right col-form-label"> Event</label>
                        <div class="col-md-10 col-sm-9">
                            <select class="form-control" name="event_id" required>
                                <option value="">--Select--</option>
                                @foreach(events() as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="enTitle" class="col-md-2 col-sm-3 text-right col-form-label"> Round</label>
                        <div class="col-md-10 col-sm-9">
                            <select class="form-control" name="round_id" required>
                                <option value="">--Select--</option>
                                @foreach(rounds() as $round)
                                    <option value="{{ $round->id }}">{{ $round->name }}</option>
                                @endforeach
                                <option value="999">All Round</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="enTitle" class="col-md-2 col-sm-3 text-right col-form-label"> Category</label>
                        <div class="col-md-10 col-sm-9">
                            <select class="form-control" name="category_id" required>
                                <option value="">--Select--</option>
                                @foreach(categories() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                <option value="999">All Category</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="title" class="col-md-2 col-sm-3 text-right col-form-label"> Title</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="title" class="form-control" id="title" />
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label for="file" class="col-md-2 col-sm-3 text-right col-form-label"> File</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="file" name="file" class="form-control" id="file" required/>
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
