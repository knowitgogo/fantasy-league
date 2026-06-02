<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PlayerScoreController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\UserMatchController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    if(Auth::user()->role == 'admin'){
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/admin/dashboard',
    [Admincontroller::class, 'index']
)->middleware(['auth','admin'])
 ->name('admin.dashboard');

require __DIR__.'/auth.php';


Route::middleware(['auth','admin'])->prefix('admin')->group(function () {

    Route::resource('tournaments', TournamentController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('players', PlayerController::class);
    Route::resource('matches', MatchController::class);
    Route::resource('player-scores', PlayerScoreController::class);
});

Route::get(
    'matches/{match}/scores',
    [PlayerScoreController::class, 'manageScores']
)->name('matches.scores');

Route::post(
    'matches/{match}/scores',
    [PlayerScoreController::class, 'saveScores']
)->name('matches.scores.save');



Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware('auth')
 ->name('user.dashboard');


Route::get(
    '/admin/users',
    [UserManagementController::class, 'index']
)->middleware(['auth','admin'])
 ->name('admin.users');

// user
Route::get(
    '/matches',
    [UserMatchController::class, 'index']
)->middleware('auth')
 ->name('user.matches');