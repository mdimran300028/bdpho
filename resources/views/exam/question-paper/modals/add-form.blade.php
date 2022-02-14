<!-- Modal -->
<div class="modal fade exampleModal" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="deposit"><i class="fa fa-edit"></i> Question Paper Add Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('question-paper-add') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group row mb-4">
                        <label for="eventId" class="col-md-2 col-sm-3 col-form-label text-right">Event</label>
                        <div class="col-md-10 col-sm-9">
                            <select class="form-control" name="event_id" id="eventId" required>
                                <option value="">--Select Event--</option>
                                @foreach(events() as $event)
                                    <option value="{{ $event->id }}" {{ runningEventId() == $event->id ? 'selected' : '' }}>{{ $event->code }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="roundId" class="col-md-2 col-sm-3 col-form-label text-right">Round</label>
                        <div class="col-md-10 col-sm-9">
                            <select class="form-control" name="round_id" id="roundId" required>
                                <option value="">--Select Round--</option>
                                @foreach(rounds() as $round)
                                    <option value="{{ $round->id }}">{{ $round->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="categoryId" class="col-md-2 col-sm-3 col-form-label text-right">Category</label>
                        <div class="col-md-10 col-sm-9">
                            <select class="form-control" name="category_id" id="categoryId" required>
                                <option value="">--Select Category--</option>
                                @foreach(categories() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="questionType" class="col-md-2 col-sm-3 col-form-label text-right">Question Type</label>
                        <div class="col-md-10 col-sm-9">
                            <select class="form-control" name="question_type" id="questionType" required>
                                <option value="">--Select Question Type--</option>
                                <option value="1">Multiple Choice Question</option>
                                <option value="2">Written Question</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="title" class="col-md-2 col-sm-3 col-form-label text-right">Exam Title</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="title" class="form-control" id="title" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="mark" class="col-md-2 col-sm-3 col-form-label text-right">Mark</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="number" name="mark" class="form-control" id="mark" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="exam_start_time" class="col-md-2 col-sm-3 col-form-label text-right">Start Time</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="datetime-local" name="exam_start_time" class="form-control" id="exam_start_time" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="exam_end_time" class="col-md-2 col-sm-3 col-form-label text-right">End Time</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="datetime-local" name="exam_end_time" class="form-control" id="exam_end_time" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="duration" class="col-md-2 col-sm-3 col-form-label text-right">Duration</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="number" name="duration" class="form-control" id="duration" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="remindTime" class="col-md-2 col-sm-3 col-form-label text-right">Remind Time</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="number" name="remind_time" class="form-control" id="remindTime" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="remindMessage" class="col-md-2 col-sm-3 col-form-label text-right">Remind Text</label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="remind_message" class="form-control" id="remindMessage" required/>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label class="col-md-2 col-sm-3 col-form-label text-right">Status</label>
                        <div class="col-md-10 col-sm-9">
                            <div class="custom-control custom-radio custom-radio-success mb-2">
                                <input type="radio" id="published" name="status" class="custom-control-input" value="1"/>
                                <label class="custom-control-label" for="published">Active</label>
                            </div>

                            <div class="custom-control custom-radio custom-radio-warning">
                                <input type="radio" id="unpublished" name="status" class="custom-control-input" checked value="2"/>
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



