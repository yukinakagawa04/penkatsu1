<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/post/mypage', [PostController::class, 'mydata'])->name('post.mypage');
    Route::resource('post', PostController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //post検索画面
    Route::get('/tweet/search/input', [SearchController::class, 'create'])->name('search.input');
    //post検索処理
    Route::get('/tweet/search/result', [SearchController::class, 'index'])->name('search.result');

});

require __DIR__.'/auth.php';
