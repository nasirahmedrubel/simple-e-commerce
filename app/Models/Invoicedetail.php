<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoicedetail extends Model
{
    use HasFactory;
    protected $table = 'invoice_details';
    protected $primaryKey = 'id';
    
    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
