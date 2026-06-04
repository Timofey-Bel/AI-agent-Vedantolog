# 🤖 AI Chat Vedantolog

Красивый чат-интерфейс для работы с AI-агентом Timeweb Cloud.

## ✨ Возможности

- ✅ Красивый UI как у ChatGPT
- ✅ Контекстные диалоги (сохранение истории)
- ✅ Работает без VPN (нативный API Timeweb)
- ✅ Адаптивный дизайн (мобильные устройства)
- ✅ Индикатор печатания
- ✅ Обработка ошибок
- ✅ RAG база знаний из 100 книг

## 🚀 Быстрый старт

### 1. Установка зависимостей

```bash
php composer.phar install
```

### 2. Настройка

Файл `.env` уже настроен с вашими данными Timeweb:
- `TIMEWEB_AGENT_ID` - ID агента
- `TIMEWEB_API_TOKEN` - API токен
- `TIMEWEB_API_URL` - URL API

### 3. Запуск

```bash
php artisan serve
```

Открой: **http://localhost:8000**

## 📁 Структура проекта

```
├── app/Http/Controllers/
│   └── ChatController.php      # Логика чата
├── config/
│   └── timeweb.php             # Конфигурация API
├── resources/views/
│   └── chat.blade.php          # UI чата
├── routes/
│   └── web.php                 # Маршруты
└── .env                        # Настройки (уже заполнен!)
```

## 🎯 Использование

1. Открой http://localhost:8000
2. Напиши вопрос в чат
3. Агент ответит на основе RAG базы знаний
4. Контекст диалога сохраняется автоматически

## 🔧 API Endpoints

### GET /
Главная страница с чатом

### POST /api/chat
Отправка сообщения агенту

**Request:**
```json
{
  "message": "Привет!",
  "parent_message_id": "uuid" // опционально
}
```

**Response:**
```json
{
  "success": true,
  "message": "Ответ агента",
  "id": "uuid",
  "response_id": "uuid",
  "finish_reason": "stop"
}
```

## 🎨 Кастомизация

### Изменить название
В `.env`:
```env
APP_NAME="Мой AI Чат"
```

### Изменить цвета
В `resources/views/chat.blade.php` найди:
```css
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
```

## 🐛 Troubleshooting

### Ошибка 401 Unauthorized
- Проверь `TIMEWEB_API_TOKEN` в `.env`
- Убедись что токен не истек

### Ошибка 404 Not Found
- Проверь `TIMEWEB_AGENT_ID` в `.env`
- Убедись что агент активен в панели Timeweb

### CSRF Token Mismatch
```bash
php artisan cache:clear
php artisan config:clear
```

## 📦 Технологии

- Laravel 13
- Timeweb Cloud AI Agent
- Vanilla JavaScript (без фреймворков)
- SQLite (для сессий)

## 🎉 Готово!

Чат полностью настроен и готов к использованию!

Время установки: **0 минут** (уже установлено) ⚡
