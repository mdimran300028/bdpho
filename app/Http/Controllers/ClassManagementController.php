<?php

namespace App\Http\Controllers;

use App\Models\ClassName;
use Illuminate\Http\Request;

class ClassManagementController extends Controller
{
    protected $classes;

    public function __construct(){
        $this->classes = ClassName::where('status','!=',3)->get()->sortBy('code');
    }

    public function index(){
        return view('class.manage',[
            'classes'=>$this->classes,
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $class = ClassName::whereRaw( 'LOWER(`name`) LIKE ?', [ $request->name ] )->first();
            if (!isset($class)){
                $class = new ClassName();
                $class->name = $request->name;
                $class->code = $request->code;
                $class->status = $request->status;
                $class->save();
                return redirect('/class')->with('success','Class added successfully');
            }else{
                return redirect('/region')->with('info','Class already exist in the database');
            }
        }else{
            return back();
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $class = ClassName::find($request->id);
            $class->name = $request->name;
            $class->code = $request->code;
            $class->status = $request->status;
            $class->save();

            return redirect('/class')->with('success','Class updated successfully');
        }else{
            return back();
        }
    }

    public function delete($id){
        $class = ClassName::find($id);
        $class->status = 3;
        $class->save();

        return redirect('/class')->with('success','Class deleted successfully');
    }

    public function updateStatus($id){
        $class = ClassName::find($id);
        $class->status == 1 ? $class->status = 2 : $class->status = 1;
        $class->save();
        return redirect('/class')->with('success',"Class: $class->name status updated successfully");
    }
}
