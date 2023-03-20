<?php
use App\Models\Timeline;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();
Route::get('/', function () {
    $tasks = Timeline::orderBy('created_at', 'asc')->get();
    
    return view('timeline', [
        'tweets' => $tasks
    ]);
});

/*一覧画面*/ 
Route::get('/home',[HomeController::class,'index'])->name('timeline');
Route::get('/timeline', [HomeController::class, 'timeLineList'])->name('timeline');
/*投稿*/ 
 Route::post('/timeline', [HomeController::class, 'sendPost'])->name('timeline');

// Route::post('/timeline', function (Request $request) {
//     $validator = Validator::make($request->all(), [
//         'name' => 'required|max:255|min:1',
//     ]);
//     if($validator->fails()){
//         return redirect('/')
//             ->withInput()
//             ->withErrores($validator);
//     }
//     $timeline = new Timeline;
//     $timeline->name = $request->input('name');
//     $timeline->save();

//     return redirect('/');
// });

/*詳細画面処理*/ 
Route::get('/show/{timelineId}', [DetailController::class, 'detail'])->name('detail');

/*delete処理*/ 
Route::delete('/timeline/{timeline}', function (Timeline $timeline) {
    $timeline->delete(); //暗黙の結合

    return redirect('/');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
