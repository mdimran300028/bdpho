<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Region;
use App\Models\RegionDistrict;
use Illuminate\Http\Request;

class RegionManagementController extends Controller
{
    protected $divisions,$regions;

    public function __construct(){
        $this->regions = Region::where('status','!=',3)->get();
        $this->divisions = Division::where('status','!=',3)->get();
    }

    public function index(){
        return view('region.manage',[
            'regions'=>$this->regions,
            'divisions'=>$this->divisions
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $region = Region::whereRaw( 'LOWER(`name`) LIKE ?', [ $request->name ] )->first();
            if (!isset($region)){
                $region = new Region();
                $region->name = $request->name;
                $region->code = $request->code;
                $region->status = $request->status;
                $region->save();

                $regionId = $region->id;

                $districtError = $this->regionDistrictSave($request,$regionId);

//                foreach ($request->districts as $districtId){
//                    $regionDistrict = RegionDistrict::where('district_id','=',$districtId)->first();
//                    if (!isset($regionDistrict)){
//                        $regionDistrict = new RegionDistrict();
//                        $regionDistrict->region_id = $regionId;
//                        $regionDistrict->district_id = $districtId;
//                        $regionDistrict->save();
//                    }else{
//                        $districtError ++;
//                    }
//                }
                if ($districtError==0){
                    return redirect('/region')->with('success','Region added successfully');
                }else{
                    return redirect('/region')->with('info','Region added successfully. But '.$districtError.' district already included into another region was skipped. Please check !!');
                }
            }else{
                return redirect('/region')->with('info','Region already exist in the database');
            }
        }else{
            return back();
        }
    }

    public function regionDistrictSave($request, $regionId){
        $districtError = 0;

        foreach ($request->districts as $districtId){
            $regionDistrict = RegionDistrict::where('district_id','=',$districtId)->first();
            if (!isset($regionDistrict)){
                $regionDistrict = new RegionDistrict();
                $regionDistrict->region_id = $regionId;
                $regionDistrict->district_id = $districtId;
                $regionDistrict->save();
            }else{
                $districtError ++;
            }
        }
        return $districtError;
    }

    public function update(Request $request){
        if ($request->post()){
            $region = Region::find($request->id);
            $region->name = $request->name;
            $region->code = $request->code;
            $region->status = $request->status;
            $region->save();

            if (count($request->districts)>0){
                $regionDistricts = RegionDistrict::where('region_id','=',$region->id)->get();
                foreach ($regionDistricts as $district){
                    $district->delete();
                }
                $districtError = $this->regionDistrictSave($request,$region->id);
                if ($districtError==0){
                    return redirect('/region')->with('success','Region updated successfully');
                }else{
                    return redirect('/region')->with('info','Region updated successfully. But '.$districtError.' district already included into another region was skipped. Please check !!');
                }
            }else{
                return redirect('/region')->with('success','Region info updated successfully');
            }
        }
    }

    public function delete($id){
        $region = Region::find($id);
        $region->status = 3;
        $region->save();

        $regionDistricts = RegionDistrict::where('region_id','=',$id)->get();
        foreach ($regionDistricts as $district){
            $district->delete();
        }

        return redirect('/region')->with('success','Region info deleted successfully');
    }

    public function updateStatus($id){
        $region = Region::find($id);
        $region->status == 1 ? $region->status = 2 : $region->status = 1;
        $region->save();
        return redirect('/region')->with('success',"Region $region->name status updated successfully");
    }
}
