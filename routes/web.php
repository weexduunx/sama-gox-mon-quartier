<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\Resident\Home as ResidentHome;
use App\Livewire\Resident\RequestCertificate;
use App\Livewire\Resident\TrackComplaint;
use App\Livewire\Admin\Dashboard as AdminDashboard;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    // Route::prefix('admin')->name('admin.') ->middleware(['auth', 'verified'])->group(function () {
    //     Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
    //     // The individual tabs are handled by the Dashboard component itself
    // });
    

Route::middleware(['auth'])->group(function () {
    
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// Resident routes
Route::prefix('resident')->name('resident.')->group(function () {
    Route::get('/', ResidentHome::class)->name('home');
    Route::get('/request-certificate', RequestCertificate::class)->name('request-certificate');
    Route::get('/track-complaint', TrackComplaint::class)->name('track-complaint');
});

// Admin routes (you might want to add authentication/middleware here)

// Default route (optional, e.g., redirect to resident home)
// Route::get('/', function () {
//     return redirect()->route('resident.home');
// });
require __DIR__.'/auth.php';
