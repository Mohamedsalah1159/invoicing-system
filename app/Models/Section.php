<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{   
    protected $fillable=['section_name','descreption', 'created_by'];
    public function scopeSelection($q){
        return $q->select(['id','section_name', 'descreption'])->paginate(10);
    }
}
