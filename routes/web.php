<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\Home\Index::class)->name('home.index');

Route::get('/competitions', App\Livewire\Competition\Index::class)->name('competitions.index');

Route::get('competition/{competition:slug}', \App\Livewire\Competition\Show::class)
    ->name('competition.show');

Route::get('club/{club:username}', \App\Livewire\Club\Show::class)
    ->name('club.show');

Route::get('gamer/{gamer:username}', \App\Livewire\Gamer\Show::class)
    ->name('gamer.show');

Route::get('/news', \App\Livewire\News\Index::class)->name('news.index');
Route::get('/news/{news:slug}', \App\Livewire\News\Show::class)->name('news.show');

Route::get('/club/onboarding', \App\Livewire\Club\Onboarding::class)->middleware(['auth'])->name('club.onboarding');
Route::get('/gamer/onboarding', \App\Livewire\Gamer\Onboarding::class)->middleware(['auth'])->name('gamer.onboarding');

