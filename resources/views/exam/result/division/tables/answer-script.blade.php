@extends('master')
@section('title') Answer Script @endsection
@section('page-title') Answer Script @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Answer Script  @endsection

@section('content')
    <div class="row p-2">
        <div class="col-sm-12 bg-white p-2 p-md-3 pt-3 border border-secondary rounded">
            <div class="question-header" style="font-family: Rockwell">
                <h3 class="text-center">{{$qp->event->name}}</h3>
                <h5 class="text-center">Category-{{$qp->category->code}}: {{ $qp->title }}</h5>
                <div class="row">
                    <div class="col-md-4 col-sm-12">Exam Date: {{$qp->exam_start_time}}</div>
                    <div class="col-md-4 col-sm-12 text-md-center">Duration: {{$qp->duration}} Minutes</div>
                    <div class="col-md-4 col-sm-12 text-md-end text-right">Mark: {{ $answers->sum('mark') }} / {{$qp->mark}}</div>
                </div>
                <div class="row fw-bold">
                    <div class="col-md-4 col-sm-12 text-md-left text-sm-center">Name: {{$participant->name}}</div>
                    <div class="col-md-4 col-sm-12 text-center">Registration No: {{$participant->reg_no}}</div>
                    <div class="col-md-4 col-sm-12 text-md-right text-sm-left">Mobile: {{$participant->mobile}}</div>
                </div>
                <hr>
                <div class="question-body text-start table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        @foreach($answers as $answer)
                        <tr class="question-item">
                            <td style="width: 50px">Q.{{ $loop->iteration }}<br>
                                @if(Auth::user()->role=='s_admin')
                                    <a onclick="return confirm('If you want to delete this item, press OK')" class="btn btn-sm btn-danger btn-block" href="{{ route('answer-delete',['id'=>$answer->id]) }}"><i class="fa fa-trash-alt"></i></a>
                                @endif
                            </td>
                            <td>
                                <div class="question-description" style="text-align: justify">
                                    {!! $answer->question->description !!}
                                </div>
                                @foreach($answer->question->options as $option)
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input {{ $answer->student_answer_id == $option->id ? 'checked':'' }} type="radio" aria-label="Radio button for following text input">
                                            </div>
                                        </div>
                                        <div class="form-control option {{ $answer->question->answer_id == $option->id ? 'text-primary':'' }}">
                                            {!! $option->content !!}
                                        </div>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
{{--                        <tr>--}}
{{--                            <td colspan="2"><button @click="finishExam" class="btn btn-sm btn-success w-100">Finish Exam</button></td>--}}
{{--                        </tr>--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
{{--    @include('exam.result.division.includes.script')--}}
@endsection


