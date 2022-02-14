<?php

namespace App\Http\Controllers;

use App\Models\BdPhO;
use App\Models\Category;
use App\Models\ClassName;
use App\Models\District;
use App\Models\Division;
use App\Models\EventParticipant;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Partner;
use App\Models\PastPaper;
use App\Models\SiteInfo;
use App\Models\Slider;
use App\Models\Syllabus;
use http\Env\Response;
use Illuminate\Http\Request;
use DB;

class APIController extends Controller
{
    public $divisions, $categories, $notices, $syllabuses, $pastPapers, $slides, $galleryImages, $galleryVideos, $partners;
    public $registrationStatus;


    public function __construct()
    {
        $this->divisions = Division::where(['status'=>1])->get(['id','name','code']);
        $this->categories = Category::where(['status'=>1])->get(['id','name','code']);
        $this->notices = Notice::where('status',1)->get();
        $this->syllabuses = Syllabus::where('status',1)->get();
        $this->pastPapers = PastPaper::where('status',1)->get()->sortBy('id');
        $this->slides = Slider::where('status',1)->get(['file','title','description']);
        $this->galleryImages = Gallery::where(['type'=>'image','status'=>1])->get()->sortByDesc('id');
        $this->galleryVideos = Gallery::where(['type'=>'video','status'=>1])->get()->sortByDesc('id');
        $this->partners = Partner::where(['status'=>1])->get(['name','title','logo']);
        $this->registrationStatus = $this->regStatus();
    }

    public function regStatus(){
        $currentEventRegistration = BdPhO::where(['status'=>1,'registration_status'=>1])->first();
        if (isset($currentEventRegistration)){
            return true;
        }else{
            return false;
        }
    }

    public function index(){
        return response()->json([
            'notices'=>$this->notices,
            'noticeCount'=>count($this->notices),
            'divisions'=>$this->divisions,
            'syllabuses'=>$this->syllabus(),
            'pastPapers'=>$this->pastPapers(),
            'title'=>SiteInfo::where('name','short_title')->first()->value,
            'fb_like_box'=>SiteInfo::where('name','fb_like_box')->first()->value,
            'visitor_counter'=>SiteInfo::where('name','visitor_counter')->first()->value,
            'registration_rules'=>getPage('registration_rules'),
            'registrationStatus'=>$this->registrationStatus,
            'info'=>[
                'logo'=>asset(SiteInfo::where('name','logo')->first()->value),
                'small_logo'=>asset(SiteInfo::where('name','small_logo')->first()->value),
                'favicon'=>asset(SiteInfo::where('name','favicon')->first()->value),
                'address_line_one'=>SiteInfo::where('name','address_line_one')->first()->value,
                'address_line_two'=>SiteInfo::where('name','address_line_two')->first()->value,
                'address_line_three'=>SiteInfo::where('name','address_line_three')->first()->value,
                'support'=>SiteInfo::where('name','support')->first()->value,
                'manager'=>SiteInfo::where('name','manager')->first()->value,
                'email'=>SiteInfo::where('name','email')->first()->value,
                'twitter'=>SiteInfo::where('name','twitter')->first()->value,
                'facebook'=>SiteInfo::where('name','facebook')->first()->value,
                'gplus'=>SiteInfo::where('name','gplus')->first()->value,
                'rss'=>SiteInfo::where('name','rss')->first()->value,
                'powered_text'=>SiteInfo::where('name','powered_text')->first()->value,
                'powered_link'=>SiteInfo::where('name','powered_link')->first()->value
            ]
        ]);
    }

    public function siteInfo(){
        $result = [
            'short_title'=>SiteInfo::where('name','short_title')->first()->value,
            'title'=>SiteInfo::where('name','title')->first()->value,
            'tag_line'=>SiteInfo::where('name','tag_line')->first()->value,
            'logo'=>asset(SiteInfo::where('name','logo')->first()->value),
            'small_logo'=>asset(SiteInfo::where('name','small_logo')->first()->value),
            'favicon'=>asset(SiteInfo::where('name','favicon')->first()->value),
            'address_line_one'=>SiteInfo::where('name','address_line_one')->first()->value,
            'address_line_two'=>SiteInfo::where('name','address_line_two')->first()->value,
            'address_line_three'=>SiteInfo::where('name','address_line_three')->first()->value,
            'support'=>SiteInfo::where('name','support')->first()->value,
            'manager'=>SiteInfo::where('name','manager')->first()->value,
            'email'=>SiteInfo::where('name','email')->first()->value,
            'twitter'=>SiteInfo::where('name','twitter')->first()->value,
            'facebook'=>SiteInfo::where('name','facebook')->first()->value,
            'gplus'=>SiteInfo::where('name','gplus')->first()->value,
            'rss'=>SiteInfo::where('name','rss')->first()->value,
            'powered_text'=>SiteInfo::where('name','powered_text')->first()->value,
            'powered_link'=>SiteInfo::where('name','powered_link')->first()->value
        ];

        return response()->json($result);
    }

    public function sliderImages(){
        $slides = [];
        foreach ($this->slides as $slide){
            $slideInfo = [
                'image'=>asset($slide->file),
                'title'=>$slide->title,
                'description'=>$slide->description,
            ];
            array_push($slides,$slideInfo);
        }
        return response()->json($slides);
    }

    public function getGalleryImage(){
        $images = [];
        foreach ($this->galleryImages as $galleryImage){
            $image = [
                'type'=>'image',
                'title'=>$galleryImage->title,
                'description'=>$galleryImage->description,
                'src'=>asset($galleryImage->source)
            ];
            array_push($images,$image);
        }
        return response()->json($images);
    }

