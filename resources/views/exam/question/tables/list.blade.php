<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">
                    {{ $questionPaper->event->code }} {{ $questionPaper->round->name }} Question Paper, {{ $questionPaper->category->name }}, {{ $questionPaper->title }}
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add New Question</button>
                    <a href="{{ route('question-paper') }}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
                </h4>
                <div class="table-responsive">
                    <table class="table table-centered mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-center">Sl.</th>
                            <th>Question</th>
                            <th class="text-center" style="width: 120px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $question)
                        <tr>
                            <td class="text-center" style="vertical-align: top !important; width: 50px">{{ $loop->iteration }}</td>
                            <td style="vertical-align: top !important;" id="question-{{ $question->id }}">
                                <a class="text-justify text-dark" href="#" onclick="event.preventDefault(); edit({{ $question }})">{!! $question->description !!}</a>
                                <ol id="options-{{ $question->id }}">
                                    @foreach($question->options as $option)
                                        <li class="{{ $question->answer_id == $option->id? 'text-primary font-weight-bold':'text-dark' }}">
                                            <a href="#" class="{{ $question->answer_id == $option->id? 'text-primary font-weight-bold':'text-dark' }}"
                                                onclick="event.preventDefault(), optionEdit({
                                                option:JSON.stringify({{ $option }}),
                                                optionId:Number({{ $option->id }}),
                                                answerId:Number({{ $question->answer_id }}),
                                                })">{!! $option->content !!}
                                            </a>
                                        </li>
                                    @endforeach
                                </ol>
                            </td>
                            <td class="text-center" style="vertical-align: top !important;">
                                <button class="btn btn-sm btn-block btn-primary" onclick="optionAdd({questionId:'{{ $question->id }}'})">Add Option</button>
                                <a href="{{ route('update-question-status',['id'=>$question->id]) }}" class="btn btn-block btn-{{ $question->status==1?'success':'warning' }} btn-sm waves-effect waves-light" >
                                    {{ $question->status==1?'Published':'Unpublished' }}
                                </a>
                                <a onclick="return confirm('If you want to delete this question, press OK')" href="{{ route('question-delete',['id'=>$question->id]) }}" class="btn btn-sm btn-danger btn-block">Delete</a>
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

<script>

</script>
