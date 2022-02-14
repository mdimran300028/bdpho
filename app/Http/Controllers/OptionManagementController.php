<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class OptionManagementController extends Controller
{
    public function __construct(){

    }

    public function index($id){
        return view('exam.question.manage',[
            'questionPaper'=>QuestionPaper::find($id),
            'questions'=>Question::where(['question_paper_id'=>$id])->get()
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $option = new Option();
            $option->question_id = $request->question_id;
            $option->content = $request->option;
            $option->save();
            $question = Question::find($request->question_id);
            $answerId = $question->answer_id;
            if (isset($request->is_answer)){
                $question->answer_id = $option->id;
                $question->save();
                $answerId =  $option->id;
            }
            return view('exam.options.tables.list',[
                'options'=>Option::where('question_id',$request->question_id)->get(),
                'question'=>$question,
                'answerId'=>$answerId
            ]);
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $option = Option::find($request->id);
            $option->content = $request->option;
            $option->save();
            $question = Question::find($request->question_id);
            $answerId = $question->answer_id;
            if (isset($request->is_answer)){
                $question->answer_id = $option->id;
                $question->save();
                $answerId =  $option->id;
            }

            return view('exam.options.tables.list',[
                'options'=>Option::where('question_id',$request->question_id)->get(),
                'question'=>$question,
                'answerId'=>$answerId
            ]);
        }
    }

    public function delete($id){
        $question = Question::find($id);
        $question->status = 3;
        $question->save();
        return redirect('/question')->with('success','Question deleted successfully');
    }

    public function updateStatus($id){
        $question = Question::find($id);
        if ($question->status==2){$question->status = 1;}
        else{$question->status = 2;}
        $question->save();
        return redirect('/question')->with('success',"Question status updated successfully");
    }
}
