<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <style>
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', sans-serif;
            background: #0a0a0a;
            height: 100vh;
            height: 100dvh; /* Динамическая высота для мобильных */
            overflow: hidden;
            color: #ffffff;
            position: fixed;
            width: 100%;
        }

        .app-container {
            display: flex;
            height: 100vh;
            height: 100dvh; /* Динамическая высота для мобильных */
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: #1a1a1a;
            border-right: 1px solid #2a2a2a;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }

        .sidebar-header {
            padding: 20px 16px;
            border-bottom: 1px solid #2a2a2a;
        }

        .sidebar-logo {
            display: flex;
            align-items: start;
            gap: 12px;
            margin-bottom: 16px;
        }

        .sidebar-logo-icon {
            width: 32px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-logo-icon img,
        .sidebar-logo-icon svg {
            width: 100%;
            height: 100%;
        }

        .sidebar-logo-text {
            font-size: 16px;
            font-weight: 600;
            color: #00bcd4;
        }

        .new-chat-btn {
            width: 100%;
            padding: 12px 16px;
            background: linear-gradient(135deg, #00bcd4 0%, #0097a7 100%);
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #000;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s;
        }

        .new-chat-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 212, 170, 0.3);
        }

        .sidebar-content {
            flex: 1;
            overflow-y: auto;
            padding: 8px;
        }

        .sidebar-content::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-content::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-content::-webkit-scrollbar-thumb {
            background: #2a2a2a;
            border-radius: 3px;
        }

        .sidebar-content::-webkit-scrollbar-thumb:hover {
            background: #3a3a3a;
        }

        .history-section {
            margin-bottom: 16px;
        }

        .history-title {
            padding: 8px 12px;
            font-size: 11px;
            font-weight: 600;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .history-item {
            padding: 10px 12px;
            margin-bottom: 4px;
            border-radius: 8px;
            font-size: 14px;
            color: #999;
            cursor: pointer;
            transition: all 0.2s;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .history-item:hover {
            background: #2a2a2a;
            color: #fff;
        }

        .history-item.active {
            background: #2a2a2a;
            color: #00bcd4;
            font-weight: 500;
        }

        .history-item-icon {
            flex-shrink: 0;
            width: 16px;
            height: 16px;
            opacity: 0.6;
        }

        .chat-container {
            display: flex;
            flex-direction: column;
            flex: 1;
            height: 100vh;
            height: 100dvh;
            background: #0a0a0a;
            position: relative;
            overflow: hidden; /* Запрещаем скролл контейнера */
        }

        .chat-header {
            padding: 16px 24px;
            background: #1a1a1a;
            border-bottom: 1px solid #2a2a2a;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .chat-header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .chat-logo {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chat-logo img,
        .chat-logo svg {
            width: 100%;
            height: 100%;
        }

        .chat-title {
            font-size: 16px;
            font-weight: 600;
            color: #00bcd4;
        }

        .chat-messages {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 24px;
            max-width: 900px;
            width: 100%;
            margin: 0 auto;
            -webkit-overflow-scrolling: touch; /* Плавный скролл на iOS */
        }

        .chat-messages::-webkit-scrollbar {
            width: 6px;
        }

        .chat-messages::-webkit-scrollbar-track {
            background: transparent;
        }

        .chat-messages::-webkit-scrollbar-thumb {
            background: #2a2a2a;
            border-radius: 3px;
        }

        .chat-messages::-webkit-scrollbar-thumb:hover {
            background: #3a3a3a;
        }

        .message-group {
            display: flex;
            gap: 16px;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from { 
                opacity: 0; 
                transform: translateY(20px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }

        .message-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            font-weight: 600;
        }

        .message-group.user .message-avatar {
            background: #2a2a2a;
            color: #00bcd4;
        }

        .message-group.bot .message-avatar {
            background: transparent;
            border: 2px solid #00bcd4;
            padding: 4px;
        }

        .message-group.bot .message-avatar img,
        .message-group.bot .message-avatar svg {
            width: 20px;
            height: 20px;
        }

        .message-content {
            flex: 1;
        }

        .message-text {
            color: #e0e0e0;
            font-size: 15px;
            line-height: 1.7;
            white-space: pre-wrap;
            word-wrap: break-word;
        }

        .message-group.typing .message-text {
            color: #666;
            font-style: italic;
        }

        .message-group.error .message-text {
            color: #ff4444;
        }

        .welcome-message {
            text-align: center;
            padding: 80px 20px;
            color: #666;
        }

        .welcome-message h2 {
            font-size: 32px;
            font-weight: 600;
            color: #00bcd4;
            margin-bottom: 16px;
        }

        .welcome-message p {
            font-size: 16px;
            line-height: 1.6;
            color: #999;
        }

        .chat-input-wrapper {
            padding: 16px 24px;
            padding-bottom: max(20px, env(safe-area-inset-bottom));
            background: #1a1a1a;
            border-top: 1px solid #2a2a2a;
            flex-shrink: 0;
            position: sticky;
            bottom: 0;
            z-index: 20;
        }

        .chat-input-container {
            max-width: 900px;
            margin: 0 auto;
            position: relative;
        }

        .chat-input {
            display: flex;
            align-items: flex-end;
            gap: 12px;
            background: #0a0a0a;
            border: 1px solid #2a2a2a;
            border-radius: 12px;
            padding: 12px 16px;
            transition: all 0.2s;
        }

        .chat-input:focus-within {
            border-color: #00bcd4;
            box-shadow: 0 0 0 3px rgba(0, 212, 170, 0.1);
        }

        .chat-input textarea {
            flex: 1;
            border: none;
            background: transparent;
            font-size: 15px;
            line-height: 1.5;
            resize: none;
            outline: none;
            font-family: inherit;
            color: #fff;
            max-height: 200px;
            min-height: 24px;
        }

        .chat-input textarea::placeholder {
            color: #666;
        }

        .chat-input button {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #00bcd4 0%, #0097a7 100%);
            color: #000;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .chat-input button:hover:not(:disabled) {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 212, 170, 0.3);
        }

        .chat-input button:disabled {
            opacity: 0.4;
            cursor: not-allowed;
            transform: scale(1);
        }

        .chat-input button svg {
            width: 20px;
            height: 20px;
        }

        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 100;
            width: 40px;
            height: 40px;
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            color: #00bcd4;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            z-index: 40;
        }

        @media (max-width: 768px) {
            body {
                position: fixed;
                overflow: hidden;
            }

            .sidebar {
                position: fixed;
                left: 0;
                top: 0;
                height: 100vh;
                height: 100dvh;
                z-index: 50;
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .sidebar-overlay.show {
                display: block;
            }

            .sidebar-toggle {
                display: flex;
            }

            .chat-header {
                padding: 12px 16px 12px 60px;
                position: sticky;
                top: 0;
            }

            .chat-messages {
                padding: 16px;
                gap: 20px;
                padding-bottom: 20px;
            }

            .message-avatar {
                width: 32px;
                height: 32px;
                font-size: 14px;
            }

            .chat-input-wrapper {
                padding: 12px 16px;
                padding-bottom: max(12px, calc(env(safe-area-inset-bottom) + 8px));
                position: sticky;
                bottom: 0;
            }

            .chat-messages {
                padding-bottom: 20px;
            }

            .welcome-message {
                padding: 60px 20px;
            }

            .welcome-message h2 {
                font-size: 24px;
            }

            .welcome-message p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="app-container">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <div class="sidebar-logo-icon">
                        <img src="{{ asset('vedantolog-dark-Photoroom.png') }}" alt="Vedantolog" style="width: 100%; height: 100%; object-fit: contain;">
                    </div>
                    <div class="sidebar-logo-text">VEDANTOLOG</div>
                </div>
                <button class="new-chat-btn" onclick="startNewChat()">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Новый диалог
                </button>
            </div>
            <div class="sidebar-content" id="historyList">
                <!-- История будет добавляться динамически -->
            </div>
        </div>

        <!-- Overlay for mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

        <!-- Mobile toggle -->
        <button class="sidebar-toggle" onclick="toggleSidebar()">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Main Chat -->
        <div class="chat-container">
            <div class="chat-header">
                <div class="chat-header-left">
                    <div class="chat-logo">
                        <img src="{{ asset('vedantolog-dark-Photoroom.png') }}" alt="Vedantolog AI" style="width: 100%; height: 100%; object-fit: contain;">
                    </div>
                    <div class="chat-title">Vedantolog AI</div>
                </div>
            </div>

            <div class="chat-messages" id="messages">
                <div class="welcome-message">
                    <h2>Добро пожаловать в Vedantolog AI</h2>
                    <p>Задайте любой вопрос по ведической философии и культуре.<br>Я помогу найти ответ в базе знаний из 100 книг.</p>
                </div>
            </div>

            <div class="chat-input-wrapper">
                <div class="chat-input-container">
                    <form id="chatForm">
                        <div class="chat-input">
                            <textarea 
                                id="userInput" 
                                placeholder="Напишите ваш вопрос..." 
                                rows="1"
                                autocomplete="off"
                                required
                            ></textarea>
                            <button type="submit" id="sendBtn">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const messagesEl = document.getElementById('messages');
        const form = document.getElementById('chatForm');
        const input = document.getElementById('userInput');
        const sendBtn = document.getElementById('sendBtn');
        const historyList = document.getElementById('historyList');
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        let lastMessageId = null;
        let currentConversationId = null;
        let conversations = JSON.parse(localStorage.getItem('conversations') || '[]');

        // Auto-resize textarea
        input.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 200) + 'px';
        });

        function removeWelcome() {
            const welcome = document.querySelector('.welcome-message');
            if (welcome) welcome.remove();
        }

        function addMessage(content, role) {
            removeWelcome();
            
            const group = document.createElement('div');
            group.className = `message-group ${role}`;
            
            const avatar = document.createElement('div');
            avatar.className = 'message-avatar';
            
            if (role === 'user') {
                avatar.textContent = 'Вы';
            } else {
                avatar.innerHTML = `<img src="{{ asset('vedantolog-dark-Photoroom.png') }}" alt="AI" style="width: 100%; height: 100%; object-fit: contain;">`;
            }
            
            const contentDiv = document.createElement('div');
            contentDiv.className = 'message-content';
            
            const text = document.createElement('div');
            text.className = 'message-text';
            // Защита от XSS - используем textContent вместо innerHTML
            text.textContent = content;
            
            contentDiv.appendChild(text);
            group.appendChild(avatar);
            group.appendChild(contentDiv);
            
            messagesEl.appendChild(group);
            messagesEl.scrollTop = messagesEl.scrollHeight;
            
            return group;
        }

        function showTyping() {
            removeWelcome();
            
            const group = document.createElement('div');
            group.className = 'message-group bot typing';
            group.id = 'typing';
            
            const avatar = document.createElement('div');
            avatar.className = 'message-avatar';
            avatar.innerHTML = `<img src="{{ asset('vedantolog-dark-Photoroom.png') }}" alt="AI" style="width: 100%; height: 100%; object-fit: contain;">`;
            
            const contentDiv = document.createElement('div');
            contentDiv.className = 'message-content';
            
            const text = document.createElement('div');
            text.className = 'message-text';
            text.textContent = 'Печатаю ответ...';
            
            contentDiv.appendChild(text);
            group.appendChild(avatar);
            group.appendChild(contentDiv);
            
            messagesEl.appendChild(group);
            messagesEl.scrollTop = messagesEl.scrollHeight;
        }

        function hideTyping() {
            const typing = document.getElementById('typing');
            if (typing) typing.remove();
        }

        async function sendMessage(text) {
            addMessage(text, 'user');
            showTyping();
            
            input.disabled = true;
            sendBtn.disabled = true;

            try {
                const response = await fetch('/api/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        message: text,
                        parent_message_id: lastMessageId
                    })
                });

                // Проверяем что ответ валидный
                if (!response.ok) {
                    // Если ошибка 419 (CSRF token expired) - автоматически обновляем страницу
                    if (response.status === 419) {
                        hideTyping();
                        addMessage('Сессия истекла. Обновляю страницу...', 'error');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                        return;
                    }
                    throw new Error(`Сервер вернул ошибку: ${response.status}`);
                }
                
                // Проверяем что это JSON
                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    throw new Error('Сервер вернул неправильный формат ответа');
                }

                const data = await response.json();
                hideTyping();

                if (data.success) {
                    addMessage(data.message, 'bot');
                    lastMessageId = data.id;
                } else {
                    addMessage('Ошибка: ' + (data.error || 'Не удалось получить ответ'), 'error');
                }

            } catch (err) {
                hideTyping();
                let errorMsg = 'Ошибка соединения';
                
                if (err.message.includes('JSON')) {
                    errorMsg = 'Ошибка формата ответа. Попробуйте еще раз.';
                } else if (err.message.includes('Failed to fetch')) {
                    errorMsg = 'Нет соединения с сервером';
                } else {
                    errorMsg = 'Ошибка: ' + err.message;
                }
                
                addMessage(errorMsg, 'error');
                console.error('Ошибка:', err);
            } finally {
                input.disabled = false;
                sendBtn.disabled = false;
                input.style.height = 'auto';
                input.focus();
            }
        }

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const text = input.value.trim();
            if (!text) return;
            input.value = '';
            input.style.height = 'auto';
            sendMessage(text);
        });

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                form.requestSubmit();
            }
        });

        // Sidebar functions
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        }

        function startNewChat() {
            currentConversationId = null;
            lastMessageId = null;
            messagesEl.innerHTML = `
                <div class="welcome-message">
                    <h2>Добро пожаловать в Vedantolog AI</h2>
                    <p>Задайте любой вопрос по ведической философии и культуре.<br>Я помогу найти ответ в базе знаний из 100 книг.</p>
                </div>
            `;
            input.focus();
            
            // Remove active class from all history items
            document.querySelectorAll('.history-item').forEach(item => {
                item.classList.remove('active');
            });
        }

        function saveConversation(question, answer) {
            if (!currentConversationId) {
                currentConversationId = Date.now().toString();
                const conversation = {
                    id: currentConversationId,
                    title: question.substring(0, 50) + (question.length > 50 ? '...' : ''),
                    timestamp: new Date().toISOString(),
                    messages: []
                };
                conversations.unshift(conversation);
            }

            const conv = conversations.find(c => c.id === currentConversationId);
            if (conv) {
                conv.messages.push({ role: 'user', content: question });
                conv.messages.push({ role: 'bot', content: answer });
                localStorage.setItem('conversations', JSON.stringify(conversations));
                renderHistory();
            }
        }

        function loadConversation(id) {
            const conv = conversations.find(c => c.id === id);
            if (!conv) return;

            currentConversationId = id;
            messagesEl.innerHTML = '';

            conv.messages.forEach(msg => {
                addMessage(msg.content, msg.role);
            });

            // Mark as active
            document.querySelectorAll('.history-item').forEach(item => {
                item.classList.remove('active');
            });
            document.querySelector(`[data-id="${id}"]`)?.classList.add('active');
        }

        function renderHistory() {
            const today = new Date().toDateString();
            const yesterday = new Date(Date.now() - 86400000).toDateString();

            const todayConvs = conversations.filter(c => new Date(c.timestamp).toDateString() === today);
            const yesterdayConvs = conversations.filter(c => new Date(c.timestamp).toDateString() === yesterday);
            const olderConvs = conversations.filter(c => {
                const date = new Date(c.timestamp).toDateString();
                return date !== today && date !== yesterday;
            });

            let html = '';

            if (todayConvs.length > 0) {
                html += '<div class="history-section"><div class="history-title">Сегодня</div>';
                todayConvs.forEach(conv => {
                    html += `
                        <div class="history-item ${conv.id === currentConversationId ? 'active' : ''}" 
                             data-id="${conv.id}" 
                             onclick="loadConversation('${conv.id}')">
                            <svg class="history-item-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                            ${conv.title}
                        </div>
                    `;
                });
                html += '</div>';
            }

            if (yesterdayConvs.length > 0) {
                html += '<div class="history-section"><div class="history-title">Вчера</div>';
                yesterdayConvs.forEach(conv => {
                    html += `
                        <div class="history-item ${conv.id === currentConversationId ? 'active' : ''}" 
                             data-id="${conv.id}" 
                             onclick="loadConversation('${conv.id}')">
                            <svg class="history-item-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                            ${conv.title}
                        </div>
                    `;
                });
                html += '</div>';
            }

            if (olderConvs.length > 0) {
                html += '<div class="history-section"><div class="history-title">Ранее</div>';
                olderConvs.forEach(conv => {
                    html += `
                        <div class="history-item ${conv.id === currentConversationId ? 'active' : ''}" 
                             data-id="${conv.id}" 
                             onclick="loadConversation('${conv.id}')">
                            <svg class="history-item-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                            ${conv.title}
                        </div>
                    `;
                });
                html += '</div>';
            }

            historyList.innerHTML = html || '<div style="padding: 20px; text-align: center; color: #9ca3af; font-size: 14px;">История пуста</div>';
        }

        // Update sendMessage to save conversation
        const originalSendMessage = sendMessage;
        sendMessage = async function(text) {
            const userMessage = text;
            await originalSendMessage(text);
            
            // Save after bot responds
            setTimeout(() => {
                const lastBotMessage = Array.from(messagesEl.querySelectorAll('.message-group.bot'))
                    .pop()?.querySelector('.message-text')?.textContent;
                if (lastBotMessage) {
                    saveConversation(userMessage, lastBotMessage);
                }
            }, 1000);
        };

        // Initialize
        renderHistory();
        input.focus();
    </script>
</body>
</html>

