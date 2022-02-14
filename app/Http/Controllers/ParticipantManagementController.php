<?php

namespace App\Http\Controllers;

use App\Models\AnswerScript;
use App\Models\BdPhO;
use App\Models\Category;
use App\Models\ClassName;
use App\Models\Division;
use App\Models\EventParticipant;
use App\Models\Participant;
use App\Models\QuestionPaper;
use App\Models\Round;
use App\Models\SMSRecord;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Event;
use DB;
use Auth;

class ParticipantManagementController extends Controller
{
    //API Routes----------------------------------------------------------
    public function avatarUpload(Request $request){
        $file = $request->file('upload');
        $fileUrl = imageUpload($file,'participant_photo');
        return response()->json(asset($fileUrl));
    }

    public function avatarEdit(Request $request){
        $participant = Participant::find($request->id);
        if (!empty($participant->avatar)){
            $url = imagePath($participant->avatar);
            if (file_exists($url)){unlink($url);}
        }

        $file = $request->file('upload');
        $fileUrl = imageUpload($file,'participant_photo');
        $participant->avatar = asset($fileUrl);
        $participant->save();
        return response()->json(asset($fileUrl));
    }


    public function participantRegistration(Request $request){
        if ($request->post()){
            $participant = Participant::where(['name'=>$request->name, 'mobile'=>$request->mobile,])->first();

            $data = [
                'status'=>'fail',
                'message'=>'Already registered, Please login to your profile to change something.'
            ];

            $categoryId = ClassName::find($request->classId)->category[0]->id;

            if (!isset($participant)){
                $participant = new Participant();
                $participant->name = $request->name;
                $participant->school = $request->school;
                $participant->division_id = $request->divisionId;
                $participant->district_id = $request->districtId;
                $participant->class_id = $request->classId;
                $participant->email = $request->email;
                $participant->mobile = $request->mobile;
                $participant->reg_no = createRegistrationNumber($request->divisionId,$categoryId);
                $participant->avatar = $request->ppUrl;    //To be work
                $participant->gender = $request->gender;
                $participant->post_code = $request->postCode;
                $participant->address = $request->address;
                $participant->status = 1;
                $participant->save();

                $runningEvent = BdPhO::where(['status'=>1,'registration_status'=>1])->first();
                $firstRound = Round::where('status','=',1)->first();

                $eventParticipant = new EventParticipant();
                $eventParticipant->event_id = $runningEvent->id;
                $eventParticipant->round_id = $firstRound->id;
                $eventParticipant->division_id = $request->divisionId;
                $eventParticipant->category_id = $categoryId;
                $eventParticipant->participant_id = $participant->id;
                $eventParticipant->reg_no = createRegistrationNumber($request->divisionId,$categoryId);
                $eventParticipant->status = 1;
                $eventParticipant->save();

//                $data = [
//                    'status'=>'success',
//                    'message'=>'Registration is successful. Your registration no: '.$eventParticipant->reg_no.' Please save it for the future'
//                ];

                $participant = Participant::find($eventParticipant->participant_id);
                $participant->district;
                $participant->className;
                $participant->categories;
                $title = siteInfo('short_title');
                $message = $title.' registration is successful. Your registration no: '.$eventParticipant->reg_no.' Please save it for the future';
                $smsStatus = singleMessageSend(mobileNumberFilter($participant->mobile),$message);
                $data = [
                    'status'=>'success',
                    'participant'=>$participant,
                    'message'=>$message
                ];
            }
            return response()->json($data);
        }
    }

    public function participantInfoUpdate(Request $request){
        $participant = Participant::find($request->id);
        $participant->name = $request->name;
        $participant->school = $request->school;
        $participant->district_id = $request->districtId;
        $participant->class_id = $request->classId;
        $participant->email = $request->email;
        $participant->mobile = $request->mobile;
        $participant->gender = $request->gender;
        $participant->post_code = $request->postCode;
        $participant->address = $request->address;
        $participant->save();

        $participant->district;
        $participant->className;
        $participant->categories;
        $data = [
            'status'=>'success',
            'participant'=>$participant,
            'message'=>'User verified'
        ];

        return response()->json($data);
    }

    public function participantLogin(Request $request){
        if ($request->post()){
            $participant = Participant::where(['reg_no'=>$request->regNo, 'mobile'=>$request->mobile, 'status'=>1])->first();

            if (isset($participant)){
                $participant->login_status = 1;
                $participant->last_login_ip = $request->ip;
                $participant->browser_name = $request->browser;
//                $participant->security_key = time().'_'.rand(10000,99999);
                $participant->save();
                $participant->district;
                $participant->className;
                $participant->categories;
                $data = [
                    'status'=>'success',
                    'participant'=>$participant,
                    'message'=>'User verified'
                ];
            }else{
                $data = [
                    'status'=>'fail',
                    'message'=>'User verification failed'
                ];
            }
            return response()->json($data);
        }
    }

