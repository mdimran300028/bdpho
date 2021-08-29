<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionManagementController extends Controller
{
    public $regions;

    public function __construct(){
        $this->regions = Region::all();
    }

    public function index(){
        return view('region.manage');
    }

    public function store(Request $request){
        if ($request->post()){
            return $request->all();
        }else{
            return back();
        }
    }
}
