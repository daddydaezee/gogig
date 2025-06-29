<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;

// 1. Public Home and Event Listings
Route::get('/', function() {
    return view('welcome');
})->name('home');

Route::get('/events', [EventController::class, 'index'])->name('events.index');

// CREATE MUST BE BEFORE SHOW!
Route::middleware(['auth'])->group(function () {
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::post('/events/{event}/sponsorship/request', [EventController::class, 'requestSponsorship'])->name('sponsorships.request');
});

// This must be after /events/create etc.
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// 2. Auth routes (Breeze, Fortify, Jetstream, etc)
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::put('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');

// 3. Authenticated user routes (any logged in user)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Media (performer)
    Route::get('/media', [MediaController::class, 'index'])->name('media.index');
    Route::post('/media', [MediaController::class, 'store'])->name('media.store');
    Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');

    // Performer apply to event
    Route::post('/events/{event}/apply', [EventController::class, 'apply'])->name('events.apply');

    // Applications (Organizer - check in controller)
    Route::get('/events/{event}/applications', [ApplicationController::class, 'listForEvent'])->name('applications.list');
    Route::post('/applications/{application}/approve', [ApplicationController::class, 'approve'])->name('applications.approve');
    Route::post('/applications/{application}/reject', [ApplicationController::class, 'reject'])->name('applications.reject');

    Route::post('/user/{id}/review', [ReviewController::class, 'store'])->name('user.review');

    // Sponsor Directory
    Route::get('/sponsors', [SponsorController::class, 'index'])->name('sponsors.index');
    Route::get('/archive', [EventController::class, 'archive'])->name('events.archive');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::get('/user/{id}/profile', [ProfileController::class, 'showPublic'])->name('profile.public');
});

// 4. Admin-only routes (role checks done inside controller!)
Route::middleware(['auth'])->prefix('admin')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/organizers', [AdminController::class, 'organizerList'])->name('admin.organizers');
    Route::get('/sponsor-requests', [AdminController::class, 'sponsorRequests'])->name('admin.sponsor.requests');
    Route::post('/sponsor-request/{id}/approve', [AdminController::class, 'approveSponsorRequest'])->name('admin.sponsor-approve');
    Route::post('/sponsor-request/{id}/reject', [AdminController::class, 'rejectSponsorRequest'])->name('admin.sponsor-reject');
});
