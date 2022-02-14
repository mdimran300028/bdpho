<?php

namespace App\Http\Controllers;

use App\Models\PastPaper;
use Illuminate\Http\Request;

class PastPaperManagementController extends Controller
{
    protected $papers;

    public function __construct(){
        $this->papers = PastPaper::all();
    }

    public function index(){
        return view('past-paper.manage',[
            'papers'=>$this->papers,
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $paper = new PastPaper();
            $paper->event_id = $request->event_id;
            $paper->round_id = $request->round_id;
            $paper->category_id = $request->category_id;
            $paper->title = $request->title;
            $paper->file_url = zipFileUpload($request->file('file'),'past-paper');
            $paper->status = 2;
            $paper->save();
            return redirect('/past-paper')->with('success','Paper added successfully');
        }else{
            return back();
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $paper = PastPaper::find($request->id);
            $paper->event_id = $request->event_id;
            $paper->round_id = $request->round_id;
            $paper->category_id = $request->category_id;
            $paper->title = $request->title;

            if (isset($request->file)){
                if (file_exists($paper->file_url)){unlink($paper->file_url);}
                $paper->file_url = zipFileUpload($request->file('file'),'past-paper');
            }
            $paper->save();
            return redirect('/past-paper')->with('success','Paper updated successfully');
        }
    }

    public function delete($id){
        $paper = PastPaper::find($id);
        $paper->status = 3;
        $paper->save();

        return redirect('/past-paper')->with('success','Paper deleted successfully');
    }

    public function updateStatus($id){
        $paper = PastPaper::find($id);
        $paper->status == 1 ? $paper->status = 2 : $paper->status = 1;
        $paper->save();
        return redirect('/past-paper')->with('success',"Paper status updated");
    }
}
