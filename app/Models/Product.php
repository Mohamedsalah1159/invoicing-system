<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['product_name', 'description','section_id','created_at', 'updated_at'];
    protected $hidden = ['id','created_at', 'updated_at'];
}
