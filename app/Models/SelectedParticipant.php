<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedParticipant extends Model
{
    use HasFactory;

    public function participantInfo(){
        return $this->belongsTo(Participant::class,'participant_id','id');
    }
}
