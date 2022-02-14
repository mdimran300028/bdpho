<?php

namespace App\Http\Controllers;

use App\Models\QuestionImage;
use Illuminate\Http\Request;

class QuestionImageManagementController extends Controller
{
    public $images;
    public function __construct(){
        $this->images = QuestionImage::all(['id','file_url'])->sortByDesc('id');
    }

    public function index(){
        return view('exam.question-images.manage',[
            'images'=>$this->images,
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $image = new QuestionImage();
            $image->file_url = imageUpload($request->file('image'),'question_images');
            $image->save();

            return redirect('/question-images')->with('success','Uploaded Successfully');
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $question = Option::find($request->id);
            $question->content = $request->option;
            $question->save();

            return view('exam.options.tables.list',[
                'options'=>Option::where('question_id',$request->question_id)->get()
            ]);
        }
    }

    public function delete($id){
        $question = Question::find($id);
        $question->status = 3;
        $question->save();
        return redirect('/question')->with('success','Question deleted successfully');
    }
}
