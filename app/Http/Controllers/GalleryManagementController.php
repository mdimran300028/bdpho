<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Organizer;
use Illuminate\Http\Request;

class GalleryManagementController extends Controller
{
    public $images, $videos;

    public function __construct(){
        $this->images = Gallery::where(['type'=>'image'])->get()->sortByDesc('id');
        $this->videos = Gallery::where(['type'=>'video'])->get()->sortByDesc('id');
    }

    public function index(){
        return view('gallery.manage',[
            'images'=>$this->images,
            'videos'=>$this->videos,
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $item = new Gallery();
            $item->type = $request->type;
            $item->title = $request->title;
            $item->description = $request->description;
            if ($request->type=='image'){
                $item->source = fileUpload($request->file('source'),'gallery');
            }elseif($request->type=='video'){
                $item->source = $request->source;
                $item->thumbnail = fileUpload($request->file('thumbnail'),'gallery');
            }
            $item->status = 2;
            $item->save();
            return redirect('/gallery')->with('success','Gallery item added successfully');
        }else{
            return back();
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $item = Gallery::find($request->id);
            $item->type = $request->type;
            $item->title = $request->title;
            $item->description = $request->description;
            if ($request->type=='image'){
                if (isset($request->source)){
                    if (file_exists($item->source)){unlink($item->source);}
                    $item->source = fileUpload($request->file('source'),'gallery');
                }
            }elseif($request->type=='video'){
                $item->source = $request->source;
                if (isset($request->thumbnail)){
                    if (file_exists($item->thumbnail)){unlink($item->thumbnail);}
                    $item->thumbnail = fileUpload($request->file('thumbnail'),'gallery');
                }
            }
            $item->save();
            return redirect('/gallery')->with('success','Gallery item updated successfully');
        }
    }

    public function delete($id){
        $item = Gallery::find($id);
        $item->status = 3;
        $item->save();

        return redirect('/gallery')->with('success','Gallery item deleted successfully');
    }

    public function updateStatus($id){
        $item = Gallery::find($id);
        $item->status == 1 ? $item->status = 2 : $item->status = 1;
        $item->save();
        return redirect('/gallery')->with('success',"Gallery item status updated");
    }
}
