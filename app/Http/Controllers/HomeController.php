<?php

namespace App\Http\Controllers;
use App\Models\Timeline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;

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
        $tasks = Timeline::orderBy('created_at', 'desc')->get();
        return view('timeline', [
            'subtitles' => $tasks
        ]);
    }

    // public function timeLineList(){
    //     $timelines = Timeline::latest()->get();
    //     return view('timeline',[
    //         'tweets' => $timelines,
    //     ]);
    // }

    public function sendPost(Request $req){
       
            $req->validate([
                'subtitle' => 'required|max:50',
            ]);

            Timeline::create([
                'user_id' => Auth::user()->id,
                'name' => Auth::user()->name,
                'subtitle' => $req->subtitle,
            ]);

             return back();
    }
}
