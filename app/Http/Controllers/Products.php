<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Invoice;
use Illuminate\Http\Request;


class Products extends Controller
{
    public function cartcount(){
        $cart = session()->get('cart');
        $cartcount = 0;
        if(isset($cart)){
            if(count($cart) >= 0){
                foreach($cart as $value){
                    $cartcount += $value['quantity'];
                }
            } else {
                $cartcount = 0;
            }

        } else {
            $cartcount = 0;
        }
        session()->put('countcart', $cartcount);

    }

    public function grand_total(){
        $price = 0;
        $cart = session()->get('cart');
        if(isset($cart)){
            if(count($cart) > 0 ){
                foreach(session('cart') as $id => $product ){
                    $price += $product['price'] * $product['quantity'];
                }
            }
        }
        return $price;
    }

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

    public function index(){

        $cart = session()->get('cart');
        self::cartcount();
        $totalqnt = session()->get('countcart');
        $products = Product::all();
        $data = compact('products','totalqnt');
        
        return view('product')->with($data);
    }
    
    public function productaddtocard(Request $request){
        
        $id = $request->productid;
        $product = Product::findorfail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->qnt;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => $request->qnt,
                "price" => $product->price,
                "image" => $product->img,

            ];
        }
        session()->put('cart', $cart);
        self::cartcount();
        return redirect()->route('checkout.view');
    }

    public function addtocard($id){
        $product = Product::findorfail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->img,

            ];
        }
        
        session()->put('cart', $cart);
        self::cartcount();
        return redirect()->route('checkout.view');
        // return redirect()->back()->with('success', 'Product has been added to cart!');

    }
    public function checkout(){
        $Dcharge = session('Dcharge');
        $sub_total = self::grand_total();
        if(!isset($Dcharge)){
            session()->put('Dcharge', '70');
        }
        $cart = session()->get('cart');
        // echo count($cart);
        if(isset($cart)){
            if(count($cart) === 0){
                return redirect(route('home.view'));
            } else {
                $sub_total = self::grand_total();
                $net_total = self::net_total();
                $totalqnt = session()->get('countcart');
                $data = compact('sub_total', 'net_total','totalqnt');
                return view('cart')->with($data);
            }
        } else {
            return redirect(route('home.view'));
        }
        
        
        // die();
        
        
    }

    public function ProductDelete($id){
        $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back();
    }

    public function QuantityUpdate(Request $request){
        $cart = session()->get('cart', []);

        if(isset($cart[$request->id])) {
                $cart[$request->id]['quantity'] = $request->qnt;
                $request->session()->put('cart', $cart);
                $tbl_subtotal = $request->qnt * $cart[$request->id]['price'];
                $sub_total = self::grand_total();
                $net_total = self::net_total();
                self::cartcount();
                $totalqnt = session()->get('countcart');

                return response()->json(['subtotal' => $sub_total, 'nettotal' => $net_total, 'tbltotal' => $tbl_subtotal, 'totalqnt' => $totalqnt]);
        }
        
        
    }

    public function DeleteCartProduct(Request $request){
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            $sub_total = self::grand_total();
            $net_total = self::net_total();
            self::cartcount();
            $totalqnt = session()->get('countcart');
            return response()->json(['subtotal' => $sub_total, 'nettotal' => $net_total, 'totalqnt' => $totalqnt]);
        }
    }

    public function dchargeupdate(Request $request){
        session()->put('Dcharge', $request->dcharge);
        $sub_total = self::grand_total();
        $net_total = self::net_total();
        return response()->json(['subtotal' => $sub_total, 'nettotal' => $net_total]);
    }
    public function getinvoicedetails(Request $request){
        $product =  Invoice::find($request->id)->invoicedetails->load('product');
        $id = Invoice::find($request->id);
        return response()->json(['id' => $id, 'product' => $product]);
    }

    public function order_submit(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'Dcharge' => 'required',
        ]);
        
        echo $request->name . "and address =" . $request->address . "and Number =" . $request->phone . "<br />" ;
       
        foreach (session('cart') as $key => $value) {
            echo $key . "<br />";
            echo $value['name'] . "<br />";
            echo $value['quantity'] . "<br />";
            echo $value['price'] . "<br />";
            echo "<hr> <br />";
        }
        echo self::net_total();
    }

    public function product($id){
        $cart = session()->get('cart');
        self::cartcount();
        $totalqnt = session()->get('countcart');
        $product = Product::find($id);
        if(is_null($product)){
            return abort(404);
        }
        $feature_image = $product->feature_images;
        if(count($feature_image)>0){
            $feature_image = true;
        } else {
            $feature_image = false;
        }

        $data = compact('product','totalqnt', 'feature_image');
        return view('products-page')->with($data);
    }

    public function thankyou(){
        return view('thankyou-page');
    }
}
