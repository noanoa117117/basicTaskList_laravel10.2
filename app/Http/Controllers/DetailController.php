<?php

namespace App\Http\Controllers;
use App\Models\Timeline;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detail($id){
        //$idInt=(int)$id;
        $detail = Timeline::find($id);
        
        //$detail = \DB::select('select * from timelines where post_id', '=' ,$idInt)
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

    public function delete(Request $req) {
    Timeline::find($req->id)->delete();
    return redirect('/');
    }
}

