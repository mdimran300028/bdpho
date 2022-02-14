<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ siteInfo('short_title') }} Question Paper List <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New</button></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Sl.</th>
                            <th>Title</th>
                            <th>Event</th>
                            <th>Round</th>
                            <th>Category</th>
{{--                            <th>Type</th>--}}
                            <th>Mark</th>
                            <th>Duration</th>
{{--                            <th>Remind</th>--}}
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questionPapers as $questionPaper)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $questionPaper->title }}</td>
                            <td>{{ $questionPaper->event->code }}</td>
                            <td>{{ $questionPaper->round->name }}</td>
                            <td>{{ $questionPaper->category->name }}</td>
{{--                            <td>{{ $questionPaper->question_type==1 ? 'MCQ' : 'Written' }}</td>--}}
                            <td>{{ $questionPaper->mark }}</td>
                            <td>{{ $questionPaper->duration }} Min</td>
                            <td>{{ $questionPaper->exam_start_time }}</td>
                            <td>{{ $questionPaper->exam_end_time }}</td>
{{--                            <td>Before {{ $questionPaper->remind_time }} Min</td>--}}
                            <td>
                                <span class="badge badge-pill badge-soft-{{ $questionPaper->status==1?'success':'warning' }} font-size-12">{{ $questionPaper->status==1?'Published':'Unpublished' }} </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('questions',['id'=>$questionPaper->id]) }}" class="btn btn-secondary btn-sm waves-effect waves-light" title="View full question paper">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <!-- Button trigger modal -->
                                <button onclick="edit(JSON.parse('{{ $questionPaper }}'))" class="btn btn-info btn-sm waves-effect waves-light">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <a href="{{ route('update-question-paper-status',['id'=>$questionPaper->id]) }}" class="btn btn-{{ $questionPaper->status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                    <i class="fa fa-arrow-{{ $questionPaper->status==1?'up':'down' }}"></i>
                                </a>

                                <a href="{{ route('question-paper-delete',['id'=>$questionPaper->id]) }}" onclick="return confirm('If you really want to delete, press OK')" class="btn btn-danger btn-sm waves-effect waves-light" >
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
