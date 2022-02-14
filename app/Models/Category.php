<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function classes(){
        return $this->belongsToMany(ClassName::class, 'category_classes', 'category_id', 'class_id');
    }
}
