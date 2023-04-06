<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeline;

class DoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addDoneList(Request $req){
        Timeline::find($req->id)->delete();
        return redirect('/home');
    }

    public function showDoneList(){
        $showDone = Timeline::onlyTrashed()->get();
        return view('showDoneList',compact('showDone'));
    
    }
    public function oneDeleteDone(){
        Timeline::onlyTrashed()->forceDelete();
        return redirect('/showDoneList');
    }

    public function restoreDone(Timeline $sd){
        Timeline::onlyTrashed()->where('id',$sd->id)->restore();
        return redirect()->route('timeline');
    }
}
