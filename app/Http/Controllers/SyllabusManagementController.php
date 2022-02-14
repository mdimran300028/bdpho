<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Syllabus;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class SyllabusManagementController extends Controller
{
    protected $syllabuses, $categories;

    public function __construct(){
        $this->syllabuses = Syllabus::all();
        $this->categories = Category::all();
    }

    public function index(){
        return view('syllabus.manage',[
            'syllabuses'=>$this->syllabuses,
            'categories'=>$this->categories,
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $syllabus = new Syllabus();
            $syllabus->category_id = $request->category_id;
            $syllabus->file_url = fileUpload($request->file('file'),'syllabus');
            $syllabus->en_file_url = fileUpload($request->file('en_file'),'syllabus');
            $syllabus->status = 2;
            $syllabus->save();
            return redirect('/syllabus')->with('success','Syllabus added successfully');
        }else{
            return back();
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $syllabus = Syllabus::find($request->id);
            $syllabus->category_id = $request->category_id;

            if (isset($request->file)){
                if (file_exists($syllabus->file_url)){
                    unlink($syllabus->file_url);
                }
                $syllabus->file_url = fileUpload($request->file('file'),'syllabus');
            }

            if (isset($request->en_file)){
                if (file_exists($syllabus->en_file_url)){
                    unlink($syllabus->en_file_url);
                }
                $syllabus->en_file_url = fileUpload($request->file('en_file'),'syllabus');
            }
            $syllabus->save();
            return redirect('/syllabus')->with('success','Syllabus updated successfully');
        }
    }

    public function delete($id){
        $syllabus = Syllabus::find($id);
        $syllabus->status = 3;
        $syllabus->save();

        return redirect('/syllabus')->with('success','Syllabus deleted successfully');
    }

    public function updateStatus($id){
        $syllabus = Syllabus::find($id);
        $syllabus->status == 1 ? $syllabus->status = 2 : $syllabus->status = 1;
        $syllabus->save();
        return redirect('/syllabus')->with('success',"Syllabus status updated");
    }
}
