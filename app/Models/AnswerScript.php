<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerScript extends Model
{
    use HasFactory;

    public function answers(){
        return $this->hasMany(StudentAnswer::class,'answer_script_id');
    }

    public function mark(){
        $answers = $this->hasMany(StudentAnswer::class,'answer_script_id');
        return $answers;
    }

//    public function participant(){
//        return $this->belongsTo(Participant::class,'student_id');
//    }

    public function participant(){
        return $this->belongsTo(EventParticipant::class,'student_id','participant_id');
    }


}
