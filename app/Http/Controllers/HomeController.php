<?php

namespace App\Http\Controllers;
use App\Models\Timeline;
use App\Models\User;
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
        $keyword="";
        $allUsers = User::groupBy('name')->get('name');
        $tasks = Timeline::orderBy('id','desc')->get();
         return view('2timeline', compact('tasks','allUsers','keyword'));
         
    }

    public function sendPost(Request $req){
       
            $req->validate([
                'subtitle' => 'required|max:50',
            ]);

            Timeline::create([
                'user_id'=>Auth::user()->id,
                'name' => Auth::user()->name,
                'subtitle' => $req->subtitle,
            ]);

             return back();
    }

    public function myTaskShow(){
        //現在のuser取得
        $name = \Auth::user()->name; 
            //現在のuserとsenderが一致するものを取得
        $showMyTask = \DB::table('timelines')
            ->where(
                'sender','!=',NULL)
            ->where(
                'name','=',$name)
            ->get();
            
        return view('myTaskShow',compact('showMyTask'));
    }
     
    // public function serch(Request $req){
    //      $req->validate([
    //             'keyword' => 'required',
    //         ]);
    //    $keyword = $req->keyword;
    //     $query = Timeline::query();

    //     if(!empty($keyword)) {
    //         $query->Where('subtitle', 'LIKE', "%{$keyword}%");
    //     }

    //     $tasks = $query->get();
    //     $allUsers = User::groupBy('name')->get('name');
        
    //     return view('2timeline',compact('tasks','allUsers'));
    // }

}