    public function participantLogout(Request $request){
        $participant = Participant::find($request->id);
        $participant->login_status = 2;
        $participant->security_key = null;
        $participant->save();
        $data = [
            'status'=>'success',
            'message'=>'User logged out'
        ];
        return response()->json($data);
    }

    public function getParticipant($id){
        $participant = Participant::find($id);
        $districts = Division::find($participant->division_id)->districts;
        $classes = EventParticipant::where([
            'event_id'=>runningEventId(),
            'participant_id'=>$id,
            'reg_no'=>$participant->reg_no
        ])->first()->category->classes;
        return response()->json([
            'participant'=>$participant,
            'districts'=>$districts,
            'classes'=>$classes
        ]);
    }

    //Web Routes----------------------------------------------------------
    public function districtWiseParticipantsForm(){
//        $participants = EventParticipant::where([
//            'event_id'=>runningEventId()
//        ])->get();
        return view('participants.district.manage',[
            'participants'=>[]
        ]);
    }

    public function districtAndCategoryWiseParticipant(Request $request){
        if ($request->category_id != 'all') {
            $participants = DB::table('event_participants')
                ->join('participants','event_participants.participant_id','=','participants.id')
                ->select('event_participants.id','participants.name','participants.reg_no','participants.mobile','participants.email','participants.class_id','participants.gender')
                ->where([
                    'event_participants.event_id'=>runningEventId(),
                    'participants.district_id'=>$request->district_id,
                    'event_participants.category_id'=>$request->category_id,
                ])->get()->sortBy('reg_no');
        } else{
            $participants = DB::table('event_participants')
                ->join('participants','event_participants.participant_id','=','participants.id')
                ->select('event_participants.id','participants.name','participants.reg_no','participants.mobile','participants.email','participants.class_id','participants.gender')
                ->where([
                    'event_participants.event_id'=>runningEventId(),
                    'participants.district_id'=>$request->district_id,
                ])->get()->sortBy('reg_no');
        }

        foreach ($participants as $participant){
            $participant->class_name = ClassName::find($participant->class_id)->name;
        }

        return view('participants.district.tables.list',[
            'participants'=>$participants,
        ]);
    }

    public function divisionWiseParticipantsForm(){
        return view('participants.division.manage',[
            'participants'=>[]
        ]);
    }

    public function divisionAndCategoryWiseParticipant(Request $request){
        if ($request->category_id != 'all') {
            $participants = DB::table('event_participants')
                ->join('participants','event_participants.participant_id','=','participants.id')
                ->select('event_participants.id','participants.name','participants.reg_no','participants.mobile','participants.avatar','participants.class_id','participants.gender')
                ->where([
                    'event_participants.event_id'=>runningEventId(),
                    'event_participants.division_id'=>$request->division_id,
                    'event_participants.category_id'=>$request->category_id,
                ])->get()->sortBy('reg_no');
        } else{
            $participants = DB::table('event_participants')
                ->join('participants','event_participants.participant_id','=','participants.id')
                ->select('event_participants.id','participants.name','participants.reg_no','participants.mobile','participants.avatar','participants.class_id','participants.gender')
                ->where([
                    'event_participants.event_id'=>runningEventId(),
                    'event_participants.division_id'=>$request->division_id,
                ])->get()->sortBy('reg_no');
        }

        foreach ($participants as $participant){
            $participant->class_name = ClassName::find($participant->class_id)->name;
        }

        return view('participants.division.tables.list',[
            'participants'=>$participants
        ]);
    }

    public function categoryWiseParticipantForm(){
        return view('participants.category.manage',[
            'participants'=>[],
            'categoryId'=>null
        ]);
    }

    public function categoryWiseParticipant(Request $request){
        if ($request->category_id != 'all') {
            $participants = DB::table('event_participants')
                ->join('participants','event_participants.participant_id','=','participants.id')
                ->select('event_participants.id','participants.name','participants.reg_no','participants.mobile','participants.email')
                ->where([
                    'event_participants.event_id'=>runningEventId(),
                    'event_participants.category_id'=>$request->category_id,
                ])->get()->sortBy('reg_no');
        }
        else{
            $participants = DB::table('event_participants')
                ->join('participants','event_participants.participant_id','=','participants.id')
                ->select('event_participants.id','participants.name','participants.reg_no','participants.mobile','participants.email')
                ->where([
                    'event_participants.event_id'=>runningEventId(),
                ])->get()->sortBy('reg_no');
        }

        foreach ($participants as $participant){
            $participant->edit_route = Auth::user()->role == 's_admin'? route('participant-info-edit',['id'=>$participant->id]) : '#';
        }
        return response()->json($participants);

//        return view('participants.category.manage',[
//            'participants'=>$participants,
//            'categoryId'=>$request->category_id
//        ]);

        return view('participants.category.tables.list',[
            'participants'=>$participants,
        ]);
    }

