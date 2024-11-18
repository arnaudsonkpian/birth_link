<?php

use App\Http\Controllers\AjoutDesAmisController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AmisSuggererController;
use App\Http\Controllers\AnniversaireAvenirController;
use App\Http\Controllers\AnniversairePasseController;
use App\Http\Controllers\CardBitthdayController;
// use App\Http\Controllers\DashbordController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemepersonController;
use App\Http\Controllers\ThemesPopulairesController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');

});
// Routes de connexion et d'inscription protégées par le middleware 'guest'
Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return Inertia::render('Login');
    })->name('login');

    Route::get('/register', function () {
        return Inertia::render('Register');
    })->name('register');

    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Routes accessibles uniquement pour les utilisateurs authentifiés
Route::middleware(['auth'])->group(function () {
    Route::get('/ajoutdesamis', [AjoutDesAmisController::class, 'index'])->name('ajoutdesamis');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/udpate', [ProfileController::class, 'update'])->name('profile.update');
});

 


// Route::get('/dashboard', [DashbordController::class, 'index'])->name('dashbord');
Route::get('/suggestion-des-amis', [AmisSuggererController::class, 'index'])->name('suggestion-des-amis');

Route::get('/notification', [NotificationController::class, 'index'])->name('notification');

Route::get('/anniversaire-avenir', [AnniversaireAvenirController::class, 'index'])->name('anniversaire-avenir');
Route::get('/anniversaire-passe', [AnniversairePasseController::class, 'index'])->name('anniversaire-passe');

Route::get('/confirmation-des-amis', [AmisSuggererController::class, 'confirmation'])->name('confirmation-des-amis');
Route::get('/friends', [FriendController::class, 'index'])->name('friends');

Route::get('/ajoutdesamis', [AjoutDesAmisController::class, 'index'])->name('ajoutdesamis');
// Route::get('/dashboard', [DashbordController::class, 'index'])->name('dashbord');
Route::get('/anniversaire-avenir', [AnniversaireAvenirController::class, 'index'])->name('anniversaire-avenir');
Route::get('/anniversaire-passe', [AnniversairePasseController::class, 'index'])->name('anniversaire-passe');
Route::get('/theme', [ThemepersonController::class, 'index'])->name('theme');
// Route::get('/card', [CardBitthdayController::class, 'index'])->name('card');




Route::get('/themes-populaires', [ThemesPopulairesController::class, 'index'])->name('themes-populaires');

Route::post('/store/theme-poulaires', [ThemesPopulairesController::class, 'store'])->name('store-theme');
Route::get('/themes-populaires', [ThemesPopulairesController::class, 'getCards'])->name('themes-populaires');
