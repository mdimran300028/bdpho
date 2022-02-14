<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderManagementController extends Controller
{
    public $sliders;

    public function __construct(){
        $this->sliders = Slider::all();
    }

    public function index(){
        return view('sliders.manage',[
            'sliders'=>$this->sliders,
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $slider = new Slider();
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slider->file = fileUpload($request->file('file'),'slider');
            $slider->status = 2;
            $slider->save();
            return redirect('/slider')->with('success','Slide added successfully');
        }else{
            return back();
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $slider = Slider::find($request->id);
            $slider->title = $request->title;
            $slider->description = $request->description;
            if (isset($request->file)){
                if (file_exists($slider->file)){unlink($slider->file);}
                $slider->file = fileUpload($request->file('file'),'slider');
            }
            $slider->save();
            return redirect('/slider')->with('success','Slider updated successfully');
        }
    }

    public function delete($id){
        $slider = Slider::find($id);
        $slider->status = 3;
        $slider->save();

        return redirect('/slider')->with('success','Slider deleted successfully');
    }

    public function updateStatus($id){
        $slider = Slider::find($id);
        $slider->status == 1 ? $slider->status = 2 : $slider->status = 1;
        $slider->save();
        return redirect('/slider')->with('success',"Slider status updated");
    }
}
