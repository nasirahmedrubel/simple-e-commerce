<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use App\Http\Controllers\Products;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Status;
use App\Models\Feature_image;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class WebsiteControllers extends Controller
{
    public function index(){
        $Products = new Products;
        $Products->cartcount();
        $totalqnt = session()->get('countcart');
        $products = Product::all();
        $data = compact('products','totalqnt');
        return view('home')->with($data);
    }

    public function daskboard(){
        return view('admin.daskboard');
    }

    public function categories(){
        $categories = Categories::all();
        $data = compact('categories');
        return view('admin.categories')->with($data);
    }
    public function categories_create(){
        return view('admin.create-category');
    }

    public function categories_create_store(Request $request){
        $categories = new Categories;
        $categories->name = $request->name;
        $categories->save();
        return redirect()->route('admin.categories');
    }

    public function products(){
        $product = Product::all();
        $data = compact('product');
        return view('admin.products')->with($data);
    }
    public function products_create(){
        $categories = Categories::all();
        $status = Status::all();
        $data = compact('status', 'categories');
        return view('admin.create-product')->with($data);
    }
    public function products_create_store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:40',
            'category' => 'required|max:50',
            'status' => 'required|max:20',
            'price' => 'required',
            'images' => 'required|mimes:jpeg,jpg,png,bmp|dimensions:min_width=200,min_height=200,max_width=1000,max_height=1000|max:2048',
            'featureimage.*' => 'mimes:jpeg,jpg,png,bmp|dimensions:min_width=200,min_height=200,max_width=1000,max_height=1000|max:2048',
        ]);
        $filename = time() . "." . $request->file('images')->getClientOriginalExtension();
        $path = $request->file('images')->StoreAs('images', $filename, 'public');


    
        $product = new Product;
        $product->name = $request->name;
        $product->img = $filename;
        $product->description = $request->description;
        $product->categories_id = $request->category;
        $product->status_id = $request->status;
        $product->price = $request->price;
        $product->save();

        if($request->hasfile('featureimage')) {
            foreach ($request->file('featureimage') as $file) {
                $Feature_image = new Feature_image;
                $filename = uniqid() . time() . "." . $file->getClientOriginalExtension();
                $path = $file->StoreAs('images', $filename, 'public');
                $Feature_image->url = $filename;
                $Feature_image->product_id = $product->id;
                $Feature_image->save();
            }
        }

        return redirect()->route('admin.products.create');

    }
    public function ckeditor_upload(Request $request){
        if ($request->hasFile('upload')) 
        {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }
    public function product_delete($id){
        $product = Product::find($id);
        if(!is_null($product)){
            $feature_images = Feature_image::where('product_id',$id)->get();
            if(count($feature_images)>0){
                foreach ($feature_images as $value) {
                    // $path = Storage::path("public/" . $value->url);
                    if(Storage::exists("public/images/" . $value->url)) {
                        Storage::delete("public/images/" . $value->url);
                        Feature_image::where('product_id',$id)->delete();
                    }
                    
                }
            }

            if(Storage::exists("public/images/" . $product->img)) {
                Storage::delete("public/images/" . $product->img);
            }
            Product::where('id',$id)->delete();
        } 
        return redirect()->Route('admin.products');
    }
    public function getimages(){
        $getfiles = Storage::allfiles('public/images/');
        $data = compact('getfiles');
        return view('admin.images-show')->with($data);
        // dd($getfiles);
    }

    public function login(){
        return view('admin.login');
    }

    public function logincheck(request $Request){
        $validate = $Request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::Where('name', '=', $Request['username'])->first();
        if($user){
            if(Hash::check($Request->password, $user->password)){
                session()->put('isLogin', $user->id);
                return redirect()->route('admin.invoice');
            } else {
                
                return redirect()->back()->with('fail', 'Password not Matches');
            }
        } else {
            return back()->with('fail', 'UserName is not registered');
        }
    }
    public function logout(){
        session()->flush();
        return redirect()->route('login.view');
    }
}
