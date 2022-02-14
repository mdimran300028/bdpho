<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionPaper;
use Illuminate\Http\Request;

class QuestionManagementController extends Controller
{
    public function __construct(){

    }

    public function index($id){
        $this->questionPaperId = $id;
        return view('exam.question.manage',[
            'questionPaper'=>QuestionPaper::find($id),
            'questions'=>Question::where(['question_paper_id'=>$id])->get()
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $question = new Question();
            $question->question_paper_id = $request->question_paper_id;
            $question->description = $request->description;
            $question->save();
            return redirect('/questions/'.$request->question_paper_id)->with('success','New question added successfully');
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $question = Question::find($request->id);
            $question->description = $request->description;
            $question->save();
            return redirect('/questions/'.$request->question_paper_id)->with('success','Question updated successfully');
        }
    }

    public function delete($id){
        $question = Question::find($id);
        $questionPaperId = $question->question_paper_id;
        foreach ($question->options as $option){$option->delete();}
        $question->delete();
        return redirect('/questions/'.$questionPaperId)->with('success','Question deleted successfully');
    }

    public function updateStatus($id){
        $question = Question::find($id);
        if ($question->status==2){$question->status = 1;}
        else{$question->status = 2;}
        $question->save();
        return redirect('/questions/'.$question->question_paper_id)->with('success',"Question status updated successfully");
    }
}
