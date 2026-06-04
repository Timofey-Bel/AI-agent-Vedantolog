<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

// Главная страница - чат
Route::get('/', [ChatController::class, 'index'])->name('chat');

// API для отправки сообщений
Route::post('/api/chat', [ChatController::class, 'sendMessage'])->name('chat.send');
