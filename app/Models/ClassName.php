<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsToMany(Category::class, 'category_classes', 'class_id', 'category_id');
    }
}
