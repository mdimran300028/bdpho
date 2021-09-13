<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class DistrictManagementController extends Controller
{
    protected $divisions,$districts;

    public function __construct(){
        $this->divisions = Division::where('status','!=',3)->get();
        $this->districts = District::where('status','!=',3)->get();
    }

    public function index(){
        return view('district.manage',[
            'districts'=>$this->districts,
            'divisions'=>$this->divisions
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $district = District::whereRaw( 'LOWER(`name`) LIKE ?', [ $request->name ] )->first();

            if (!isset($district)){
                $district = new District();
                $district->division_id = $request->division_id;
                $district->name = $request->name;
                $district->code = $request->code;
                $district->status = $request->status;
                $district->save();

                return redirect('/district')->with('success','District added successfully');
            }else{
                return redirect('/district')->with('info','District already exist in the database');
            }
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $district = District::find($request->id);
            $district->division_id = $request->division_id;
            $district->name = $request->name;
            $district->code = $request->code;
            $district->status = $request->status;
            $district->save();

            return redirect('/district')->with('success','District info updated successfully');
        }
    }

    public function delete($id){
        $district = District::find($id);
        $district->status = 3;
        $district->save();
        return redirect('/district')->with('success','District info deleted successfully');
    }

    public function updateStatus($id){
        $district = District::find($id);
        $district->status == 1 ? $district->status = 2 : $district->status = 1;
        $district->save();
        return redirect('/district')->with('success',"$district->name District status updated successfully");
    }
}
