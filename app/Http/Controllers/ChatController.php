<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    /**
     * Отправка сообщения агенту Timeweb
     */
    public function sendMessage(Request $request)
    {
        // Rate limiting - 20 запросов в минуту на IP
        $key = 'chat:' . $request->ip();
        
        if (RateLimiter::tooManyAttempts($key, 20)) {
            $seconds = RateLimiter::availableIn($key);
            return response()->json([
                'success' => false,
                'error' => "Слишком много запросов. Попробуйте через {$seconds} секунд."
            ], 429);
        }

        RateLimiter::hit($key, 60);

        // Валидация
        $validated = $request->validate([
            'message' => 'required|string|max:5000',
            'parent_message_id' => 'nullable|string|max:255'
        ]);

        // Санитизация входных данных
        $message = strip_tags($validated['message']);
        $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

        $agentId = config('timeweb.agent_id');
        $token = config('timeweb.api_token');
        $apiUrl = config('timeweb.api_url');

        // Проверка конфигурации
        if (!$agentId || !$token || !$apiUrl) {
            Log::error('Timeweb configuration missing');
            return response()->json([
                'success' => false,
                'error' => 'Сервис временно недоступен'
            ], 503);
        }

        try {
            $response = Http::timeout(60) 
                ->connectTimeout(10)
                ->retry(3, 100) 
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $token,
                    'Content-Type' => 'application/json',
                ])
                ->post("{$apiUrl}/{$agentId}/call", [
                    'message' => $message,
                    'parent_message_id' => $validated['parent_message_id'] ?? null
                ]);

            if ($response->successful()) {
                $data = $response->json();
                
                // Санитизация ответа
                $responseMessage = $data['message'] ?? 'Нет ответа';
                $responseMessage = htmlspecialchars($responseMessage, ENT_QUOTES, 'UTF-8');
                
                return response()->json([
                    'success' => true,
                    'message' => $responseMessage,
                    'id' => $data['id'] ?? null,
                    'response_id' => $data['response_id'] ?? null,
                    'finish_reason' => $data['finish_reason'] ?? 'stop'
                ]);
            }

            // Логируем ошибку без деталей для пользователя
            Log::error('Timeweb API Error', [
                'status' => $response->status(),
                'ip' => $request->ip()
            ]);

            return response()->json([
                'success' => false,
                'error' => 'Не удалось получить ответ от AI'
            ], 500);

        } catch (\Exception $e) {
            Log::error('Timeweb API Exception', [
                'message' => $e->getMessage(),
                'ip' => $request->ip()
            ]);
            
            return response()->json([
                'success' => false,
                'error' => 'AI модель перегружена. Попробуйте через 1-2 минуты или обратитесь к администратору.'
            ], 503);
        }
    }

    /**
     * Показать страницу чата
     */
    public function index()
    {
        return view('chat');
    }
}
