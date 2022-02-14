<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    public $files;

    public function __construct(){
        $this->files = File::all();
    }

    public function index(){
        return view('file-manager.manage',[
            'files'=>$this->files,
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $file = new File();
            $file->title = $request->title;
            $file->url = fileUpload($request->file('file'),'file-manager');
            $file->save();
            return redirect('/file-manager')->with('success','File uploaded  successfully');
        }else{
            return back();
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $file = File::find($request->id);
            $file->title = $request->title;

            if (isset($request->file)){
                if (file_exists($file->url)){unlink($file->url);}
                $file->url = fileUpload($request->file('file'),'past-paper');
            }
            $file->save();
            return redirect('/file-manager')->with('success','File updated successfully');
        }
    }

    public function delete($id){
        $file = File::find($id);
        $file->delete();
        return redirect('/file-manager')->with('success','File deleted successfully');
    }

    public function updateStatus($id){
        $file = File::find($id);
        $file->status == 1 ? $file->status = 2 : $file->status = 1;
        $file->save();
        return redirect('/file-manager')->with('success',"File status updated");
    }
}
