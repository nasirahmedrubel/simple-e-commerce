<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class Invoices extends Controller
{
    public function index(request $Request){
        $search = $Request['search'] ?? "";
        if($search != ""){
            $invoices = Invoice::Where("id","=",$search)->orWhere("phone","=",$search)->get();
        } else {
            $invoices = Invoice::paginate(20);
        }
        
        $data = compact('invoices','search');
        return view('admin.invoice')->with($data);
    }
    public function details($id){
        $id = Invoice::find($id);
        if(is_null($id)){
            return abort(404);
        }
        $data = compact('id');
        return view('admin.order-detail')->with($data);
    }

    public function print(request $Request){
        if(is_null($Request->invid)){
            return redirect()->route('admin.invoice');
        } else {
            $invoices = Invoice::whereIn('id', $Request->invid)->get();
            $data = compact('invoices');
            return view('admin.invoice-print')->with($data);
        }
    }
}
