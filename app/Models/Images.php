<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contacts;

class Images extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $primaryKey = 'id';

    public function contact_number(){
        return $this->belongsTo(Contacts::class, 'Contact_id', 'id');
    }
    
}
