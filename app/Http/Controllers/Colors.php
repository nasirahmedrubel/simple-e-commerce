<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Color;

class Colors extends Controller
{
    //

    public function index(){
        $colors = Color::all();
        $data = compact('colors');
        return view('color')->with($data);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:40',
        ]);

        $color = new Color;
        $color->name = $request->name;
        $color->save();
        return redirect()->route('color.view');
    }
}
