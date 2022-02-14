<?php

namespace App\Http\Controllers;

use App\Models\BdPhO;
use Illuminate\Http\Request;

class BdPhOManagementController extends Controller
{
    protected $bdPhOs;

    public function __construct(){
        $this->bdPhOs = BdPhO::where('status','!=',3)->orderBy('id','desc')->get();
    }

    public function index(){
        return view('bdpho.manage',[
            'bdPhOs'=>$this->bdPhOs
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $bdPhO = BdPhO::whereRaw( 'LOWER(`name`) LIKE ?', [ $request->name ] )->first();
            if (!isset($bdPhO)){
                $bdPhO = new BdPhO();
                $bdPhO->name = $request->name;
                $bdPhO->code = $request->code;
                if (isset($request->logo)){
                    $bdPhO->logo = imageUpload($request->file('logo'),'general');
                }
                $bdPhO->registration_status = $request->registration_status;
                $bdPhO->status = $request->status;
                $bdPhO->save();
                return redirect('/bdpho')->with('success','New event added successfully');
            }else{
                return redirect('/bdpho')->with('info','Event already exist in the database');
            }
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $bdPhO = BdPhO::find($request->id);
            $bdPhO->name = $request->name;
            $bdPhO->code = $request->code;
            if (isset($request->logo)){
                if(file_exists($bdPhO->logo)){unlink($bdPhO->logo);}
                $bdPhO->logo = imageUpload($request->file('logo'),'general');
            }
            $bdPhO->registration_status = $request->registration_status;
            $bdPhO->status = $request->status;
            $bdPhO->save();

            return redirect('/bdpho')->with('success','Event info updated successfully');
        }
    }

    public function delete($id){
        $bdPhO = BdPhO::find($id);
        $bdPhO->status = 3;
        $bdPhO->save();
        return redirect('/bdpho')->with('success','Event info deleted successfully');
    }

    public function updateStatus($id){
        $bdPhO = BdPhO::find($id);
        if ($bdPhO->status==2){
            $allBdPhOs = BdPhO::where('id','!=',$id)->get();
            foreach ($allBdPhOs as $item){
                $item->status = 2; $item->registration_status = 2; $item->save();
            }
            $bdPhO->status = 1;
        }else{
            $bdPhO->status = 2;
            $bdPhO->registration_status = 2;
        }
        $bdPhO->save();
        return redirect('/bdpho')->with('success',"$bdPhO->code status updated successfully");
    }

    public function updateRegistrationStatus($id){
        $bdPhO = BdPhO::find($id);
        if ($bdPhO->status==1){
            $bdPhO->registration_status = $bdPhO->registration_status == 1 ? 2 : 1;
            $bdPhO->save();
            return redirect('/bdpho')->with('success',"$bdPhO->code registration status updated successfully");
        }else{
            return redirect('/bdpho')->with('error',"$bdPhO->code event closed. Sorry !!!");
        }
    }
}
