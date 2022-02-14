<?php
use App\Models\BdPhO;
use App\Models\Category;
use App\Models\Division;
use App\Models\District;
use App\Models\EventParticipant;
use App\Models\Region;
use App\Models\SiteInfo;
use App\Models\SMSRecord;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

function events(){
    return BdPhO::all();
}

function rounds(){
    return App\Models\Round::all();
}

function divisions(){
    return Division::all();
}

function districtsByDivision($divisionId){
    return District::where('division_id',$divisionId)->get();
}

function regions(){
    return Region::all();
}

function districtsByRegion($regionId){
    return Region::find($regionId)->districts;
}

function categories(){
    return Category::all();
}

function classes($categoryId){
    return Category::find($categoryId)->classes;
}

//function imageUpload(Request $request,$directory){
function imageUpload($file,$directory){
    $name = $file->getClientOriginalName();
    $filename = time().'_'.$name;
    $fileDirectory = 'assets/images/bdpho/'.$directory.'/';
    $file->move($fileDirectory,$filename);
    return $fileDirectory.$filename;
}

function fileUpload($file,$directory){
    $extension = $file->getClientOriginalExtension();
    $filename = rand(200,9999).'_'.time().'_.'.$extension;
    $fileDirectory = 'assets/uploads/'.$directory.'/';
    $file->move($fileDirectory,$filename);
    return $fileDirectory.$filename;
}

function zipFileUpload($file,$directory){
    $name = $file->getClientOriginalName();
    $filename = time().'_'.$name;
    $fileDirectory = 'assets/uploads/'.$directory.'/';
    $file->move($fileDirectory,$filename);
    return $fileDirectory.$filename;
}

function createRegistrationNumber($divisionId,$categoryId){
    $event = BdPhO::where(['status'=>1,'registration_status'=>1])->first();
    $participants = EventParticipant::where([
        'event_id'=>$event->id,
        'category_id'=>$categoryId,
        'division_id'=>$divisionId
    ])->get();

    $divisionCode = Division::find($divisionId)->code;
    $categoryCode = Category::find($categoryId)->code;
    $sl = count($participants)+1;
    $length = strlen("$sl");

    if ($length==1){
        $sl = '000'.$sl;
    }elseif($length==2){
        $sl = '00'.$sl;
    }elseif($length==3){
        $sl = '0'.$sl;
    }

    $registrationNumber = $divisionCode.'-'.$categoryCode.'-'.$sl;

    return $registrationNumber;
}

function runningEventId(){
    $event = BdPhO::where(['status'=>1])->first();
    if (isset($event)){
        return $event->id;
    }else{
        return null;
    }
}

function siteInfo($name){
    $info = SiteInfo::where('name',$name)->first();
    if (isset($info)){
        return $info->value;
    }else{
        return null;
    }
}

function imagePath($url){
    $domain = route('/');
    if ($domain != 'http://127.0.0.1:8000'){
        $domain = siteInfo('domain');
    }
//    $domain = "https://admin.bdwpho.org";
//    $domain = "https://admin.bdpho.org";
    $domain .= '/';
    $splitted = explode($domain,$url);
    return $splitted[1];
}

function mobileNumberFilter($number){
    $digits = str_split($number,1);
    $filtered = '';
    foreach ($digits as $d){
        if ($d == '0' or $d == '1' or $d == '2' or $d == '3' or $d == '4' or $d == '5' or $d == '6' or $d == '7' or $d == '8' or $d == '9'){
            $filtered .= "$d";
        }
    }
    $countryCode = '88';
    if (strlen($filtered)==11){$filtered = $countryCode.$filtered;}
    return $filtered;
}

function allPermissions($roleId=null){
    if ($roleId==null){
        return Permission::all();
    }else{
        $role = Spatie\Permission\Models\Role::findById($roleId);
        return $role->permissions;
    }
}

function permissions($groupName, $roleId=null){
    if ($roleId==null){
        return Permission::where('group_name',$groupName)->get();
    }else{
        $role = Spatie\Permission\Models\Role::findById($roleId);
        $permissions = $role->permissions;
        $permissions = $permissions->where('group_name','=',$groupName);
        return $permissions;
    }
}

function messageParameterSet($sid,$user,$pass,$mobile,$message){
    if (siteInfo('sms_provider')=='bulksmsbd') {
        $param= array('username'=>$user, 'password'=>$pass, 'number'=>"$mobile", 'message'=>$message);
    }elseif (siteInfo('sms_provider')=='ssdtech'){
        $param="masking=$sid&userName=$user&password=$pass&MsgType=TEXT&receiver=$mobile&message=$message";
    }
    return $param;
}

function sendMessage($url,$param){
    if (siteInfo('sms_provider')=='bulksmsbd'){
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendStatus = $p[0];
        if ($sendStatus == '1101'){$status = true;}
        else {$status = false;}
        return $status;
    }elseif (siteInfo('sms_provider')=='ssdtech'){
        $crl = curl_init();
        curl_setopt($crl,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($crl,CURLOPT_SSL_VERIFYHOST,2);
        curl_setopt($crl,CURLOPT_URL,$url);
        curl_setopt($crl,CURLOPT_HEADER,0);
        curl_setopt($crl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($crl,CURLOPT_POST,1);
        curl_setopt($crl,CURLOPT_POSTFIELDS,$param);
        $response = curl_exec($crl);
        curl_close($crl);

        $data = json_decode($response, TRUE);
        $status = $data[0]['success'];
        return $status;
    }
}

function messageRecord($message,$mobile,$status){
    $smsRecord = new SMSRecord();
    $smsRecord->sms_body = $message;
    $smsRecord->receiver_no = $mobile;
    if ($status){
        $smsRecord->status = 'Delivered';
    }
    $smsRecord->save();
    return true;
}

function singleMessageSend($mobile,$message){
    $url  = siteInfo('sms_url');
    $sid  = siteInfo('sms_sid');
    $user = siteInfo('sms_user');
    $pass = siteInfo('sms_pw');
    $param = messageParameterSet($sid,$user,$pass,$mobile,$message);
    $status = sendMessage($url,$param);
    $record = messageRecord($message,$mobile,$status);
    return $status;
}

function multipleMessageSend($url,$sid,$user,$pass,$mobile,$message){
    $param = messageParameterSet($sid,$user,$pass,$mobile,$message);
    $status = sendMessage($url,$param);
    $record = messageRecord($message,$mobile,$status);
    return $status;
}

function getPage($name){
    $page = App\Models\Page::where('name','=',$name)->first();
    if (isset($page)){return $page;}
    else{return null;}
}

function participantCount($eventId,$divisionId,$categoryId){
    $eventParticipants = EventParticipant::where([
        'event_id'=>$eventId, 'division_id'=>$divisionId, 'category_id'=>$categoryId
    ])->get('id');

    return count($eventParticipants);
}

function examMark($answerScriptId){
    \App\Models\StudentAnswer::where()->get();
}