    public function participantsRegNoEditForm(){
        return view('participants.edit.manage');
    }

    public function participantRegNoEditForm(Request $request){
        if ($request->ajax()){
            $participants = EventParticipant::where([
                'event_id'=>runningEventId(),
                'division_id'=>$request->division_id,
                'category_id'=>$request->category_id
            ])->get();

            return view('participants.edit.tables.list',[
                'participants'=>$participants
            ]);
        }
    }

    public function participantRegNoUpdate(Request $request){
        if ($request->post()){
            if (isset($request->participants)){
                foreach ($request->participants as $id => $status){
                    $this->regNoUpdate($id,$request->category_id,$request->division_id,$request->new_category_id);
                }
                $this->regNoRegenerate($request->division_id,$request->category_id);
                return redirect('/participants-reg-no-edit')->with('success','Participant registration number updated successfully.');
            }else{
                return redirect('/participants-reg-no-edit')->with('error','No participant selected for editing. . . .');
            }
        }
    }

    public function regNoUpdate($participantId,$categoryId,$divisionId,$newCategoryId){
        //Update into event_participants table
        $eventParticipant = EventParticipant::where(['participant_id'=>$participantId, 'category_id'=>$categoryId, 'division_id'=>$divisionId,])->first();
        $eventParticipant->category_id = $newCategoryId;
        $eventParticipant->reg_no = createRegistrationNumber($divisionId,$newCategoryId);
        $eventParticipant->save();
        //Update into participants table
        $participant = Participant::find($participantId);
        $participant->reg_no = $eventParticipant->reg_no;
        $participant->save();
    }

    public function regNoRegenerate($divisionId,$categoryId){
        $divisionCode = Division::find($divisionId)->code;
        $categoryCode = Category::find($categoryId)->code;

        $eventParticipants = EventParticipant::where(['division_id'=>$divisionId, 'category_id'=>$categoryId])->get()->sortBy('reg_no');
        foreach ($eventParticipants as $key => $eventParticipant){
            $sl = $key+1;
            $length = strlen("$sl");
            if ($length==1){$sl = '000'.$sl;}
            elseif($length==2){$sl = '00'.$sl;}
            elseif($length==3){$sl = '0'.$sl;}
            //Update into event_participants table
            $eventParticipant->reg_no = $divisionCode.'-'.$categoryCode.'-'.$sl;
            $eventParticipant->save();
            //Update into participants table
            $participant = Participant::find($eventParticipant->participant_id);
            $participant->reg_no = $divisionCode.'-'.$categoryCode.'-'.$sl;
            $participant->save();
        }
    }

    public function participantInfoEdit($id){
        $eventParticipant = EventParticipant::find($id);
        return view('participants.edit.basic-info-edit',[
            'ep'=>EventParticipant::find($id)
        ]);
    }

    public function participantBasicInfoUpdate(Request $request){
        if ($request->post()){
            $participant = Participant::find($request->participant_id);
            $participant->name = $request->name;
            $participant->school = $request->school;
            $participant->district_id = $request->district_id;
            $participant->class_id = $request->class_id;
            $participant->email = $request->email;
            $participant->mobile = $request->mobile;
            if (isset($request->avatar)){
                if (file_exists($participant->avatar)){unlink($participant->avatar);}
                $participant->avatar = imageUpload($request->file('avatar'),'participant_photo');
            }
            $participant->gender = $request->gender;
            $participant->post_code = $request->post_code;
            $participant->address = $request->address;
            $participant->save();

            return back()->with('success','Basic Info Updated Successfully');
        }
    }

    public function examParticipant(){
        return view('exam.attend.manage');
    }

    public function examList(Request $request){
        if ($request->ajax()){
            $qps = QuestionPaper::where([
                'event_id'=>runningEventId(),
                'category_id'=>$request->category_id,
            ])->get();

            return view('exam.attend.tables.exam-list',[
                'qps'=>$qps
            ]);
        }
    }

    public function categoryWiseExamParticipant(Request $request){
        $participants = DB::table('answer_scripts')
            ->join('event_participants','answer_scripts.student_id','event_participants.participant_id')
            ->join('participants','answer_scripts.student_id','participants.id')
            ->select('answer_scripts.id','event_participants.reg_no','participants.browser_name','participants.login_status')
            ->where([
                'event_participants.event_id'=>runningEventId(),
                'event_participants.category_id'=>$request->category_id,
                'answer_scripts.question_paper_id'=>$request->question_paper_id,
            ])->get();

//        return view('exam.attend.tables.list',[
//            'participants'=>$participants,
//            'total'=>count($participants),
//            'data'=>$request
//        ]);


        $no = count($participants);
        $string = "<h3>Total participant in the exam: $no</h3>";
        return $string;
    }
}
