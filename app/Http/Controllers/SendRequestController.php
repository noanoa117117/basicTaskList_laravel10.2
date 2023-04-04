<?php

namespace App\Http\Controllers;
use App\Models\Timeline;

use Illuminate\Http\Request;

class SendRequestController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

     public function showRequestForm()
    {   /*現在のLoginUserを取り出し、除外*/ 
        $user = \Auth::user()->name;
         $allUsers = Timeline::groupBy('name')
            ->where('name','!=',$user)
            ->get(['name']);

        return view('sendrequest',compact('allUsers'));
    }
    public function submitRequest(Request $req)
    {
        $req->validate([
                'name' => 'required',
                'subtitle' => 'required|max:50',
                'body' => 'max:500',
            ]);
            Timeline::create([
                'name' => $req->name,
                'sender' => \Auth::user()->name,
                'subtitle' => $req->subtitle,
                'body' => $req->body,
            ]);
        return redirect('/home');//依頼済み一覧
    }
}
