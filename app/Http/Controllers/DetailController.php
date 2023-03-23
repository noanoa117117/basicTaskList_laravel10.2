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


    public function update(Request $req){
        
     $req->validate([
                'update' => 'required|max:15',
     ]);
        $edit = Timeline::find($req->id);
        $edit->tweet=$req->update;
        $edit->update();
        return redirect('/');
        
    }
    
}

