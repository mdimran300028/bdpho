<?php

namespace App\Http\Controllers;

use App\Models\ClassName;
use App\Models\EventParticipant;
use App\Models\Participant;
use App\Models\SMSRecord;
use Illuminate\Http\Request;
use DB;

class SMSManagementController extends Controller
{
    public function districtWiseSMS(){
        return view('participants.sms.manage-district');
    }

    public function districtWiseSMSForm(Request $request){
        if ($request->category_id != 'all') {
            $participants = DB::table('event_participants')
                ->join('participants','event_participants.participant_id','=','participants.id')
                ->select('participants.name','participants.reg_no','participants.mobile','participants.id')
                ->where([
                    'event_participants.event_id'=>runningEventId(),
                    'participants.district_id'=>$request->district_id,
                    'event_participants.category_id'=>$request->category_id,
                ])->get()->sortBy('reg_no');
        } else{
            $participants = DB::table('event_participants')
                ->join('participants','event_participants.participant_id','=','participants.id')
                ->select('participants.name','participants.reg_no','participants.mobile','participants.id')
                ->where([
                    'event_participants.event_id'=>runningEventId(),
                    'participants.district_id'=>$request->district_id,
                ])->get()->sortBy('reg_no');
        }

        return view('participants.sms.tables.list',[
            'participants'=>$participants
        ]);
    }

    public function divisionWiseSMS(){
        return view('participants.sms.manage');
    }

    public function divisionWiseSMSForm(Request $request){
        if ($request->category_id != 'all') {
            $participants = DB::table('event_participants')
                ->join('participants','event_participants.participant_id','=','participants.id')
                ->select('participants.name','participants.reg_no','participants.mobile','participants.id')
                ->where([
                    'event_participants.event_id'=>runningEventId(),
                    'event_participants.division_id'=>$request->division_id,
                    'event_participants.category_id'=>$request->category_id,
                ])->get()->sortBy('reg_no');
        } else{
            $participants = DB::table('event_participants')
                ->join('participants','event_participants.participant_id','=','participants.id')
                ->select('participants.name','participants.reg_no','participants.mobile','participants.id')
                ->where([
                    'event_participants.event_id'=>runningEventId(),
                    'event_participants.division_id'=>$request->division_id,
                ])->get()->sortBy('reg_no');
        }

        return view('participants.sms.tables.list',[
            'participants'=>$participants
        ]);
    }

    public function divisionWiseSMSSend(Request $request){
        if ($request->post()){
            if (isset($request->participants)){
                $failedNumbers = [];
                $url  = siteInfo('sms_url'); $sid  = siteInfo('sms_sid');
                $user = siteInfo('sms_user'); $pass = siteInfo('sms_pw');
                if ($request->sms_type==1){
                    foreach ($request->participants as $id =>$item){
                        $participant = Participant::find($id);
                        $title = siteInfo('short_title');
                        $message = "Dear participant, Your $title\nReg.no: $participant->reg_no and\nMobile no: $participant->mobile\nPlease save it for the future.\n$title";
                        $number = mobileNumberFilter($participant->mobile);
                        $smsStatus = multipleMessageSend($url,$sid,$user,$pass,$number,$message);
                        //Store numbers where message send was failed
                        if (!$smsStatus){array_push($failedNumbers,$number);}
                    }
                }elseif ($request->sms_type==2){
                    foreach ($request->participants as $id =>$item){
                        $participant = Participant::find($id);
                        $number = mobileNumberFilter($participant->mobile);
                        $smsStatus = multipleMessageSend($url,$sid,$user,$pass,$number,$request->message);
                        //Store numbers where message send was failed
                        if (!$smsStatus){array_push($failedNumbers,$number);}
                    }
                }
                return back()->with('success','SMS sent successfully.');
            }else{
                return back()->with('error','No participant was selected !!!');
            }
        }
    }

    public function send($mobileNumber,$message){
        $url = "http://66.45.237.70/api.php";
        $number="$mobileNumber";
        $text="$message";
        $data= array('username'=>"01722454519", 'password'=>"DVANXRFE", 'number'=>"$number", 'message'=>"$text");

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendStatus = $p[0];

        return $sendStatus;
    }
}
