<?php
use App\Models\Timeline;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
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
    $tasks = Timeline::orderBy('created_at', 'desc')->get();
    return view('timeline', [
        'subtitles' => $tasks
    ]);
}); 
/*ログアウト*/
 Route::get('/logout', 'Auth\LoginController@logout');

/*ログイン後
Route::get('/', function () {
    $tasks = Timeline::orderBy('created_at', 'asc')->get();
    
    return view('timeline', [
        'tweets' => $tasks
    ]);
}); */

/*値受け渡しtest

Route::get('/', function(){
    $test = echo $
});
*/
/*投稿*/ 
 Route::post('/timeline', [HomeController::class, 'sendPost'])->name('timeline');

/*detail画面遷移*/ 
Route::get('/show/{id}', [DetailController::class, 'detail'])->name('detail');

/*detail->update処理 */
Route::post('timeline/edit/{id}',[DetailController::class, 'update']);
    
/*detail->delete処理*/ 
Route::delete('/timeline/{id}',[DetailController::class, 'delete']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
