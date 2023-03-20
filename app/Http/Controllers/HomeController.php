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
    public function index()
    {
        return view('home');
    }

    public function timeLineList(){

        $timelines = Timeline::latest()->get();
        return view('timeline',[
            'tweets' => $timelines,
        ]);
    }

    public function sendPost(Request $req){
       
            $req->validate([
                'tweet' => 'required|max:50',
            ]);

            Timeline::create([
                'user_id' => Auth::user()->id,
                'name' => Auth::user()->name,
                'tweet' => $req->tweet,
            ]);

             return back();
    }
}
