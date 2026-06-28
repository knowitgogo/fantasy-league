<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
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

//API TESTING AND DATA TO FRONTEND
// PUBLIC ROUTES

Route::get(
    //for user
    '/tournaments-data',
    [UserTournamentController::class, 'tournamentsApi']
);

Route::get(
    '/matches-data/{id}',
    [UserMatchController::class, 'matchesApi']
);

Route::get(
    '/players-data/{matchId}',
    [FantasyTeamController::class, 'playingplayersApi']
);

Route::get(
    '/global-leaderboard-api',
    [LeaderboardController::class, 'globalLeaderboardApi']
);


// PROTECTED ROUTES

Route::middleware('auth:sanctum')->group(function () {

    Route::get(
        '/user-api',
        [AuthController::class, 'userApi']
    );

    Route::post(
        '/logout-api',
        [AuthController::class, 'logoutApi']
    );

    Route::get(
        '/dashboard-data',
        [UserDashboardController::class, 'dashboardApi']
    );

    Route::get(
        '/profile-api',
        [UserDashboardController::class, 'profileApi']
    );

    Route::post(
        '/store-team-api/{matchId}',
        [FantasyTeamController::class, 'storeApi']
    );

    Route::get(
        '/my-teams-api',
        [FantasyTeamController::class, 'myTeamsApi']
    );

    Route::delete(
        '/delete-team-api/{id}',
        [FantasyTeamController::class, 'deleteTeamApi']
    );

    Route::get(
        '/edit-team-api/{id}',
        [FantasyTeamController::class, 'editTeamApi']
    );

    Route::put(
        '/update-team-api/{id}',
        [FantasyTeamController::class, 'updateTeamApi']
    );

});


// admin routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get(
        '/admin/dashboard-api',
        [AdminController::class, 'dashboardApi']
    );
    Route::get(
        '/admin/players-api',
        [PlayerController::class, 'getPlayers']
    );
    Route::post(
        '/add-player-api',
        [PlayerController::class, 'addPlayerApi']
    );
    Route::post(
        '/update-player-api/{id}',
        [PlayerController::class, 'updatePlayerApi']
    );
    Route::delete(
        '/delete-player-api/{id}',
        [PlayerController::class, 'deletePlayerApi']
    );
    Route::get(
        '/admin/tournaments-api',
        [TournamentController::class, 'getTournaments']
    );
    Route::get(
        '/admin/teams-list-api',
        [TeamController::class, 'getTeams']
    );
    Route::post(
        '/add-tournament-api',
        [TournamentController::class, 'addTournamentApi']
    );
    Route::put(
        '/update-tournament-api/{id}',
        [TournamentController::class,'updateTournamentApi']
    );
    Route::delete(
        '/delete-tournament-api/{id}',
        [TournamentController::class,'deleteTournamentApi']
    );
    Route::get(
        '/admin/tournaments-api/{id}',
        [TournamentController::class, 'showTournamentApi']
    );
    Route::post(
        '/tournaments/{id}/matches-api',
        [MatchController::class, 'storeTournamentMatchApi']
    );
    Route::delete(
        '/delete-match-api/{id}',
        [MatchController::class, 'deleteMatchApi']
    );
    Route::put(
        '/update-match-api/{id}',
        [MatchController::class, 'updateMatchApi']
    );
    Route::get(
        '/matches/{id}/players-api',
        [MatchController::class, 'managePlayersApi']
    );

    Route::post(
        '/matches/{id}/save-players-api',
        [MatchController::class, 'savePlayersApi']
    );
    Route::get(
        '/matches/{id}/scores-api',
        [PlayerscoreController::class, 'manageScoresApi']
    );

    Route::post(
        '/matches/{id}/scores-api',
        [PlayerscoreController::class, 'saveScoresApi']
    );
    Route::post(
        '/matches/{id}/generate-leaderboard-api',
        [LeaderboardController::class, 'generateApi']
    );

    Route::get(
        '/matches/{id}/leaderboard-api',
        [LeaderboardController::class, 'indexApi']
    );
    // Route::get(
    //     '/matches/{id}/leaderboard-api',
    //     [LeaderboardController::class, 'indexApi']
    // );
    // Route::post(
    //     '/matches/{id}/generate-leaderboard-api',
    //     [LeaderboardController::class, 'generateApi']
    // );
    Route::get(
        '/AdminGlobal-leaderboard-api',
        [LeaderboardController::class, 'AdminGlobalLeaderboardApi']
    );
    Route::get(
        '/admin/teams-api',
        [TeamController::class, 'getTeamsApi']
    );

    Route::post(
        '/add-team-api',
        [TeamController::class, 'addTeamApi']
    );

    Route::put(
        '/update-team-api/{id}',
        [TeamController::class, 'updateTeamApi']
    );

    Route::delete(
        '/delete-team-api/{id}',
        [TeamController::class, 'deleteTeamApi']
    );
    Route::get(
        '/admin/teams-api/{id}',
        [TeamController::class, 'showApi']
    );
    Route::get(
        '/admin/users-api',
        [UserManagementController::class,'getUsersApi']
    );
    Route::get(
        '/admin/recycle-bin-api',
        [RecycleBinController::class,'indexApi']
    );
});