<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
    public function className(){
        return $this->belongsTo(ClassName::class,'class_id');
    }
    public function categories(){
        return $this->belongsToMany(Category::class,'event_participants','participant_id','category_id')->wherePivot('status','=',1);
    }
}
