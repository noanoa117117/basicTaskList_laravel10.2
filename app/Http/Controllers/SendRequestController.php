<?php

namespace App\Http\Controllers;
use App\Models\Timeline;
use App\Models\User;

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
         $allUsers = User::groupBy('name')
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

            $userId = User::groupBy('id')
                ->where('name','=',$req->name)
                ->value('id');
            
            Timeline::create([
                'name' => $req->name,
                'user_id' => $userId,
                'sender' => \Auth::user()->name,
                'subtitle' => $req->subtitle,
                'body' => $req->body,
            ]);
        return redirect('/show_sendrequest');//依頼済み一覧
    }

    public function showSendRequest(){
            //現在のuser取得
        $name = \Auth::user()->name; 
            //現在のuserとsenderが一致するものを取得
        $showRequest = \DB::table('timelines')
            ->where(
                'sender','=',$name )
            ->where(
                'deleted_at','=',NULL)
            ->get();
            
        return view('showRequestByMe',compact('showRequest'));
    }
}
