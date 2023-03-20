<?php

namespace App\Http\Controllers;
use App\Models\Timeline;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detail($timelineId){
        
        $timeline = Timeline::find($timelineId);
            return view('detail',compact('timeline'));
        }
}

