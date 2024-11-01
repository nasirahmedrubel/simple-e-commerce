<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Shipment extends Controller
{
    public function index(){
        return view('admin.shipment');
    }
}
