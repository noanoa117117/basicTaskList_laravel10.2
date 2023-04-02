<?php

namespace App\Http\Controllers;
use App\Models\Timeline;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detail($id){
        //$idInt=(int)$id;
        $detail = Timeline::find($id);
        return view('detail',compact('detail'));
    }


    public function update(Request $req){
        
     $req->validate([
        'title' => 'required|max:50',
        'update' => 'max:50',
     ]);
        $edit = Timeline::find($req->id);
        $edit->subtitle=$req->title;
        $edit->body=$req->update;
        $edit->update();
        return redirect('/');
        
    }

    public function delete(Request $req) {
    Timeline::find($req->id)->delete();
    return redirect('/');
    }
}

