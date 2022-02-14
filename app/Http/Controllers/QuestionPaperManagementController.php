<?php

namespace App\Http\Controllers;

use App\Models\QuestionPaper;
use Illuminate\Http\Request;

class QuestionPaperManagementController extends Controller
{
    public $questionPapers;
    public function __construct(){
        $this->questionPapers = QuestionPaper::all()->sortByDesc('event_id');
    }

    public function index(){
        return view('exam.question-paper.manage',[
            'questionPapers'=>$this->questionPapers
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $questionPaper = QuestionPaper::where([
                'event_id'=>$request->event_id,
                'round_id'=>$request->round_id,
                'category_id'=>$request->category_id,
                'title'=>$request->title
            ])->first();

            if (!isset($questionPaper)){
                $questionPaper = new QuestionPaper();
                $questionPaper->event_id = $request->event_id;
                $questionPaper->round_id = $request->round_id;
                $questionPaper->category_id = $request->category_id;
                $questionPaper->question_type = $request->question_type;
                $questionPaper->title = $request->title;
                $questionPaper->mark = $request->mark;
                $questionPaper->exam_start_time = $request->exam_start_time;
                $questionPaper->exam_end_time = $request->exam_end_time;
                $questionPaper->duration = $request->duration;
                $questionPaper->remind_time = $request->remind_time;
                $questionPaper->remind_message = $request->remind_message;
                $questionPaper->status = $request->status;
                $questionPaper->save();
                return redirect('/question-paper')->with('success','New question paper added successfully');
            }else{
                return redirect('/question-paper')->with('info','Question paper already exist in the database');
            }
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $questionPaper = QuestionPaper::find($request->id);
            $questionPaper->event_id = $request->event_id;
            $questionPaper->round_id = $request->round_id;
            $questionPaper->category_id = $request->category_id;
            $questionPaper->question_type = $request->question_type;
            $questionPaper->title = $request->title;
            $questionPaper->mark = $request->mark;
            $questionPaper->exam_start_time = $request->exam_start_time;
            $questionPaper->exam_end_time = $request->exam_end_time;
            $questionPaper->duration = $request->duration;
            $questionPaper->remind_time = $request->remind_time;
            $questionPaper->remind_message = $request->remind_message;
            $questionPaper->status = $request->status;
            $questionPaper->save();

            return redirect('/question-paper')->with('success',"Question paper info updated successfully");
        }
    }

    public function delete($id){
        $questionPaper = QuestionPaper::find($id);
        $questionPaper->status = 3;
        $questionPaper->save();
        return redirect('/question-paper')->with('success','Question paper deleted successfully');
    }

    public function updateStatus($id){
        $questionPaper = QuestionPaper::find($id);
        if ($questionPaper->status==2){$questionPaper->status = 1;}
        else{$questionPaper->status = 2;}
        $questionPaper->save();
        return redirect('/question-paper')->with('success',"Question paper status updated successfully");
    }

    public function fullQuestionPaper($id){
        return view('exam.question.manage',[
            'questionPaper'=>QuestionPaper::find($id)
        ]);
    }
}
