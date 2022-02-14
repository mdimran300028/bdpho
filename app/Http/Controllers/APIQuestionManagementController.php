<?php

namespace App\Http\Controllers;

use App\Models\AnswerScript;
use App\Models\BdPhO;
use App\Models\Category;
use App\Models\Participant;
use App\Models\QuestionPaper;
use App\Models\Round;
use App\Models\StudentAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class APIQuestionManagementController extends Controller
{
    public function getQuestionPaper(Request $request){
        $participant = Participant::find($request->id);
        if (isset($participant)){
            $questionPaper = QuestionPaper::where([
                'event_id'=>runningEventId(),
                'category_id'=>$request->category_id,
                'status'=>1
            ])->first();
            if (isset($questionPaper)){
                $answerScript = AnswerScript::where([
                    'question_paper_id'=>$questionPaper->id,
                    'student_id'=>$participant->id
                ])->first();
                if (isset($answerScript)){
                    if ($answerScript->status>1){
                        return response()->json(['status'=>false,]);
                    }
                }
                return response()->json(['status'=>true, 'qp'=>$questionPaper]);
            }else{
                return response()->json(['status'=>false,]);
            }
        }else{
            return response()->json(['status'=>false,]);
        }
    }

    public function getQuestion($id){
        $qp = QuestionPaper::find($id);
        return $qp->questions;
    }

    //Participant Exam Routes
    public function startExam(Request $request){
        $result = [];
        $questionPaper = QuestionPaper::where([
            'event_id'=>runningEventId(), 'category_id'=>$request->category_id, 'status'=>1
        ])->first();

        if (Carbon::now() < Carbon::parse($questionPaper->exam_start_time)){
            $result = ['status'=>false];
            return response()->json($result);
        }

        $participant = Participant::where(['reg_no'=>$request->reg_no, 'mobile'=>$request->mobile])->first();
        if (isset($participant)){   //Participant Found
            if (isset($questionPaper) and $this->checkTime($questionPaper->exam_start_time,$questionPaper->duration)){  //Question Paper Checked
                $answerScript = AnswerScript::where([
                    'question_paper_id'=>$questionPaper->id, 'student_id'=>$participant->id
                ])->first();

                if (!isset($answerScript)){ //Answer Script Not found
                    //Start new exam
                    $result = $this->getDetailQuestionPaper($questionPaper->id,$participant->id,null);
                }else{  //Answer Script Found
                    if ($answerScript->status==1){  //Answer Script Not Submitted
                        if ($this->checkTime($answerScript->start_time,$questionPaper->duration)){  //Remaining Time Checked
                            $result = $this->getDetailQuestionPaper($questionPaper->id,$participant->id,$answerScript->id);
                        }else { //Time Over
                            $answerScript->status = 2;  $answerScript->save();  $result = ['status'=>false,];
                        }
                    }
                }
            }
            elseif (isset($questionPaper) and !$this->checkTime($questionPaper->exam_start_time,$questionPaper->duration)){
                $answerScript = AnswerScript::where([
                    'question_paper_id'=>$questionPaper->id, 'student_id'=>$participant->id
                ])->first();

                if (isset($answerScript) and $answerScript->status==1){ //Answer Script Found And Not Submitted
                    if ($this->checkTime($answerScript->start_time,$questionPaper->duration)){  //Time Checked
                        $result = $this->getDetailQuestionPaper($questionPaper->id,$participant->id,$answerScript->id);
                    }else { //Time Over
                        $answerScript->status = 2;  $answerScript->save();  $result = ['status'=>false,];
                    }
                }elseif (isset($answerScript) and $answerScript->status!=1){    //Answer Script Found And Submitted
                    $result = ['status'=>false,];
                }
            }
        }
        return response()->json($result);
    }

    public function getDetailQuestionPaper($questionPaperId,$participantId,$answerScriptId=null){
        $questionPaper = QuestionPaper::find($questionPaperId);
        $questionPaper->event_title = BdPhO::find(runningEventId())->name;
        if ($answerScriptId == null){
            $answerScript = new AnswerScript();
            $answerScript->student_id = $participantId;
            $answerScript->question_paper_id = $questionPaperId;
            $answerScript->start_time =  Carbon::now()->format("Y-m-d H:i:s");
            $answerScript->end_time =  Carbon::now()->addMinutes($questionPaper->duration)->format("Y-m-d H:i:s");
            $answerScript->status = 1;
            $answerScript->save();
            $questions = QuestionPaper::find($questionPaperId)->studentQuestions;
            foreach ($questions as $question){
                $question->studentOptions;
                $question->student_answer_id = null;
                $question->answer_script_id = $answerScript->id;
            }
        }else{
            $answerScript = AnswerScript::find($answerScriptId);
            $questions = QuestionPaper::find($questionPaperId)->studentQuestions;
            foreach ($questions as $question){
                $question->studentOptions;
                $question->student_answer_id = $this->studentAnswer($answerScriptId,$question->id);;
                $question->answer_script_id = $answerScriptId;
            }
        }
        $result = [
            'status'=>true,
            'questionPaper'=>$questionPaper,
            'answerScript'=>$answerScript,
            'questions'=>$questions
        ];

        return $result;
    }

    public function checkTime($startTime,$duration){
        $endTime = Carbon::parse($startTime)->addMinutes($duration)->format("Y-m-d H:i:s");
        $currentTime = Carbon::now()->format("Y-m-d H:i:s");
        if ($endTime > $currentTime){
            return true;
        }else{
            return false;
        }
    }

    public function studentAnswer($answerScriptId,$questionId){
        $answer = StudentAnswer::where(['answer_script_id'=>$answerScriptId,'question_id'=>$questionId])->first();
        $optionId = null;
        if (isset($answer)){$optionId = $answer->student_answer_id;}
        return $optionId;
    }

    public function putAnswer(Request $request){
        $answer = StudentAnswer::where([
            'answer_script_id'=>$request->answer_script_id,
            'question_id'=>$request->question_id,
        ])->first();
        if (!isset($answer)){
            $answer = new StudentAnswer();
            $answer->answer_script_id = $request->answer_script_id;
            $answer->question_id = $request->question_id;
            $answer->student_answer_id = $request->option_id;
            $answer->answer_id = $request->answer_id;
            if ($request->answer_id == $request->option_id){
                $answer->mark = 1;
            }
            $answer->save();
        }else{
            $answer->student_answer_id = $request->option_id;
            $answer->answer_id = $request->answer_id;
            if ($request->answer_id == $request->option_id){
                $answer->mark = 1;
            }else{
                $answer->mark = 0;
            }
            $answer->save();
        }
        return response()->json(['status'=>'Success']);
    }

    public function finishExam(Request $request){
//        for ($i=0; $i<count($request->answers); $i++){
//            if ($request->answers[$i]['option_id']==''){
//                //
//            }else{
//                $data = StudentAnswer::where([
//                    'answer_script_id'=>$request->answers[$i]['answer_script_id'],
//                    'question_id'=>$request->answers[$i]['question_id'],
//                ])->first();
//
//                if (!isset($data)){
//                    $data = new StudentAnswer();
//                    $data->answer_script_id = $request->answers[$i]['answer_script_id'];
//                    $data->question_id = $request->answers[$i]['question_id'];
//                    $data->student_answer_id = $request->answers[$i]['option_id'];
//                    $data->answer_id = $request->answers[$i]['answer_id'];
//                    if ($request->answers[$i]['answer_id'] == $request->answers[$i]['option_id']){
//                        $data->mark = 1;
//                    }
//                    $data->save();
//                }else{
//                    $data->student_answer_id = $request->answers[$i]['option_id'];
//                    $data->answer_id = $request->answers[$i]['answer_id'];
//                    if ($request->answers[$i]['answer_id'] == $request->answers[$i]['option_id']){
//                        $data->mark = 1;
//                    }
//                    $data->save();
//                }
//            }
//        }

//        return 'success';

        $script = AnswerScript::find($request->answer_script_id);
        $script->status = 2;
        $script->save();
        return response()->json([
            'message'=>'Successfully Submitted',
            'status'=>'Success'
        ]);
    }

    public function getStudentAnswers(Request $request){
        return $request->all();
    }
}
