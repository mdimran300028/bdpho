<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerManagementController extends Controller
{
    public $partners;

    public function __construct(){
        $this->partners = Partner::all();
    }

    public function index(){
        return view('partners.manage',[
            'partners'=>$this->partners,
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $partner = new Partner();
            $partner->name = $request->name;
            $partner->title = $request->title;
            $partner->short_description = $request->short_description;
            $partner->long_description = $request->long_description;
            $partner->logo = fileUpload($request->file('logo'),'partner');
            $partner->status = 2;
            $partner->save();
            return redirect('/partner')->with('success','Partner information added successfully');
        }else{
            return back();
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $partner = Partner::find($request->id);
            $partner->name = $request->name;
            $partner->title = $request->title;
            $partner->short_description = $request->short_description;
            $partner->long_description = $request->long_description;
            if (isset($request->logo)){
                if (file_exists($partner->logo)){unlink($partner->logo);}
                $partner->logo = fileUpload($request->file('logo'),'partner');
            }
            $partner->save();
            return redirect('/partner')->with('success','Partner information updated successfully');
        }
    }

    public function delete($id){
        $partner = Partner::find($id);
        $partner->status = 3;
        $partner->save();

        return redirect('/partner')->with('success','Partner deleted successfully');
    }

    public function updateStatus($id){
        $partner = Partner::find($id);
        $partner->status == 1 ? $partner->status = 2 : $partner->status = 1;
        $partner->save();
        return redirect('/partner')->with('success',"Partner status updated");
    }
}
