<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    protected $primaryKey = 'id';

    public function invoicedetails(){
        return $this->hasMany(Invoicedetail::class,'invoice_id', 'id');
    }
    public function status(){
        return $this->belongsTo(Status_order::class,'status_id', 'id');
    }
}
