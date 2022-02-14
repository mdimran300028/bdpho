<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index(){
        return view('users.management.manage',[
            'users'=>User::all()
        ]);
    }

    public function store(Request $request){
        if ($request->post()){
            $user = User::whereRaw( 'LOWER(`name`) LIKE ?', [ $request->email ] )->first();

            if (!isset($user)){
                $user = new User();
                $user->name = $request->name;
                $user->role = $request->role;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();

                return redirect('/users')->with('success','User added successfully');
            }else{
                return redirect('/users')->with('info','User already exist in the database');
            }
        }
    }

    public function update(Request $request){
        if ($request->post()){
            if (Auth::user()->role=='s_admin'){
                $user = User::find($request->id);
                $user->name = $request->name;
                $user->role = $request->role;
                $user->email = $request->email;
                if ($request->password != null){
                    $user->password = Hash::make($request->password);
                }
                $user->save();

                return redirect('/users')->with('success','User info updated successfully');
            }else{
                return back()->with('info','Entry restricted');
            }
        }
    }

    public function avatarUpdate(Request $request){
        if ($request->post()){
            $user = User::find($request->id);
            if (isset($request->avatar)){
                if (file_exists($user->profile_photo_path)){unlink($user->profile_photo_path);}
                $user->profile_photo_path = fileUpload($request->file('avatar'),'users');
            }
            $user->save();
            return redirect('/users')->with('success','User photo updated successfully');
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
