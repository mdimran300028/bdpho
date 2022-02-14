<?php

namespace App\Http\Controllers;

use App\Models\Round;
use Illuminate\Http\Request;

class RoundManagementController extends Controller
{
    public $rounds;
    public function __construct(){
        $this->rounds = Round::where('status','!=',3)->get();
    }

    public function index(){
        return view('round.manage',[
            'rounds'=>$this->rounds
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $round = Round::whereRaw( 'LOWER(`name`) LIKE ?', [ $request->name ] )->first();
            if (!isset($round)){
                $round = new Round();
                $round->name = $request->name;
                $round->status = $request->status;
                $round->save();
                return redirect('/round')->with('success','New round added successfully');
            }else{
                return redirect('/round')->with('info','Round already exist in the database');
            }
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $round = Round::find($request->id);
            $round->name = $request->name;
            $round->status = $request->status;
            $round->save();

            return redirect('/round')->with('success','Round info updated successfully');
        }
    }

    public function delete($id){
        $round = Round::find($id);
        $round->status = 3;
        $round->save();
        return redirect('/round')->with('success','Round info deleted successfully');
    }

    public function updateStatus($id){
        $round = Round::find($id);
        if ($round->status==2){
            $allRounds = Round::where('id','!=',$id)->get();
            foreach ($allRounds as $item){
                $item->status = 2; $item->save();
            }
            $round->status = 1;
        }else{
            $round->status = 2;
        }
        $round->save();
        return redirect('/round')->with('success',"Round status updated successfully");
    }
}
