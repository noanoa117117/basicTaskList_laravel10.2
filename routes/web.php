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
    $tasks = Timeline::orderBy('created_at', 'asc')->get();
    
    return view('timeline', [
        'tweets' => $tasks
    ]);
}); 

/*一覧画面

Route::get('/', [HomeController::class, 'timeLineList'])->name('timeline');
*/
/*投稿*/ 
 Route::post('/timeline', [HomeController::class, 'sendPost'])->name('timeline');

/*詳細画面処理*/ 
Route::get('/show/{id}', [DetailController::class, 'detail'])->name('detail');

/*update処理 */
Route::post('timeline/edit/{id}',[DetailController::class, 'update']);
    

/*delete処理*/ 
Route::delete('/timeline/{id}', function (Request $req) {
    Timeline::find($req->id)->delete();
    return redirect('/');
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
