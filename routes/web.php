<?php
use App\Models\Timeline; 
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*一覧画面*/ 
Route::get('/', function () {
    /*Timelineはmodel*/ 
    $timelines = Timeline::orderBy('created_at', 'asc')->get();//ソート済みのタスク
    
    return view('timeline',[
        'timeline'=> $timelines
    ]);
});

/*投稿*/ 
Route::post('/timeline', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);
    if($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrores($validator);
    }
    $timeline = new Timeline;
    $timeline->name = $request->input('name');
    $timeline->save();

    return redirect('/');
});

/*詳細画面処理*/ 
Route::get('/show/{id}', [BookController::class, 'show'])->name('book.show');

/*delete処理*/ 
Route::delete('/timeline/{timeline}', function (Timeline $timeline) {
    $timeline->delete(); //暗黙の結合

    return redirect('/');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
