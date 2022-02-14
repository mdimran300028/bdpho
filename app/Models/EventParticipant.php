<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
{
    use HasFactory;

    public function participant(){
        return $this->belongsTo(Participant::class,'participant_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function division(){
        return $this->belongsTo(Division::class,'division_id');
    }
}
