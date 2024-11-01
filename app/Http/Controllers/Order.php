<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Invoicedetail;

class Order extends Controller
{
    public function net_total(){
        $price = 0;
        $cart = session()->get('cart');
        if(isset($cart)){
            if(count($cart) > 0 ){
                foreach(session('cart') as $id => $product ){
                    $price += $product['price'] * $product['quantity'];
                }
                $price += session('Dcharge');
            }
        }
        return $price;
    }

    public function index(Request $request){
        $net_total = new Products;
        $validated = $request->validate([
            'name' => 'required|max:40',
            'address' => 'required|max:200',
            'phone' => 'required|max:11',
            'Dcharge' => 'required|max:3',
        ]);

        if(empty(session('cart'))){
            return redirect()->route('home.view');
        }

        $invoice = new Invoice;
        $invoice->name = $request['name'];
        $invoice->address = $request['address'];
        $invoice->phone = $request['phone'];
        $invoice->Dcharge = $request['Dcharge'];
        $invoice->bill = self::net_total();
        $invoice->status_id = '1';

        $invoice->save();
        $lastId = $invoice->id;

        // echo $request->name . "and address =" . $request->address . "and Number =" . $request->phone . "<br />" ;
       
        foreach (session('cart') as $key => $value) {
            $Pdetails = new Invoicedetail;
            $Pdetails->product_id = $key;
            $Pdetails->invoice_id = $lastId;
            $Pdetails->quantity = $value['quantity'];
            $Pdetails->price = $value['price'];
            $Pdetails->save();
            
            // echo $key . "<br />";
            // echo $value['name'] . "<br />";
            // echo $value['quantity'] . "<br />";
            // echo $value['price'] . "<br />";
            // echo "<hr> <br />";
        }
        session()->forget('cart');
        return redirect()->route('thank.you')->with(['name'=> $request->name]);
    }
    public function delete($id){
        $invoice = Invoice::find($id);
        $inv_prdt = Invoicedetail::where('invoice_id', $id)->get();
        
            foreach ($inv_prdt as $value) {
                Invoicedetail::where('invoice_id', $id)->delete();
                // echo $value->id;
            }
            Invoice::where('id', $id)->delete();
            return redirect()->route('admin.invoice')->with(['delete' => 'Invoice Deleted Successfully']);
        
    }
}
