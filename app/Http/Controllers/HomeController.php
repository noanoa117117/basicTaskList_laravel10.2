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
     
}
