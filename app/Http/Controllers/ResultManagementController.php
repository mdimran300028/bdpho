<?php

namespace App\Http\Controllers;

use App\Models\AnswerScript;
use App\Models\Page;
use App\Models\Participant;
use App\Models\QuestionPaper;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use DB;

class ResultManagementController extends Controller
{
    public function divisionWiseResultForm(){
        return view('exam.result.division.manage');
    }

    public function categoryAndDivisionWiseResult(Request $request){
        $participants = DB::table('answer_scripts')
            ->join('event_participants','answer_scripts.student_id','event_participants.participant_id')
            ->select('answer_scripts.id','event_participants.reg_no')
            ->where([
                'event_participants.event_id'=>runningEventId(),
                'event_participants.division_id'=>$request->division_id,
                'event_participants.category_id'=>$request->category_id,
                'answer_scripts.question_paper_id'=>$request->question_paper_id,
            ])->get();
        foreach ($participants as $participant){
            $participantInfo = Participant::where('reg_no',$participant->reg_no)->first();
            if (isset($participantInfo)){
                $participant->name = $participantInfo->name ;
                $participant->school = $participantInfo->school;
                $participant->district = $participantInfo->district->name;
                $participant->mobile = $participantInfo->mobile;
                $participant->class_name = $participantInfo->className->name;
            }else{
                $participant->name = '' ;
                $participant->school = '';
                $participant->district = '';
                $participant->mobile = '';
                $participant->class_name = '';
            }
            $participant->mark = StudentAnswer::where('answer_script_id',$participant->id)->get('mark')->sum('mark');
        }
        $results = $participants->sortByDesc('mark');
        return view('exam.result.division.tables.list',[
            'participants'=>$results,
            'total'=>count($participants),
            'data'=>$request
        ]);
    }

    public function deleteAnswerScript(Request $request){
        $script = AnswerScript::find($request->script_id);
        $participant = Participant::find($script->student_id);
        $answers = StudentAnswer::where(['answer_script_id'=>$script->id])->get();
        foreach ($answers as $answer){$answer->delete();}
        $script->delete();
        $participant->login_status = 2;
        $participant->security_key = null;
        $participant->save();

        return $this->categoryAndDivisionWiseResult($request);
    }

    public function openScript($id){
        $answerScript = AnswerScript::find($id);
        $qp = QuestionPaper::find($answerScript->question_paper_id);
        $answers = $answerScript->answers;
        $participant = Participant::find($answerScript->student_id);
        $qp->event; $qp->round; $qp->category;

        return view('exam.result.division.tables.answer-script',[
            'qp'=>$qp,
            'participant'=>$participant,
            'answers'=>$answers
        ]);
    }

    public function answerDelete($id){
        $answer = StudentAnswer::find($id);
        $answerScriptId = $answer->answer_script_id;
        $answer->delete();
        return redirect('/open-script/'.$answerScriptId);
    }

    public function resultCorrection(){
        //First Step: Delete repeated answers
        $answers = StudentAnswer::all(['id','answer_script_id'])->groupBy('answer_script_id');
        foreach ($answers as $id => $answer){
            $studentAnswers = StudentAnswer::where('answer_script_id',$id)->get()->groupBy('question_id');
            foreach ($studentAnswers as $questionId => $studentAnswer){
                if (count($studentAnswer)>1){
                    $lastIndex = count($studentAnswer)-1;
                    for ($i=0; $i<$lastIndex; $i++){$studentAnswer[$i]->delete();}
                }
            }
        }
        //Second Step: Recheck answers
        $answers = StudentAnswer::all(['id','answer_script_id','student_answer_id','answer_id'])->groupBy('answer_script_id');
        foreach ($answers as $answer){
            if ($answer->student_answer_id == $answer->answer_id){$answer->mark = 1;}
            else{$answer->mark = null;}
            $answer->save();
        }
        return 'success';
    }

    public function getPublishedResults(){
        $page = Page::where(['name'=>'results', 'status'=>1])->first();
        if (isset($page)){$result = ['page'=>$page, 'status'=>true];}
        else{$result = ['page'=>null, 'status'=>false];}
        return response()->json($result);
    }
}
