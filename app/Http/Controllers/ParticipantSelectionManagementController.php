<?php

namespace App\Http\Controllers;

use App\Models\AnswerScript;
use App\Models\Participant;
use App\Models\QuestionPaper;
use App\Models\Round;
use App\Models\SelectedParticipant;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\App;

class ParticipantSelectionManagementController extends Controller
{
    public function index(){
        return view('exam.participant-selection.division.manage');
    }

    public function divisionWiseResultForSelection(Request $request){
        $participants = AnswerScript::with(['answers','participant'])
            ->where(['question_paper_id'=>$request->question_paper_id])->get();

        $results = [];
        foreach ($participants as $key => $participant){
            if ($request->division_id== 'all'){
                if ($participant->participant->category_id == $request->category_id){
                    $mark = $participant->answers->sum('mark');
                    if ($mark >= $request->threshold){
                        $results[$key]['info'] = $participant;
                        $results[$key]['mark'] = $mark;
                    }
                }
            }else{
                if ($participant->participant->division_id == $request->division_id and $participant->participant->category_id == $request->category_id){
                    $mark = $participant->answers->sum('mark');
                    if ($mark >= $request->threshold){
                        $results[$key]['info'] = $participant;
                        $results[$key]['mark'] = $mark;
                    }
                }
            }
        }
        //Sorting
        $arr  = $results;
        if (count($arr)>0){
            $sort = array();
            foreach($arr as $k=>$v) {$sort['mark'][$k] = $v['mark'];}
            array_multisort($sort['mark'], SORT_DESC, $arr);
        }
        return view('exam.participant-selection.division.tables.list',[
            'participants'=>$arr,
            'total'=>count($results),
        ]);
    }

    public function selectForTheNextRound(Request $request){
        $questionPaper = QuestionPaper::find($request->question_paper_id);
        $nextRoundId = Round::where('status',1)->first()->id;
        $participants = $request->participants;
        if (isset($participants)){
            $selectedParticipants = SelectedParticipant::where([
                'event_id'=>$questionPaper->event_id,
                'selected_round_id'=>$questionPaper->round_id,
                'division_id'=>$request->division_id,
                'category_id'=>$request->category_id,
            ])->get();

            if (count($selectedParticipants)>0){
                foreach ($selectedParticipants as $selectedParticipant){$selectedParticipant->delete();}
            }

            foreach ($participants as $participantId => $mark){
                $data = new SelectedParticipant();
                $data->event_id = $questionPaper->event_id;
                $data->division_id = $request->division_id;
                $data->category_id = $request->category_id;
                $data->selected_round_id = $questionPaper->round_id;
                $data->next_round_id = $nextRoundId;
                $data->participant_id = $participantId;
                $data->obtain_mark = $mark;
                $data->save();
            }
            return back()->with('success','Participant Selection Successful.');
        }else{
            return back()->with('error','No participant was selected !!!');
        }
    }

    public function selectedParticipant(){
        return view('exam.selected-participant.division.manage');
    }

    public function selectedParticipantList(Request $request){
        if ($request->division_id=='all'){
            $participants = SelectedParticipant::with('participantInfo')->where([
                'event_id'=>runningEventId(),
                'selected_round_id'=>$request->round_id,
                'category_id'=>$request->category_id,
            ])->get()->sortByDesc('obtain_mark');
        }else{
            $participants = SelectedParticipant::with('participantInfo')->where([
                'event_id'=>runningEventId(),
                'selected_round_id'=>$request->round_id,
                'category_id'=>$request->category_id,
                'division_id'=>$request->division_id
            ])->get()->sortByDesc('obtain_mark');
        }

        return view('exam.selected-participant.division.tables.list',[
            'participants'=>$participants,
            'total'=>count($participants),
        ]);
    }

    public function selectedParticipantDownload(Request $request){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }
}
