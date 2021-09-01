<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use Auth;

class DivisionManagementController extends Controller
{
    protected $divisions;

    public function __construct(){
        $this->divisions = Division::where('status','!=',3)->get();
    }

    public function index(){
        return view('division.manage',[
            'divisions'=>$this->divisions
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $division = Division::whereRaw( 'LOWER(`name`) LIKE ?', [ $request->name ] )->first();

            if (!isset($division)){
                $division = new Division();
                $division->name = $request->name;
                $division->code = $request->code;
                $division->status = $request->status;
                $division->save();

                return redirect('/division')->with('success','Division added successfully');
            }else{
                return redirect('/division')->with('info','Division already exist in the database');
            }
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $division = Division::find($request->id);
            $division->name = $request->name;
            $division->code = $request->code;
            $division->status = $request->status;
            $division->save();

            return redirect('/division')->with('success','Division info updated successfully');
        }
    }

    public function delete($id){
        $division = Division::find($id);
        $division->status = 3;
        $division->save();
        return redirect('/division')->with('success','Division info deleted successfully');
    }

    public function updateStatus($id){
        $division = Division::find($id);
        $division->status == 1 ? $division->status = 2 : $division->status = 1;
        $division->save();
        return redirect('/division')->with('success',"$division->name division status updated successfully");
    }
}
