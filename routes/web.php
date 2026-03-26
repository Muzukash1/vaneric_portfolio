<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ChatbotController;

/*
|--------------------------------------------------------------------------
| Portfolio Routes
|--------------------------------------------------------------------------
*/

// Home page
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// Contact form
Route::post('/contact', [PortfolioController::class, 'sendContact'])->name('contact.send');

/*
|--------------------------------------------------------------------------
| Chatbot Routes
|--------------------------------------------------------------------------
*/

// AJAX endpoint — called by the chatbot JS widget
Route::post('/chatbot/message', [ChatbotController::class, 'message'])->name('chatbot.message');
