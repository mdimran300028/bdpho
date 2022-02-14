<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastPaper extends Model
{
    use HasFactory;

    public function event(){
        return $this->belongsTo(BdPhO::class,'event_id');
    }

    public function round(){
        return $this->belongsTo(Round::class,'round_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
