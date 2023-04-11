<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DoneController;
use App\Http\Controllers\SendRequestController;
use Illuminate\Support\Facades\Route;
use App\Models\Timeline;

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

Route::get('/', function () {
    return view('2welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
/*テスト
Route::get('/test',function(){
    $tasks = Timeline::orderBy('created_at', 'asc')->get();
        return view('showDoneList');
});*/

/*timeline一覧 */
Route::get('/home', [HomeController::class, 'timelineHome'])->name('timeline');

/*投稿*/ 
Route::post('/home', [HomeController::class, 'sendPost'])->name('timeline');

/*検索*/ 
Route::get('/home/serch', [HomeController::class, 'serch'])->name('serch');

Route::get('/logout', 'Auth\LoginController@logout');

/*detail画面遷移*/ 
Route::get('/show/{id}', [DetailController::class, 'detail'])->name('detail');

/*detail->update処理 */
Route::post('timeline/edit/{id}',[DetailController::class, 'update']);
    
/*detail->delete処理*/ 
Route::delete('/delete/{id}',[DetailController::class, 'delete'])->name('delete');

 /* userにtask送信画面表示*/
Route::get('/show_requestForm', [SendRequestController::class, 'showRequestForm'])->name('showRequestForm');

/* userにtask送信*/
Route::post('/submit_request', [SendRequestController::class, 'submitRequest'])->name('submitRequest');

/* userに送信したtask表示*/
Route::get('/show_sendrequest', [SendRequestController::class, 'showSendRequest'])->name('showsendRequest');

/*addDoneList */
Route::delete('/addDonelist/{id}', [DoneController::class, 'addDoneList'])->name('addDoneList');

/*DoneDelete1件 */
Route::delete('/oneDelete', [DoneController::class, 'oneDeleteDone'])->name('oneDelete');

/*DoneList表示 */
Route::get('/showDoneList', [DoneController::class, 'showDoneList'])->name('doneList');

/*DoneListから復元 */
Route::patch('/restore/{trashed}', [DoneController::class, 'restoreDone'])->name('restore');
require __DIR__.'/auth.php';