    public function getGalleryVideo(){
        $videos = [];
        foreach ($this->galleryVideos as $galleryVideo){
            $video = [
                'type'=>'video',
                'title'=>$galleryVideo->title,
                'description'=>$galleryVideo->description,
                'thumb'=>asset($galleryVideo->thumbnail),
                'src'=>$galleryVideo->source
            ];
            array_push($videos,$video);
        }
        return response()->json($videos);
    }

    public function getPartnersLogo(){
        $partners = [];
        foreach ($this->partners as $item){
            $partner = ['name'=>$item->name, 'title'=>$item->title, 'logo'=>asset($item->logo)];
            array_push($partners,$partner);
        }
        return response()->json($partners);
    }

    public function syllabus(){
        $result = [];
        foreach ($this->syllabuses as $syllabus){
            $classes = '';
            foreach ($syllabus->category->classes as $class){$classes .= $class->name.' ';}

            $item = [
                'category'=>$syllabus->category->name,
                'classes'=>$classes,
                'file'=>asset($syllabus->file_url),
                'en_file'=>asset($syllabus->en_file_url)
            ];
            array_push($result,$item);
        }
        return response()->json($result);
    }

    public function pastPapers(){
        $result = [];
        foreach ($this->pastPapers as $pastPaper){
            $item = [
                'event'=>$pastPaper->event->name,
                'round'=>$pastPaper->round_id !=999? $pastPaper->round->name : 'All Round',
                'category'=>$pastPaper->category_id !=999? $pastPaper->category->name : 'All Category',
                'title'=>$pastPaper->title,
                'file'=>asset($pastPaper->file_url)
            ];
            array_push($result,$item);
        }
        return $result;
    }

    public function activeNotice(){
        return response()->json($this->notices);
    }

    public function getDivisions(){
        return response()->json($this->divisions);
    }

    public function getDistricts($id){
        $data = District::where(['division_id'=>$id,'status'=>1])->get(['id','name','code']);
        return response()->json($data);
    }

    public function getCategories(){
        return response()->json($this->categories);
    }

    public function getClasses($id){
        $data = [];
        foreach (Category::find($id)->classes->sortBy('code') as $class){
            $newClass = [
                'id'=>$class->id,
                'name'=>$class->name,
                'code'=>$class->code,
            ];
            array_push($data,$newClass);
        }
        return response()->json($data);
    }

    public function getAllClasses(){
        $data = [];
        foreach (ClassName::where('status',1)->get()->sortBy('code') as $class){
            $newClass = [
                'id'=>$class->id,
                'name'=>$class->name,
                'code'=>$class->code,
            ];
            array_push($data,$newClass);
        }
        return response()->json($data);
    }

    public function registrationStatus(){
        $bdPhO = BdPhO::where('status',1)->first();
        if (isset($bdPhO)){
            if ($bdPhO->registration_status==1){return response()->json(true);
            }else{return response()->json(false);}
        }else{return response()->json(false);}
    }

    public function getEventCode(){
        $bdPhO = BdPhO::where('status',1)->first(['code','logo']);
        if (isset($bdPhO)){
            return response()->json([
                'code'=>$bdPhO->code,
                'logo'=>asset($bdPhO->logo),
            ]);
        }else{
            return response()->json(null);
        }
    }

    public function getParticipantList($divisionId){
        $categoryParticipantsGroups = DB::table('event_participants')
            ->join('participants','event_participants.participant_id','=','participants.id')
            ->join('class_names','participants.class_id','=','class_names.id')
            ->select([
                'name'=>'participants.name',
                'school'=>'participants.school',
                'reg_no'=>'participants.reg_no',
//                'email'=>'participants.email',
//                'mobile'=>'participants.mobile',
                'category_id'=>'event_participants.category_id',
                'class_id'=>'participants.class_id',
            ])
            ->where([
                'event_participants.event_id'=>runningEventId(),
                'event_participants.division_id'=>$divisionId,
            ])->get()->groupBy('category_id');

        $categoryParticipants = [];
        foreach ($categoryParticipantsGroups as $categoryId => $participantsGroup){
            $participants = [];
            foreach ($participantsGroup as $key => $eventParticipant){
                $participants[$key] = [
                    'participant'=>$eventParticipant,
                    'class'=>ClassName::where('id',$eventParticipant->class_id)->first('name')
                ];
            }

            $categoryParticipants[$categoryId] = [
                'category'=>Category::where('id',$categoryId)->first('name'),
                'participants'=>$participants
            ];
        }
        return response()->json($categoryParticipants);
    }

    public function getCategoryParticipantList($divisionId,$categoryId){
        $categoryParticipants = DB::table('event_participants')
            ->join('participants','event_participants.participant_id','=','participants.id')
            ->join('class_names','participants.class_id','=','class_names.id')
            ->select([
                'name'=>'participants.name',
                'school'=>'participants.school',
                'reg_no'=>'participants.reg_no',
                'class_id'=>'participants.class_id',
            ])
            ->where([
                'event_participants.event_id'=>runningEventId(),
                'event_participants.division_id'=>$divisionId,
                'event_participants.category_id'=>$categoryId
            ])->get();

        foreach ($categoryParticipants as $key => $participant){
            $participant->class_name = ClassName::where('id',$participant->class_id)->first('name')->name;
        }

        return response()->json([
            'participants'=>$categoryParticipants,
            'division'=>Division::find($divisionId)->name,
            'category'=>Category::find($categoryId)->name
        ]);
    }
}


