<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PlayerScoreController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\UserTournamentController;
use App\Http\Controllers\UserMatchController;
use App\Http\Controllers\UserLeaderboardController;
use App\Http\Controllers\FantasyTeamController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\RecycleBinController;





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
    [AdminController::class, 'index']
)->middleware(['auth','admin'])
 ->name('admin.dashboard');

require __DIR__.'/auth.php';


Route::middleware(['auth','admin'])->prefix('admin')->group(function () {

    Route::resource('tournaments', TournamentController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('players', PlayerController::class);
    //Route::resource('matches', MatchController::class);
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

Route::middleware(['auth','admin'])
    ->prefix('admin')
    ->group(function () {

        Route::resource('tournaments', TournamentController::class);

        Route::post(
            'tournaments/{tournament}/matches',
            [MatchController::class, 'storeTournamentMatch']
        )->name('tournaments.matches.store');

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


 Route::get(

    '/leaderboard/generate/{matchId}',

    [LeaderboardController::class, 'generate']

)->name('leaderboard.generate');


Route::get(

    '/leaderboard/{matchId}',

    [LeaderboardController::class, 'index']

)->name('leaderboard.index');

Route::get(
    '/teams/{team}',
    [TeamController::class, 'show']
)->name('teams.show');

// managing players
Route::get(

    '/matches/{matchId}/players',

    [MatchController::class, 'managePlayers']

)->name('matches.players.manage');


Route::post(

    '/matches/{matchId}/players',

    [MatchController::class, 'savePlayers']

)->name('matches.players.save');


Route::get(

    '/admin/global-leaderboard',

    [LeaderboardController::class, 'globalLeaderboard']

)->middleware(['auth', 'admin'])
 ->name('leaderboard.global');


 Route::get(
    '/user/dashboard',
    [UserDashboardController::class, 'index']
)->middleware('auth')
 ->name('user.dashboard');

// user side
Route::get(

    '/user/tournaments',

    [UserTournamentController::class, 'index']

)->name('user.tournaments');


// user



 Route::get(

    '/user/tournament/{id}/matches',

    [UserMatchController::class, 'index']

)->name('user.matches');

Route::get(

    '/user/leaderboard',

    [UserLeaderboardController::class, 'index']

)->name('user.leaderboard');


Route::get(

    '/user/match/{matchId}/create-team',

    [FantasyTeamController::class, 'create']

)->name('fantasy.team.create');


Route::post(

    '/user/match/{matchId}/store-team',

    [FantasyTeamController::class, 'store']

)->name('fantasy.team.store');

Route::get(

    '/user/my-teams',

    [FantasyTeamController::class, 'myTeams']

)->name('fantasy.myteams');

Route::get(
    '/user/my-team/{teamId}',
    [FantasyTeamController::class, 'show']
)->name('fantasy.team.show');










// recycle
Route::get(
    '/recycle-bin',
    [RecycleBinController::class, 'index']
)->name('recycle.bin');













