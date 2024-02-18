<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';

    public function categories(){
        return $this->belongsTo(Categories::class,'categories_id','id');
    }
    public function status(){
        return $this->belongsTo(Status::class,'status_id','id');
    }
    public function feature_images(){
        return $this->hasMany(Feature_image::class,'product_id', 'id');
    }
}

