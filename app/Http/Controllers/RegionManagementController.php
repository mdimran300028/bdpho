<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionManagementController extends Controller
{
    protected $divisions,$regions;

    public function __construct(){
        $this->regions = Region::all();
        $this->divisions = Division::all();
    }

    public function index(){
        return view('region.manage',[
            'regions'=>$this->regions,
            'divisions'=>$this->divisions
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            return $request->all();
        }else{
            return back();
        }
    }
}
