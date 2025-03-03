<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function (): void {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('users', function () {
        return view('pages.users.index', [
            'data' => User::all(['id', 'name', 'email', 'created_at', 'updated_at']),
            'columns' => [
                ['data' => 'id', 'title' => 'ID'],
                ['data' => 'name', 'title' => 'Name'],
                ['data' => 'email', 'title' => 'Email'],
                ['data' => 'created_at', 'title' => 'Created At'],
                ['data' => 'updated_at', 'title' => 'Updated At'],
            ],
            'select' => true,
        ]);
    })->name('users.index');
    Route::view('roles', 'pages.roles.index')->name('roles.index');
    Route::view('permissions', 'pages.permissions.index')->name('permissions.index');
});

Route::middleware(['auth'])->group(function (): void {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
