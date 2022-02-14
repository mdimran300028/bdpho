<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;

class OrganizerManagementController extends Controller
{
    public $organizers;

    public function __construct(){
        $this->organizers = Organizer::all()->sortBy('sl');
    }

    public function index(){
        return view('organizer.manage',[
            'organizers'=>$this->organizers,
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $organizer = new Organizer();
            $organizer->name = $request->name;
            $organizer->title = $request->title;
            $organizer->description = $request->description;
            $organizer->email = $request->email;
            $organizer->photo = fileUpload($request->file('photo'),'organizer');
            $organizer->sl = count($this->organizers)+1;
            $organizer->status = 2;
            $organizer->save();
            return redirect('/organizer')->with('success','Organizer added successfully');
        }else{
            return back();
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $organizer = Organizer::find($request->id);
            $organizer->name = $request->name;
            $organizer->title = $request->title;
            $organizer->description = $request->description;
            $organizer->email = $request->email;
            if (isset($request->photo)){
                if (file_exists($organizer->photo)){unlink($organizer->photo);}
                $organizer->photo = fileUpload($request->file('photo'),'organizer');
            }
            $organizer->save();
            return redirect('/organizer')->with('success','Organizer Information updated successfully');
        }
    }

    public function delete($id){
        $organizer = Organizer::find($id);
        $organizer->status = 3;
        $organizer->save();

        return redirect('/organizer')->with('success','Organizer deleted successfully');
    }

    public function updateStatus($id){
        $organizer = Organizer::find($id);
        $organizer->status == 1 ? $organizer->status = 2 : $organizer->status = 1;
        $organizer->save();
        return redirect('/organizer')->with('success',"Organizer status updated");
    }

    //API Routes----------------------------------
    public function getOrganizers(){
        $organizers = [];
        foreach ($this->organizers as $key => $organizer){
            if ($organizer->status==1){
                $organizers[$key] = [
                    'id'=>$organizer->id,
                    'name'=>$organizer->name,
                    'title'=>$organizer->title,
                    'description'=>$organizer->description,
                    'photo'=>asset($organizer->photo),
                ];
            }
        }
        return response()->json($organizers);
    }
}
