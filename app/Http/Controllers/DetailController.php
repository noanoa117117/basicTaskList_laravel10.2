<?php

namespace App\Http\Controllers;
use App\Models\Timeline;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detail($id){
        
        $detail = Timeline::find($id)->first();
            return view('detail',compact('detail'));
        }
}

