<?php

namespace App\Http\Controllers;

use App\Models\CentralMember;
use Illuminate\Http\Request;

class CentralCommitteeManagementController extends Controller
{
    public $members;

    public function __construct(){
        $this->members = CentralMember::all()->sortBy('sl');
    }

    public function index(){
        return view('central-committee.manage',[
            'members'=>$this->members,
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $member = new CentralMember();
            $member->name = $request->name;
            $member->title = $request->title;
//            $member->institute = $request->institute;
//            $member->department = $request->department;
            $member->description = $request->description;
            $member->email = $request->email;
            $member->photo = fileUpload($request->file('photo'),'central-member');
            $member->sl = count($this->members)+1;
            $member->status = 2;
            $member->save();
            return redirect('/central-member')->with('success','Central member added successfully');
        }else{
            return back();
        }
    }

    public function update(Request $request){
        if ($request->post()){
            $member = CentralMember::find($request->id);
            $member->name = $request->name;
            $member->title = $request->title;
//            $member->institute = $request->institute;
//            $member->department = $request->department;
            $member->description = $request->description;
            $member->email = $request->email;
            if (isset($request->photo)){
                if (file_exists($member->photo)){unlink($member->photo);}
                $member->photo = fileUpload($request->file('photo'),'central-member');
            }
            $member->save();
            return redirect('/central-member')->with('success','Central Member Information updated successfully');
        }
    }

    public function delete($id){
        $member = CentralMember::find($id);
        $member->status = 3;
        $member->save();

        return redirect('/central-member')->with('success','Central Member deleted successfully');
    }

    public function updateStatus($id){
        $member = CentralMember::find($id);
        $member->status == 1 ? $member->status = 2 : $member->status = 1;
        $member->save();
        return redirect('/central-member')->with('success','Central Member status updated');
    }

    //API Routes----------------------------------
    public function getCentralMembers(){
        $members = [];
        foreach ($this->members as $key => $member){
            if ($member->status==1){
                $members[$key] = [
                    'id'=>$member->id,
                    'name'=>$member->name,
                    'title'=>$member->title,
                    'institute'=>$member->institute,
                    'department'=>$member->department,
                    'description'=>$member->description,
                    'photo'=>asset($member->photo),
                ];
            }
        }
        return response()->json($members);
    }
}
