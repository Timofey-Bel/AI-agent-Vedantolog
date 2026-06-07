# 🤖 Vedantolog AI

Современный чат-интерфейс для работы с AI-агентом Timeweb Cloud, специализирующимся на ведической философии и культуре.

## ✨ Возможности

- ✅ Красивый UI с современным дизайном
- ✅ Контекстные диалоги (сохранение истории в localStorage)
- ✅ **Поддержка Markdown** (заголовки, списки, ссылки, код, форматирование)
- ✅ **Двуязычный интерфейс** (русский/английский)
- ✅ **Эффект печати** для ответов AI
- ✅ **История чатов** с возможностью удаления и восстановления
- ✅ Работает без VPN (нативный API Timeweb)
- ✅ Адаптивный дизайн (мобильные устройства + iPhone safe area)
- ✅ Боковая панель с историей диалогов
- ✅ Индикатор печатания с анимацией
- ✅ Обработка ошибок и таймаутов
- ✅ RAG база знаний из 100+ книг по ведической философии

## 🚀 Быстрый старт

### 1. Установка зависимостей

```bash
php composer.phar install
```

### 2. Настройка

Создайте файл `.env` на основе `.env.example`:

```bash
copy .env.example .env
```

Укажите ваши данные Timeweb в `.env`:
- `TIMEWEB_AGENT_ID` - ID вашего AI агента
- `TIMEWEB_API_TOKEN` - API токен Timeweb Cloud
- `TIMEWEB_API_URL` - URL API (по умолчанию уже установлен)
- `APP_NAME` - название приложения (по умолчанию "Vedantolog AI")

### 3. Генерация ключа приложения

```bash
php artisan key:generate
```

### 4. Запуск

```bash
php artisan serve
```

Откройте: **http://localhost:8000**

## 📁 Структура проекта

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── ChatController.php      # Логика чата и API интеграция
│   │   └── Middleware/
│   │       └── SecurityHeaders.php      # CORS и заголовки безопасности
│   └── Models/
│       └── User.php
├── config/
│   ├── app.php                         # Конфигурация приложения
│   └── timeweb.php                     # Конфигурация Timeweb API
├── database/
│   └── database.sqlite                 # SQLite база данных
├── public/
│   ├── sitemap.xml                     # Карта сайта
│   ├── vedantolog-icon-white-bg.png   # Логотип
│   └── index.php
├── resources/
│   └── views/
│       ├── chat.blade.php              # Главный UI чата
│       └── welcome.blade.php           # Приветственная страница
├── routes/
│   └── web.php                         # Маршруты приложения
├── .env.example                        # Пример конфигурации
├── .env                                # Конфигурация (создайте сами)
└── composer.json                       # PHP зависимости
```

## 🎯 Использование

1. Откройте http://localhost:8000
2. Напишите вопрос в чат (на русском или английском)
3. AI агент ответит на основе RAG базы знаний по ведической философии
4. Контекст диалога сохраняется автоматически в localStorage
5. Используйте боковую панель для навигации по истории диалогов
6. Переключайте язык интерфейса кнопкой в боковой панели
7. Удаляйте ненужные диалоги кнопкой корзины

### Особенности интерфейса

- **Форматирование Markdown**: AI поддерживает **жирный**, *курсив*, `код`, ссылки, заголовки и списки
- **Эффект печати**: ответы появляются с анимацией печати
- **История**: все диалоги сохраняются и группируются по дате (Сегодня, Вчера, Ранее)
- **Мобильная адаптация**: оптимизирован для iPhone (safe area) и Android
- **Кнопка "На главную"**: быстрый переход на https://vedantolog.org

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

### Изменить название приложения
В `.env`:
```env
APP_NAME="Vedantolog AI"
```

### Изменить цвета темы
В `resources/views/chat.blade.php` найдите и измените:
```css
/* Основной цвет акцента */
color: rgb(0 144 216);  /* Голубой цвет Vedantolog */

/* Кнопка отправки */
background: rgb(0 144 216);
```

### Добавить новые языки
В `resources/views/chat.blade.php` найдите объект `translations` и добавьте новый язык:
```javascript
const translations = {
    ru: { /* русский */ },
    en: { /* английский */ },
    de: { /* ваш новый язык */ }
};
```

## 🐛 Troubleshooting

### Ошибка 401 Unauthorized
- Проверьте `TIMEWEB_API_TOKEN` в `.env`
- Убедитесь, что токен не истек в панели Timeweb Cloud

### Ошибка 404 Not Found
- Проверьте `TIMEWEB_AGENT_ID` в `.env`
- Убедитесь, что агент активен в панели Timeweb

### CSRF Token Mismatch
```bash
php artisan cache:clear
php artisan config:clear
```

### AI модель перегружена (503)
- Это нормально при высокой нагрузке на Timeweb API
- Повторите запрос через 1-2 минуты
- Проверьте лимиты вашего тарифа

### История диалогов не сохраняется
- Проверьте, что в браузере включен localStorage
- Очистите кеш браузера и перезагрузите страницу
- В режиме инкогнито история не сохраняется после закрытия

## 📦 Технологии

### Backend
- **Laravel 11** - PHP фреймворк
- **SQLite** - легковесная база данных для сессий
- **Timeweb Cloud AI Agent API** - интеграция с AI

### Frontend
- **Vanilla JavaScript** - без фреймворков для максимальной производительности
- **Blade Templates** - шаблонизатор Laravel
- **CSS3** - современные анимации и адаптивный дизайн
- **localStorage** - клиентское хранилище для истории чатов

### Безопасность
- CORS заголовки
- XSS Protection
- Content Security Policy (CSP)
- CSRF Protection
- HTML escaping для предотвращения инъекций

## 🌟 Особенности реализации

- **Без кеширования**: каждый запрос идет напрямую к AI для актуальности ответов
- **Контекстные диалоги**: поддержка `parent_message_id` для связанных вопросов
- **Markdown рендеринг**: форматирование текста в реальном времени
- **Двуязычность**: полная локализация интерфейса (RU/EN)
- **Адаптивность**: оптимизация для всех устройств включая iPhone с вырезами

## 🔗 Полезные ссылки

- [Документация Timeweb AI Agents](https://timeweb.cloud/docs/ai-agents)
- [Laravel Documentation](https://laravel.com/docs)
- [Vedantolog Website](https://vedantolog.org)

## 🎉 Готово!

Чат полностью готов к использованию и развёртыванию!

**Основные команды:**
```bash
# Запуск dev сервера
php artisan serve

# Очистка кеша
php artisan cache:clear
php artisan config:clear

# Обновление зависимостей
php composer.phar update
```
