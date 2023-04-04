<?php

namespace App\Http\Controllers;
use App\Models\Timeline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     
    public function timelineHome()
    {
        $tasks = Timeline::orderBy('created_at', 'asc')->get();
        return view('2timeline', [
            'subtitles' => $tasks
        ]);
    }

    public function sendPost(Request $req){
       
            $req->validate([
                'subtitle' => 'required|max:50',
            ]);

            Timeline::create([
                'name' => Auth::user()->name,
                'subtitle' => $req->subtitle,
            ]);

             return back();
    }
     public function showSendRequest(){
            //現在のuser取得
        $name = \Auth::user()->name; 
            //現在のuserとsenderが一致するものを取得
        $showRequest = DB::table('timelines')
            ->where(
                'sender','=',$name )
            ->get();
            
        return view('showRequestByMe',compact('showRequest'));
    }
        public function showDoneList(){
            $showDone=x;
           
             return view('showDoneList',compact('showDone'));
    
        }
}
