<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{   
    protected $fillable=['id','section_name','descreption', 'created_by'];
    protected $hidden = ['created_at', 'updated_at'];
    public function scopeSelection($q){
        return $q->select(['id','section_name', 'descreption'])->paginate(10);
    }
}
