<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/request-quote', [QuoteController::class, 'show'])->name('quote');
Route::post('/request-quote', [QuoteController::class, 'submit'])->name('quote.submit');

Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

Route::get('/locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.attempt');
    Route::post('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');

        Route::resource('pages', \App\Http\Controllers\Admin\PageController::class)->except(['show']);
        Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class)->except(['show']);
        Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class)->except(['show']);
        Route::resource('blog', \App\Http\Controllers\Admin\BlogController::class)->except(['show']);
        Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class)->except(['show']);
        Route::resource('team', \App\Http\Controllers\Admin\TeamController::class)->except(['show']);
        Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class)->except(['show']);

        Route::get('messages', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}', [\App\Http\Controllers\Admin\MessageController::class, 'show'])->name('messages.show');
        Route::patch('messages/{message}', [\App\Http\Controllers\Admin\MessageController::class, 'update'])->name('messages.update');
        Route::delete('messages/{message}', [\App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('messages.destroy');

        Route::get('quotes', [\App\Http\Controllers\Admin\QuoteController::class, 'index'])->name('quotes.index');
        Route::get('quotes/{quote}', [\App\Http\Controllers\Admin\QuoteController::class, 'show'])->name('quotes.show');
        Route::patch('quotes/{quote}', [\App\Http\Controllers\Admin\QuoteController::class, 'update'])->name('quotes.update');
        Route::delete('quotes/{quote}', [\App\Http\Controllers\Admin\QuoteController::class, 'destroy'])->name('quotes.destroy');

        Route::get('media', [\App\Http\Controllers\Admin\MediaController::class, 'index'])->name('media.index');
        Route::post('media', [\App\Http\Controllers\Admin\MediaController::class, 'store'])->name('media.store');
        Route::patch('media/{medium}', [\App\Http\Controllers\Admin\MediaController::class, 'update'])->name('media.update');
        Route::delete('media/{medium}', [\App\Http\Controllers\Admin\MediaController::class, 'destroy'])->name('media.destroy');

        Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::patch('settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');

        Route::get('translations', [\App\Http\Controllers\Admin\TranslationController::class, 'index'])->name('translations.index');
        Route::patch('translations', [\App\Http\Controllers\Admin\TranslationController::class, 'update'])->name('translations.update');
    });
});
