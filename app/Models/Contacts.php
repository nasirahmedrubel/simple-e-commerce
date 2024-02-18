<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Images;

class Contacts extends Model
{
    use HasFactory;
    protected $table =  "contacts";
    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function images(){
        return $this->hasone(Images::class,'Contact_id', 'id');
    }

}
