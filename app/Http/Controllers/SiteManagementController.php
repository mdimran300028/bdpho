<?php

namespace App\Http\Controllers;

use App\Models\SiteInfo;
use Illuminate\Http\Request;

class SiteManagementController extends Controller
{
    public $properties = [
        ['property'=>'Short Title','name'=>'short_title', 'value'=>'Site Short Title','type'=>'text'],
        ['property'=>'Title','name'=>'title', 'value'=>'Site Title','type'=>'text'],
        ['property'=>'Tag Line','name'=>'tag_line','value'=>'Tag Line','type'=>'text'],
        ['property'=>'Logo','name'=>'logo','value'=>'logo.png','type'=>'file'],
        ['property'=>'Small Logo','name'=>'small_logo','value'=>'small_logo.png','type'=>'file'],
        ['property'=>'Favicon','name'=>'favicon','value'=>'favicon.png','type'=>'file'],
        ['property'=>'Address Line-1','name'=>'address_line_one','value'=>'Address Line One','type'=>'text'],
        ['property'=>'Address Line-2','name'=>'address_line_two','value'=>'Address Line Two','type'=>'text'],
        ['property'=>'Address Line-3','name'=>'address_line_three','value'=>'Address Line Three','type'=>'text'],
        ['property'=>'Support','name'=>'support','value'=>'support@xyz.org','type'=>'text'],
        ['property'=>'Manager','name'=>'manager','value'=>'Manager','type'=>'text'],
        ['property'=>'Email','name'=>'email','value'=>'manager@xyz.org','type'=>'text'],
        ['property'=>'Twitter','name'=>'twitter','value'=>'-','type'=>'text'],
        ['property'=>'Facebook','name'=>'facebook','value'=>'-','type'=>'text'],
        ['property'=>'Google Plus','name'=>'gplus','value'=>'-','type'=>'text'],
        ['property'=>'RSS','name'=>'rss','value'=>'-','type'=>'text'],
        ['property'=>'Powered Text','name'=>'powered_text','value'=>'bits & Bites','type'=>'text'],
        ['property'=>'Powered Link','name'=>'powered_link','value'=>'https://www.facebook.com/groups/338654837340138','type'=>'text'],
        ['property'=>'SMS Provider','name'=>'sms_provider','value'=>'-','type'=>'text'],
        ['property'=>'SMS API url','name'=>'sms_url','value'=>'-','type'=>'text'],
        ['property'=>'SMS API sid','name'=>'sms_sid','value'=>'-','type'=>'text'],
        ['property'=>'SMS API user','name'=>'sms_user','value'=>'-','type'=>'text'],
        ['property'=>'SMS API password','name'=>'sms_pw','value'=>'-','type'=>'text'],
        ['property'=>'Site Domain','name'=>'domain','value'=>'-','type'=>'text'],
        ['property'=>'Facebook Like Box','name'=>'fb_like_box','value'=>'-','type'=>'text'],
        ['property'=>'Visitor Counter','name'=>'visitor_counter','value'=>'-','type'=>'text'],
    ];

    public function __construct(){
        foreach ($this->properties as $property){
           $checked = SiteInfo::where('name','=',$property['name'])->first();
           if (!isset($checked)){
               $siteInfo = new SiteInfo();
               $siteInfo->property  = $property['property'];
               $siteInfo->name      = $property['name'];
               $siteInfo->value     = $property['value'];
               $siteInfo->type      = $property['type'];
               $siteInfo->save();
           }
        }
    }

    public function index(){
        return view('site-info.manage',[
            'siteInfos'=>SiteInfo::all()
        ]);
    }

    public function siteInfoUpdate(Request $request){
        if ($request->post()){
            $info = SiteInfo::find($request->id);
            if ($info->type=='file'){
                if (file_exists($info->value)){unlink($info->value);}
                $info->value = $this->fileUpload($request);
            } else{$info->value = $request->value;}
            $info->save();
            return redirect('/site-info')->with('success','Site info updated.');
        }
    }

    public function fileUpload(Request $request){
        $file = $request->file('value');
        $name = $file->getClientOriginalName();
        $filename = time().'_'.$name;
        $fileDirectory = 'assets/images/';
        $file->move($fileDirectory,$filename);
        return $fileDirectory.$filename;
    }
}
