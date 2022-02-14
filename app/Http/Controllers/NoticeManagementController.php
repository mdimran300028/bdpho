<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeManagementController extends Controller
{
    protected $notices;

    public function __construct(){
        $this->notices = Notice::all();
    }

    public function index(){
        return view('notice.manage',[
            'notices'=>$this->notices,
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $notice = new Notice();
            $notice->bn_title = $request->bn_title;
            $notice->bn_description = $request->bn_description;
            $notice->en_title = $request->en_title;
            $notice->en_description = $request->en_description;
            $notice->bn_status = 2;
            $notice->en_status = 2;
            $notice->status = 2;
            $notice->save();
            return redirect('/notice')->with('success','Notice added successfully');
        }else{
            return back();
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $notice = Notice::find($request->id);
            $notice->bn_title = $request->bn_title;
            $notice->bn_description = $request->bn_description;
            $notice->en_title = $request->en_title;
            $notice->en_description = $request->en_description;
            $notice->save();
            return redirect('/notice')->with('success','Notice updated successfully');
        }
    }

    public function delete($id){
        $notice = Notice::find($id);
        $notice->status = 3;
        $notice->save();

        return redirect('/notice')->with('success','Notice deleted successfully');
    }

    public function updateStatus($id){
        $notice = Notice::find($id);
        $notice->status == 1 ? $notice->status = 2 : $notice->status = 1;
        $notice->save();
        return redirect('/notice')->with('success',"Notice status updated");
    }
}
