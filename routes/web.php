<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('clubs/{club:username}', \App\Livewire\Club\Show::class)
    ->name('clubs.show');

Route::get('/language/{locale}', function ($locale) {
    session()->put('lang', $locale);

    return redirect()->back();
})->name('locale');

Route::get('/club/onboarding', \App\Livewire\Club\Onboarding::class)->middleware(['auth'])->name('club.onboarding');

Route::get('/gamer/onboarding', \App\Livewire\Gamer\Onboarding::class)->middleware(['auth'])->name('gamer.onboarding');

Route::get('/', App\Livewire\Home\Index::class)->name('home.index');

Route::get('/competitions', App\Livewire\Competition\Index::class)->name('competitions.index');

Route::get('competitions/{competition:slug}', \App\Livewire\Competition\Show::class)
    ->name('competitions.show');

Route::get('clubs', \App\Livewire\Club\Index::class)
    ->name('clubs.index');


Route::get('gamer/{gamer:username}', \App\Livewire\Gamer\Show::class)
    ->name('gamer.show');

Route::get('/news', \App\Livewire\News\Index::class)->name('news.index');
Route::get('/news/{news:slug}', \App\Livewire\News\Show::class)->name('news.show');
Route::get('/contact', \App\Livewire\Contact\Index::class)->name('contact.index');


Route::get('send/email', function () {
    // Ship the order...
    $user = auth()->user();

    Mail::to($user->email)->send(new \App\Mail\WelcomeMail($user));

    return 'Email sent successfully!';
});
