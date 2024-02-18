<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contacts;
use App\Models\Product;

class Sample extends Controller
{
    public function index(){
            
        }
    

    public function rubel(){
        // hasOne relationship
        $FindUsers = User::find('1');
        echo $FindUsers->name . "<br>";
        echo $FindUsers->contact->phone . "<br>";
        echo $FindUsers->contact->images->name . "<br>";
        // BelongsTo relationship
        $FindContacts = Contacts::find('1');
        echo $FindContacts->user->password . '<br> <br>';
        // hasMany relationship
        foreach ($FindUsers->contacts as $value) {
            echo $value->phone . '<br>';
        }
    }
}


