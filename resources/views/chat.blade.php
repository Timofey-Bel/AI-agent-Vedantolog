<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Vedantolog AI - Ведический AI Помощник | Ведическая Астрология и Знания</title>
    <meta name="description" content="Vedantolog AI - ваш личный помощник в мире ведической астрологии, джйотиш и ведических знаний. Получите ответы на вопросы о карме, судьбе, натальной карте и духовном развитии от AI-консультанта.">
    <meta name="keywords" content="ведическая астрология, джйотиш, ведантолог, AI астролог, ведические знания, натальная карта, гороскоп, карма, судьба, духовное развитие, веды, астрология онлайн, консультация астролога, ведический AI, астрология чат, vedantolog, vedantolog AI, ведантолог, ведантолог ии">
    <meta name="author" content="Vedantolog">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://ai.vedantolog.org">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://ai.vedantolog.org">
    <meta property="og:title" content="Vedantolog AI - Ведический AI Помощник">
    <meta property="og:description" content="Получите ответы на вопросы о ведической астрологии, карме и духовном развитии от AI-консультанта">
    <meta property="og:image" content="{{ asset('vedantolog-icon-white-bg-new.jpg') }}">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://ai.vedantolog.org">
    <meta property="twitter:title" content="Vedantolog AI - Ведический AI Помощник">
    <meta property="twitter:description" content="Получите ответы на вопросы о ведической астрологии, карме и духовном развитии от AI-консультанта">
    <meta property="twitter:image" content="{{ asset('vedantolog-icon-white-bg-new.jpg') }}">
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
	    height: 100dvh;
            overflow: hidden;
            color: #ffffff;
	    position: fixed;
            width: 100%;
        }

        .app-container {
            display: flex;
            height: 100vh;
            height: 100dvh;
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
            padding: 10px 16px;
            border-bottom: 1px solid #2a2a2a;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .sidebar-logo-icon {
            width: 32px;
            height: 29px;
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
            color: rgb(0 144 216);
        }

	.lang-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 12px;
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            color: #999;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
    	    margin-left: 17px;
        }

        .lang-btn:hover {
            background: #2a2a2a;
            border-color: rgb(0 144 216);
            color: rgb(0 144 216);
        }

        .lang-btn svg {
            flex-shrink: 0;
        }

        .new-chat-btn {
            width: 100%;
            padding: 12px 16px;
            background: rgb(0 144 216);
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
            position: relative;
            margin-bottom: 4px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .history-item-content {
            padding: 10px 12px;
            padding-right: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #999;
            cursor: pointer;
            transition: all 0.2s;
        }

        .history-item-title {
            flex: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .history-item:hover .history-item-content {
            background: #2a2a2a;
            color: #fff;
        }

        .history-item.active .history-item-content {
            background: #2a2a2a;
            color: rgb(0 144 216);
            font-weight: 500;
        }

        .history-item-delete {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            width: 28px;
            height: 28px;
            background: transparent;
            border: none;
            border-radius: 6px;
            color: #666;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.2s;
        }

        .history-item:hover .history-item-delete {
            opacity: 1;
        }

        .history-item-delete:hover {
            background: #ff4444;
            color: #fff;
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
        }

        .chat-header {
            padding: 16px 24px;
            background: #1a1a1a;
            border-bottom: 1px solid #2a2a2a;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
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
            color: rgb(0 144 216);
        }

	.home-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            color: rgb(0 144 216);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .home-btn:hover {
            background: #2a2a2a;
            border-color: rgb(0 144 216);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 188, 212, 0.2);
        }

        .home-btn svg {
            flex-shrink: 0;
        }

        .chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 24px;
            max-width: 900px;
            width: 100%;
            margin: 0 auto;
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
	    padding-bottom: 2px;
        }

        .message-group.user .message-avatar {
            background: #2a2a2a;
            color: rgb(0 144 216);
        }

        .message-group.bot .message-avatar {
            background: transparent;
            border: 2px solid rgb(0 144 216);
            padding: 4px;
        }

	.message-group.typing .message-avatar {
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                border-color: rgb(0 144 216);
                box-shadow: 0 0 0 0 rgba(0, 188, 212, 0.7);
            }
            50% {
                border-color: #00e5ff;
                box-shadow: 0 0 20px 5px rgba(0, 188, 212, 0.5);
            }
        }

        .message-group.bot .message-avatar img,
        .message-group.bot .message-avatar svg {
            width: 20px;
            height: 20px;
        }

        .message-content {
            flex: 1;
	    padding-top: 4px;
        }

        .message-text {
            color: #e0e0e0;
            font-size: 15px;
            line-height: 1.7;
            white-space: pre-wrap;
            word-wrap: break-word;
        }

        .message-text a {
            color: rgb(0 144 216);
            text-decoration: underline;
            transition: all 0.2s;
        }

        .message-text a:hover {
            color: #00e5ff;
            text-decoration: none;
        }

        .message-text strong {
            font-weight: 700;
            color: #fff;
        }

        .message-text em {
            font-style: italic;
            color: #f0f0f0;
        }

        .message-text code {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 4px;
            padding: 2px 6px;
            font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
            font-size: 13px;
            color: rgb(0 188 212);
        }

        .message-text del {
            text-decoration: line-through;
            opacity: 0.6;
        }

        .message-text h1 {
            font-size: 24px;
            font-weight: 700;
            color: rgb(0 144 216);
            margin: 16px 0 12px 0;
        }

        .message-text h2 {
            font-size: 20px;
            font-weight: 600;
            color: rgb(0 144 216);
            margin: 14px 0 10px 0;
        }

        .message-text h3 {
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            margin: 12px 0 8px 0;
        }

        .message-text li {
            margin-left: 20px;
            margin-bottom: 4px;
            list-style-type: disc;
        }

        .message-text blockquote {
            border-left: 3px solid rgb(0 144 216);
            padding-left: 12px;
            margin: 8px 0;
            color: #b0b0b0;
            font-style: italic;
        }

        .message-group.typing .message-text {
            color: #666;
            font-style: italic;
        }

        .message-group.error .message-text {
            color: #ff4444;
        }

        .message-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
            opacity: 0.55;
            transition: opacity 0.2s;
        }

        .message-group.bot:hover .message-actions {
            opacity: 1;
        }

        .copy-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            background: transparent;
            border: 1px solid #2a2a2a;
            border-radius: 6px;
            color: #999;
            font-size: 12px;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.2s;
        }

        .copy-btn:hover {
            background: #2a2a2a;
            border-color: rgb(0 144 216);
            color: rgb(0 144 216);
        }

        .copy-btn svg {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
        }

        .copy-btn.copied {
            color: #00e676;
            border-color: #00e676;
        }

        @media (max-width: 768px) {
            .message-actions {
                opacity: 1;
            }
        }

        .welcome-message {
            text-align: center;
            padding: 80px 20px;
            color: #666;
        }

        .welcome-message h2 {
            font-size: 32px;
            font-weight: 600;
            color: rgb(0 144 216);
            margin-bottom: 16px;
        }

        .welcome-message p {
            font-size: 16px;
            line-height: 1.6;
            color: #999;
        }

        .chat-input-wrapper {
            padding: 20px 24px;
            padding-bottom: max(24px, env(safe-area-inset-bottom)); /* Учитываем вырез на iPhone */
            background: #1a1a1a;
            border-top: 1px solid #2a2a2a;
            flex-shrink: 0;
            position: sticky;
            bottom: 0;
            z-index: 10;
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
            border-color: rgb(0 144 216);
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

        .chat-input textarea::-webkit-scrollbar {
            width: 6px;
        }

        .chat-input textarea::-webkit-scrollbar-track {
            background: transparent;
        }

        .chat-input textarea::-webkit-scrollbar-thumb {
            background: #2a2a2a;
            border-radius: 3px;
        }

        .chat-input textarea::-webkit-scrollbar-thumb:hover {
            background: #3a3a3a;
        }

        .chat-input textarea {
            scrollbar-width: thin;
            scrollbar-color: #2a2a2a transparent;
        }

        .chat-input button {
            width: 36px;
            height: 36px;
            background: rgb(0 144 216);
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

        .attach-btn {
            background: transparent !important;
            color: #999 !important;
            border: 1px solid #2a2a2a !important;
        }

        .attach-btn:hover:not(:disabled) {
            color: rgb(0 144 216) !important;
            border-color: rgb(0 144 216) !important;
            box-shadow: none !important;
        }

        .attachments-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 10px;
        }

        .attachments-preview:empty {
            display: none;
        }

        .attachment-chip {
            display: flex;
            align-items: center;
            gap: 8px;
            max-width: 240px;
            padding: 8px 10px;
            background: #0a0a0a;
            border: 1px solid #2a2a2a;
            border-radius: 10px;
            position: relative;
        }

        .attachment-chip .att-icon {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #1a1a1a;
            color: rgb(0 144 216);
            overflow: hidden;
        }

        .attachment-chip .att-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .attachment-chip .att-icon svg {
            width: 18px;
            height: 18px;
        }

        .attachment-chip .att-info {
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .attachment-chip .att-name {
            font-size: 13px;
            color: #e0e0e0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .attachment-chip .att-meta {
            font-size: 11px;
            color: #666;
        }

        .attachment-chip .att-meta.warn {
            color: #d9a441;
        }

        .attachment-chip .att-remove {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
            border: none;
            background: #2a2a2a;
            color: #ccc;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            line-height: 1;
            transition: all 0.2s;
        }

        .attachment-chip .att-remove:hover {
            background: #ff4444;
            color: #fff;
        }

        .message-attachments {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 10px;
        }

        .message-attachments .msg-att {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            font-size: 13px;
            color: #cfcfcf;
        }

        .message-attachments .msg-att svg {
            width: 16px;
            height: 16px;
            color: rgb(0 144 216);
            flex-shrink: 0;
        }

        .message-attachments img.msg-att-img {
            max-width: 180px;
            max-height: 180px;
            border-radius: 10px;
            border: 1px solid #2a2a2a;
            object-fit: cover;
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
            color: rgb(0 144 216);
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
            }

	    .home-btn span {
                display: none;
            }

            .home-btn {
                padding: 8px;
            }

            .chat-messages {
                padding: 16px;
                gap: 20px;
            }

            .message-avatar {
                width: 32px;
                height: 32px;
                font-size: 14px;
            }

            .chat-input-wrapper {
                padding: 12px 16px;
                padding-bottom: max(16px, env(safe-area-inset-bottom));
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
                        <img src="{{ asset('vedantolog-icon-white-bg.png') }}" alt="Vedantolog" style="width: 100%; height: 100%; object-fit: contain;">
                    </div>
                    <div class="sidebar-logo-text">VEDANTOLOG</div>
		    <button class="lang-btn" onclick="toggleLanguage()" title="Switch language">
                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                        </svg>
                        <span id="langTextSidebar">EN</span>
                    </button>
                </div>
                <button class="new-chat-btn" onclick="startNewChat()">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span data-translate="newChat">Новый диалог</span>
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
                        <img src="{{ asset('vedantolog-icon-white-bg.png') }}" alt="Vedantolog AI" style="width: 100%; height: 100%; object-fit: contain;">
                    </div>
                    <div class="chat-title">Vedantolog AI</div>
                </div>
		<a href="https://vedantolog.org" class="home-btn" target="_blank">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span data-translate="home">На главную</span>
                </a>
            </div>

            <div class="chat-messages" id="messages">
                <div class="welcome-message">
                    <h2>Vedantolog AI</h2>
                    <p>Ваш надёжный путеводитель и помощник в мире ведического знания.</p>
                </div>
            </div>

            <div class="chat-input-wrapper">
                <div class="chat-input-container">
                    <form id="chatForm">
                        <div id="attachmentsPreview" class="attachments-preview"></div>
                        <div class="chat-input">
                            <input type="file" id="fileInput" multiple hidden
                                   accept=".pdf,.docx,.txt,.md,.csv,.log,.json,.html,.xml,.js,.ts,.css,.php,.py,.rtf,.yml,.yaml,.ini">
                            <button type="button" id="attachBtn" class="attach-btn" title="Прикрепить документ">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                                </svg>
                            </button>
                            <textarea 
                                id="userInput" 
                                placeholder="Напишите ваш вопрос..." 
                                rows="1"
                                autocomplete="off"
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mammoth@1.6.0/mammoth.browser.min.js"></script>
    <script>
        // Настройка воркера pdf.js (используется для извлечения текста из PDF)
        if (window.pdfjsLib) {
            window.pdfjsLib.GlobalWorkerOptions.workerSrc =
                'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
        }

        const messagesEl = document.getElementById('messages');
        const form = document.getElementById('chatForm');
        const input = document.getElementById('userInput');
        const sendBtn = document.getElementById('sendBtn');
        const historyList = document.getElementById('historyList');
        const fileInput = document.getElementById('fileInput');
        const attachBtn = document.getElementById('attachBtn');
        const attachmentsPreview = document.getElementById('attachmentsPreview');

        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        let lastMessageId = null;
        let currentConversationId = null;
        let conversations = JSON.parse(localStorage.getItem('conversations') || '[]');

        // Language translations - MUST BE BEFORE ANY FUNCTIONS THAT USE IT
         const translations = {
            ru: {
                home: 'На главную',
                newChat: 'Новый диалог',
                today: 'Сегодня',
                yesterday: 'Вчера',
                earlier: 'Ранее',
		emptyHistory: 'История пуста',
                welcomeTitle: 'Добро пожаловать в Vedantolog AI',
                welcomeText: 'Vedantolog AI — это первый в мире комплекс моделей искусственного интеллекта, которые обучаются под руководством опытных экспертов в области ведического знания. Его миссия — сделать так, чтобы каждый искренний искатель истины мог получить доступ к полному объёму ведического знания и его носителям',
                placeholder: 'Напишите ваш вопрос...',
                typing: 'Печатаю ответ...',
                you: 'Вы',
                copy: 'Копировать',
                copied: 'Скопировано'
            },
            en: {
                home: 'Home',
                newChat: 'New Chat',
                today: 'Today',
                yesterday: 'Yesterday',
                earlier: 'Earlier',
		emptyHistory: 'History is empty',
                welcomeTitle: 'Welcome to Vedantolog AI',
                welcomeText: 'Vedantolog AI — the world first complex of artificial intelligence models trained by experienced experts in Vedic knowledge. Its mission is to ensure that every sincere seeker of truth has access to the full body of Vedic knowledge and its bearers.',
                placeholder: 'Write your question...',
                typing: 'Typing response...',
                you: 'You',
                copy: 'Copy',
                copied: 'Copied'
            }
        };


        let currentLang = localStorage.getItem('lang') || 'ru';

        // Auto-resize textarea
        input.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 200) + 'px';
        });

        // ===== Вложения (фото и документы) =====
        const MAX_FILE_SIZE = 10 * 1024 * 1024; // 10 МБ на файл
        const MAX_FILES = 5;
        const MAX_TEXT_CHARS = 15000; // лимит извлекаемого текста на один документ
        let attachedFiles = [];

        const TEXT_EXT = ['txt', 'md', 'csv', 'log', 'json', 'html', 'xml', 'js', 'ts', 'css', 'php', 'py', 'rtf', 'yml', 'yaml', 'ini'];

        function fileExt(name) {
            const i = name.lastIndexOf('.');
            return i >= 0 ? name.slice(i + 1).toLowerCase() : '';
        }

        function isPdf(file) {
            return file.type === 'application/pdf' || fileExt(file.name) === 'pdf';
        }

        function isDocx(file) {
            return file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                || fileExt(file.name) === 'docx';
        }

        function isTextual(file) {
            return (file.type && file.type.startsWith('text/'))
                || file.type === 'application/json'
                || TEXT_EXT.includes(fileExt(file.name));
        }

        function formatSize(bytes) {
            if (bytes < 1024) return bytes + ' B';
            if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(0) + ' KB';
            return (bytes / 1024 / 1024).toFixed(1) + ' MB';
        }

        function readAsText(file) {
            return new Promise((resolve, reject) => {
                const r = new FileReader();
                r.onload = () => resolve(r.result);
                r.onerror = reject;
                r.readAsText(file);
            });
        }

        function readAsDataURL(file) {
            return new Promise((resolve, reject) => {
                const r = new FileReader();
                r.onload = () => resolve(r.result);
                r.onerror = reject;
                r.readAsDataURL(file);
            });
        }

        async function extractPdfText(file) {
            if (!window.pdfjsLib) throw new Error('pdfjs not loaded');
            const buf = await file.arrayBuffer();
            const pdf = await window.pdfjsLib.getDocument({ data: buf }).promise;
            const pages = Math.min(pdf.numPages, 30);
            let txt = '';
            for (let i = 1; i <= pages; i++) {
                const page = await pdf.getPage(i);
                const content = await page.getTextContent();
                txt += content.items.map(it => it.str).join(' ') + '\n';
            }
            return txt.trim();
        }

        // Извлечение текста из .docx (Word) — локально через mammoth.js.
        // Используем convertToHtml, чтобы сохранить структуру (списки, абзацы, заголовки).
        async function extractDocxText(file) {
            await ensureMammoth();
            const arrayBuffer = await file.arrayBuffer();
            const result = await window.mammoth.convertToHtml({ arrayBuffer });
            return htmlToPlainText(result && result.value ? result.value : '');
        }

        // Преобразует HTML в читаемый текст, сохраняя списки, нумерацию и переносы строк
        function htmlToPlainText(html) {
            const root = document.createElement('div');
            root.innerHTML = html;

            function render(node) {
                let out = '';
                node.childNodes.forEach(child => {
                    if (child.nodeType === 3) { // текстовый узел
                        out += child.textContent;
                    } else if (child.nodeType === 1) { // элемент
                        const tag = child.tagName.toLowerCase();
                        if (tag === 'br') {
                            out += '\n';
                        } else if (tag === 'ol') {
                            let i = 1;
                            child.querySelectorAll(':scope > li').forEach(li => {
                                out += '\n' + (i++) + '. ' + render(li).trim();
                            });
                            out += '\n';
                        } else if (tag === 'ul') {
                            child.querySelectorAll(':scope > li').forEach(li => {
                                out += '\n• ' + render(li).trim();
                            });
                            out += '\n';
                        } else if (/^(p|div|h[1-6]|tr|section|article)$/.test(tag)) {
                            out += '\n' + render(child).trim() + '\n';
                        } else if (tag === 'td' || tag === 'th') {
                            out += render(child).trim() + '\t';
                        } else {
                            out += render(child);
                        }
                    }
                });
                return out;
            }

            let text = render(root);
            text = text.replace(/[ \t]+\n/g, '\n')   // пробелы перед переносом
                       .replace(/\n{3,}/g, '\n\n')   // не более одной пустой строки
                       .replace(/[ \t]{2,}/g, ' ')   // схлопываем двойные пробелы
                       .trim();
            return text;
        }

        // Динамическая подгрузка скрипта
        function loadScript(src) {
            return new Promise((resolve, reject) => {
                const s = document.createElement('script');
                s.src = src;
                s.onload = () => resolve();
                s.onerror = () => reject(new Error('failed to load ' + src));
                document.head.appendChild(s);
            });
        }

        // Гарантирует, что mammoth загружен (с запасными источниками)
        async function ensureMammoth() {
            if (window.mammoth) return;
            const sources = [
                'https://cdn.jsdelivr.net/npm/mammoth@1.6.0/mammoth.browser.min.js',
                'https://unpkg.com/mammoth@1.6.0/mammoth.browser.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.6.0/mammoth.browser.min.js'
            ];
            for (const url of sources) {
                try {
                    await loadScript(url);
                    if (window.mammoth) return;
                } catch (e) {
                    console.warn('mammoth: не удалось загрузить', url);
                }
            }
            throw new Error('mammoth not loaded');
        }

        attachBtn.addEventListener('click', () => fileInput.click());
        fileInput.addEventListener('change', (e) => handleFiles(e.target.files));

        async function handleFiles(fileList) {
            for (const file of Array.from(fileList)) {
                if (attachedFiles.length >= MAX_FILES) {
                    alert('Можно прикрепить не более ' + MAX_FILES + ' файлов.');
                    break;
                }
                if (file.size > MAX_FILE_SIZE) {
                    alert('Файл "' + file.name + '" слишком большой (макс. 10 МБ).');
                    continue;
                }

                // Разрешаем только то, что бот реально может прочитать
                if (!(isPdf(file) || isDocx(file) || isTextual(file))) {
                    alert('Файл «' + file.name + '» не поддерживается.\nМожно прикреплять документы (PDF, DOCX) и текстовые файлы. ' +
                          'Изображения и другие форматы бот прочитать не может.');
                    continue;
                }

                const item = {
                    id: Date.now() + '_' + Math.random().toString(36).slice(2),
                    name: file.name,
                    size: file.size,
                    kind: 'other',
                    text: null,
                    dataUrl: null,
                    warn: false,
                    processing: false
                };

                attachedFiles.push(item);
                // Обработку запускаем асинхронно, чтобы чип появился сразу
                processFile(item, file);
                renderAttachments();
            }
            fileInput.value = '';
        }

        async function processFile(item, file) {
            try {
                if (isPdf(file)) {
                    item.kind = 'pdf';
                    item.processing = true;
                    renderAttachments();
                    item.text = await extractPdfText(file);
                    item.processing = false;
                    if (!item.text) item.warn = true;
                } else if (isDocx(file)) {
                    item.kind = 'doc';
                    item.processing = true;
                    renderAttachments();
                    item.text = await extractDocxText(file);
                    item.processing = false;
                    if (!item.text) item.warn = true;
                } else if (isTextual(file)) {
                    item.kind = 'text';
                    item.text = await readAsText(file);
                } else {
                    item.kind = 'other';
                    item.warn = true; // формат не читается как текст (например, docx/xlsx)
                }
            } catch (err) {
                item.processing = false;
                item.warn = true;
                console.error('Не удалось обработать файл', file.name, err);
            }

            if (item.text && item.text.length > MAX_TEXT_CHARS) {
                item.text = item.text.slice(0, MAX_TEXT_CHARS) + '\n…(текст обрезан)';
            }
            renderAttachments();
        }

        function removeAttachment(id) {
            attachedFiles = attachedFiles.filter(f => f.id !== id);
            renderAttachments();
        }

        function fileIconSvg() {
            return '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M14 2v6h6"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M9 13h6M9 17h6"/></svg>';
        }

        function renderAttachments() {
            attachmentsPreview.innerHTML = '';
            attachedFiles.forEach(f => {
                const chip = document.createElement('div');
                chip.className = 'attachment-chip';

                const icon = document.createElement('div');
                icon.className = 'att-icon';
                if (f.kind === 'image' && f.dataUrl) {
                    icon.innerHTML = '<img src="' + f.dataUrl + '" alt="">';
                } else {
                    icon.innerHTML = fileIconSvg();
                }

                const info = document.createElement('div');
                info.className = 'att-info';
                const name = document.createElement('div');
                name.className = 'att-name';
                name.textContent = f.name;
                const meta = document.createElement('div');
                meta.className = 'att-meta' + (f.warn ? ' warn' : '');
                if (f.processing) {
                    meta.textContent = f.kind === 'image' ? 'распознаётся текст…' : 'обработка…';
                } else if (f.kind === 'image') {
                    meta.textContent = f.text ? 'текст распознан' : 'текста не найдено';
                } else if (f.warn) {
                    meta.textContent = formatSize(f.size) + ' · текст не извлечён';
                } else {
                    meta.textContent = formatSize(f.size) + ' · текст добавлен';
                }
                info.appendChild(name);
                info.appendChild(meta);

                const remove = document.createElement('button');
                remove.type = 'button';
                remove.className = 'att-remove';
                remove.innerHTML = '&times;';
                remove.title = 'Убрать';
                remove.addEventListener('click', () => removeAttachment(f.id));

                chip.appendChild(icon);
                chip.appendChild(info);
                chip.appendChild(remove);
                attachmentsPreview.appendChild(chip);
            });
        }

        function clearAttachments() {
            attachedFiles = [];
            renderAttachments();
        }

        // Собирает текст для отправки модели: вопрос + содержимое документов + пометки
        function buildComposedMessage(typedText) {
            const parts = [];

            const withText = attachedFiles.filter(f => f.text);
            withText.forEach(f => {
                const label = f.kind === 'image'
                    ? 'распознанный текст с изображения'
                    : 'содержимое прикреплённого файла';
                parts.push(
                    'Ниже приведён ' + label + ' «' + f.name + '». ' +
                    'Используй этот текст как контекст и при необходимости цитируй его, отвечая на вопрос пользователя. ' +
                    'Если цитируешь — сохраняй исходное форматирование: списки, нумерацию, переносы строк и пробелы как в оригинале.\n' +
                    '--- начало «' + f.name + '» ---\n' +
                    f.text + '\n' +
                    '--- конец «' + f.name + '» ---'
                );
            });

            const unreadable = attachedFiles.filter(f => !f.text);
            if (unreadable.length) {
                const names = unreadable.map(f => f.name).join(', ');
                parts.push('[Пользователь прикрепил файлы, содержимое которых недоступно текстовой модели: ' + names + ']');
            }

            // Вопрос пользователя ставим последним — так модель отвечает именно на него
            if (typedText) {
                parts.push('Вопрос пользователя: ' + typedText);
            }

            return parts.join('\n\n').trim();
        }
        // ===== Конец модуля вложений =====


        // ===== Умная авто-прокрутка =====
        // Тянем вниз только если пользователь находится у нижнего края.
        let autoScroll = true;
        let lastScrollTop = 0;
        const SCROLL_THRESHOLD = 80; // px от низа, в пределах которых считаем, что пользователь "внизу"

        function isNearBottom() {
            return messagesEl.scrollHeight - messagesEl.scrollTop - messagesEl.clientHeight <= SCROLL_THRESHOLD;
        }

        // Колесо вверх — самый частый случай на десктопе, реагируем мгновенно
        messagesEl.addEventListener('wheel', (e) => {
            if (e.deltaY < 0) {
                autoScroll = false;
            } else if (isNearBottom()) {
                autoScroll = true;
            }
        }, { passive: true });

        // Тач: если ушли от низа — отключаем
        messagesEl.addEventListener('touchmove', () => {
            if (!isNearBottom()) autoScroll = false;
        }, { passive: true });

        // Любая прокрутка вверх (в т.ч. перетаскивание ползунка) отключает авто-прокрутку,
        // у самого низа — снова включает. Программная прокрутка идёт только вниз, поэтому
        // сама себя не отключает.
        messagesEl.addEventListener('scroll', () => {
            const st = messagesEl.scrollTop;
            if (st < lastScrollTop - 2) {
                autoScroll = false;
            } else if (isNearBottom()) {
                autoScroll = true;
            }
            lastScrollTop = st;
        });

        function scrollToBottomIfNeeded() {
            if (autoScroll) {
                messagesEl.scrollTop = messagesEl.scrollHeight;
                lastScrollTop = messagesEl.scrollTop;
            }
        }

        function forceScrollToBottom() {
            autoScroll = true;
            messagesEl.scrollTop = messagesEl.scrollHeight;
            lastScrollTop = messagesEl.scrollTop;
        }

        function removeWelcome() {
            const welcome = document.querySelector('.welcome-message');
            if (welcome) welcome.remove();
        }

        // Иконки для кнопки копирования
        const copyIconSvg = '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>';
        const checkIconSvg = '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>';

        // Копирование текста ответа в буфер обмена
        async function copyMessage(text, btn) {
            try {
                await navigator.clipboard.writeText(text);
            } catch (e) {
                // Фолбэк для старых браузеров и небезопасного контекста (http)
                const ta = document.createElement('textarea');
                ta.value = text;
                ta.style.position = 'fixed';
                ta.style.top = '-9999px';
                ta.style.opacity = '0';
                document.body.appendChild(ta);
                ta.focus();
                ta.select();
                try { document.execCommand('copy'); } catch (err) {}
                document.body.removeChild(ta);
            }

            const t = translations[currentLang];
            btn.classList.add('copied');
            btn.innerHTML = checkIconSvg + '<span>' + t.copied + '</span>';

            clearTimeout(btn._copyTimer);
            btn._copyTimer = setTimeout(() => {
                btn.classList.remove('copied');
                btn.innerHTML = copyIconSvg + '<span>' + translations[currentLang].copy + '</span>';
            }, 2000);
        }

        // Добавляет панель действий с кнопкой "Копировать" под ответом бота
        function addCopyButton(group, rawContent) {
            const contentDiv = group.querySelector('.message-content');
            if (!contentDiv || contentDiv.querySelector('.message-actions')) return;

            const t = translations[currentLang];
            const actions = document.createElement('div');
            actions.className = 'message-actions';

            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'copy-btn';
            btn.title = t.copy;
            btn.innerHTML = copyIconSvg + '<span>' + t.copy + '</span>';
            btn.addEventListener('click', () => copyMessage(rawContent, btn));

            actions.appendChild(btn);
            contentDiv.appendChild(actions);
        }

        function addMessage(content, role, attachments = null) {
            removeWelcome();
            
            const group = document.createElement('div');
            group.className = `message-group ${role}`;
            
            const avatar = document.createElement('div');
            avatar.className = 'message-avatar';
            
            if (role === 'user') {
                const t = translations[currentLang];
                avatar.textContent = t.you;
            } else {
                avatar.innerHTML = `<img src="{{ asset('vedantolog-icon-white-bg.png') }}" alt="AI" style="width: 100%; height: 100%; object-fit: contain;">`;
            }
            
            const contentDiv = document.createElement('div');
            contentDiv.className = 'message-content';
            
            const text = document.createElement('div');
            text.className = 'message-text';
            
            // Для бота применяем форматирование, для пользователя - просто текст
            if (role === 'bot') {
                text.innerHTML = formatMarkdown(content);
            } else {
                text.textContent = content;
            }
            
            // Вложения пользователя (превью изображений и чипы документов)
            if (role === 'user' && attachments && attachments.length) {
                contentDiv.appendChild(buildMessageAttachments(attachments));
            }

            contentDiv.appendChild(text);
            group.appendChild(avatar);
            group.appendChild(contentDiv);
            
            messagesEl.appendChild(group);
            scrollToBottomIfNeeded();

            // Кнопка копирования для готовых ответов бота (история диалогов)
            if (role === 'bot') {
                addCopyButton(group, content);
            }
            
            return group;
        }

        // Строит блок вложений внутри сообщения пользователя
        function buildMessageAttachments(attachments) {
            const wrap = document.createElement('div');
            wrap.className = 'message-attachments';
            attachments.forEach(a => {
                if (a.kind === 'image' && a.dataUrl) {
                    const img = document.createElement('img');
                    img.className = 'msg-att-img';
                    img.src = a.dataUrl;
                    img.alt = a.name;
                    wrap.appendChild(img);
                } else {
                    const el = document.createElement('div');
                    el.className = 'msg-att';
                    el.innerHTML = '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M14 2v6h6"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M9 13h6M9 17h6"/></svg>';
                    const span = document.createElement('span');
                    span.textContent = a.name;
                    el.appendChild(span);
                    wrap.appendChild(el);
                }
            });
            return wrap;
        }

	// Функция для превращения ссылок в кликабельные
        function linkifyText(text) {
            // Регулярное выражение для поиска URL
            const urlRegex = /(https?:\/\/[^\s]+)/g;
            return text.replace(urlRegex, function(url) {
                return `<a href="${url}" target="_blank" rel="noopener noreferrer" style="color: rgb(0 144 216); text-decoration: underline;">${url}</a>`;
            });
        }

        // Функция для обработки Markdown-форматирования
        function formatMarkdown(text) {
            if (!text) return '';
            
            // Сначала экранируем HTML для безопасности
            const escapeHtml = (str) => {
                const div = document.createElement('div');
                div.textContent = str;
                return div.innerHTML;
            };
            
            // Единственное место HTML-экранирования: текст от ИИ превращаем
            // в безопасный HTML здесь, перед разметкой markdown.
            let formatted = escapeHtml(text);
            
            // ВАЖНО: Заменяем переносы строк на <br> ДО обработки markdown
            formatted = formatted.replace(/\n/g, '<br>');
            
            // Жирный текст: **текст** или __текст__ (может быть многострочным)
            formatted = formatted.replace(/\*\*([^*]+?)\*\*/g, '<strong>$1</strong>');
            formatted = formatted.replace(/__([^_]+?)__/g, '<strong>$1</strong>');
            
            // Курсив: *текст* или _текст_ (не должен быть частью ** или __)
            formatted = formatted.replace(/(?<!\*)\*(?!\*)([^*<]+?)(?<!\*)\*(?!\*)/g, '<em>$1</em>');
            formatted = formatted.replace(/(?<!_)_(?!_)([^_<]+?)(?<!_)_(?!_)/g, '<em>$1</em>');
            
            // Зачёркнутый: ~~текст~~
            formatted = formatted.replace(/~~([^~]+?)~~/g, '<del>$1</del>');
            
            // Inline код: `код`
            formatted = formatted.replace(/`([^`]+)`/g, '<code>$1</code>');
            
            // Заголовки (ищем после <br> или в начале)
            formatted = formatted.replace(/(^|<br>)### (.+?)(<br>|$)/g, '$1<h3>$2</h3>$3');
            formatted = formatted.replace(/(^|<br>)## (.+?)(<br>|$)/g, '$1<h2>$2</h2>$3');
            formatted = formatted.replace(/(^|<br>)# (.+?)(<br>|$)/g, '$1<h1>$2</h1>$3');
            
            // Списки (начинаются с * или - после <br> или в начале)
            formatted = formatted.replace(/(^|<br>)\* (.+?)(<br>|$)/g, '$1<li>$2</li>$3');
            formatted = formatted.replace(/(^|<br>)- (.+?)(<br>|$)/g, '$1<li>$2</li>$3');
            
            // Цитаты: > в начале строки
            formatted = formatted.replace(/(^|<br>)>\s*(.+?)(<br>|$)/g, '$1<blockquote>$2</blockquote>$3');
            
            // Убираем лишние <br> (несколько подряд заменяем на один)
            formatted = formatted.replace(/(<br>){2,}/g, '<br>');
            
            // Убираем <br> в начале и в конце
            formatted = formatted.replace(/^<br>|<br>$/g, '');
            
            // Markdown ссылки: [текст](url) - обрабатываем ПЕРВЫМИ
            // Используем временный маркер для защиты URL
            formatted = formatted.replace(/\[([^\]]+)\]\((https?:\/\/[^)]+)\)/g, function(match, text, url) {
                return `<a href="${url}" target="_blank" rel="noopener noreferrer" style="color: rgb(0 144 216); text-decoration: underline;">${text}</a>`;
            });
            
            // Теперь добавляем автоматические ссылки только для голых URL
            // Исключаем URL внутри href="" и после <a
            formatted = formatted.replace(/(?<!href="|<a [^>]*)(https?:\/\/[^\s<"()[\]]+)(?![^<]*<\/a>)/g, function(url) {
                return `<a href="${url}" target="_blank" rel="noopener noreferrer" style="color: rgb(0 144 216); text-decoration: underline;">${url}</a>`;
            });
            
            return formatted;
        }

	// Функция для плавного появления текста с эффектом печати
        function addMessageWithTyping(content, role) {
            removeWelcome();
            
            const group = document.createElement('div');
            group.className = `message-group ${role}`;
            
            const avatar = document.createElement('div');
            avatar.className = 'message-avatar';
            
            if (role === 'user') {
                const t = translations[currentLang];
                avatar.textContent = t.you;
            } else {
                avatar.innerHTML = `<img src="{{ asset('vedantolog-icon-white-bg.png') }}" alt="AI" style="width: 100%; height: 100%; object-fit: contain;">`;
            }
            
            const contentDiv = document.createElement('div');
            contentDiv.className = 'message-content';
            
            const text = document.createElement('div');
            text.className = 'message-text';
            
            contentDiv.appendChild(text);
            group.appendChild(avatar);
            group.appendChild(contentDiv);
            
            messagesEl.appendChild(group);
            
            if (role === 'bot') {
                // Форматируем весь текст сразу
                const formattedHTML = formatMarkdown(content);
                
                // Создаем временный элемент для парсинга HTML
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = formattedHTML;
                
                // Плавно печатаем через innerHTML, добавляя узлы постепенно
                let currentHTML = '';
                let charIndex = 0;
                const speed = 5; // Ускоренная печать (5мс на символ)
                
                function typeHTML() {
                    if (charIndex < formattedHTML.length) {
                        currentHTML += formattedHTML.charAt(charIndex);
                        
                        // Проверяем что HTML валидный (закрыты все теги)
                        const tempCheck = document.createElement('div');
                        tempCheck.innerHTML = currentHTML;
                        
                        // Если HTML не сломан - обновляем текст
                        if (tempCheck.innerHTML) {
                            text.innerHTML = currentHTML;
                        }
                        
                        charIndex++;
                        scrollToBottomIfNeeded();
                        setTimeout(typeHTML, speed);
                    } else {
                        // Печать завершена — гарантируем полный текст и добавляем кнопку "Копировать"
                        text.innerHTML = formattedHTML;
                        addCopyButton(group, content);
                        scrollToBottomIfNeeded();
                    }
                }
                
                typeHTML();
            } else {
                text.textContent = content;
                scrollToBottomIfNeeded();
            }
            
            return group;
        }

        function showTyping() {
            removeWelcome();
            
            const group = document.createElement('div');
            group.className = 'message-group bot typing';
            group.id = 'typing';
            
            const avatar = document.createElement('div');
            avatar.className = 'message-avatar';
            avatar.innerHTML = `<img src="{{ asset('vedantolog-icon-white-bg.png') }}" alt="AI" style="width: 100%; height: 100%; object-fit: contain;">`;
            
            const contentDiv = document.createElement('div');
            contentDiv.className = 'message-content';
            
            const text = document.createElement('div');
            text.className = 'message-text';
            const t = translations[currentLang];
            text.textContent = t.typing;
            
            contentDiv.appendChild(text);
            group.appendChild(avatar);
            group.appendChild(contentDiv);
            
            messagesEl.appendChild(group);
            scrollToBottomIfNeeded();
        }

        function hideTyping() {
            const typing = document.getElementById('typing');
            if (typing) typing.remove();
        }

        async function sendMessage(messageToSend, displayText, attachments) {
            displayText = (displayText !== undefined && displayText !== null) ? displayText : messageToSend;
            attachments = attachments || [];

            // Текст для истории — без громоздкого содержимого документов
            let historyText = displayText;
            if (attachments.length) {
                const names = attachments.map(a => a.name).join(', ');
                historyText = (displayText ? displayText + ' ' : '') + '📎 ' + names;
            }

            addMessage(displayText, 'user', attachments);
            // Пользователь только что отправил сообщение — возвращаемся вниз
            forceScrollToBottom();
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
                        message: messageToSend,
                        parent_message_id: lastMessageId
                    })
                });

		 // Обработка истёкшей сессии (CSRF) до разбора тела
                if (response.status === 419) {
                    hideTyping();
                    addMessage('Сессия истекла. Обновляю страницу...', 'error');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                    return;
                }

                // Пытаемся разобрать JSON-тело в любом случае (там лежит текст ошибки)
                let data = null;
                const contentType = response.headers.get('content-type') || '';
                if (contentType.includes('application/json')) {
                    data = await response.json();
                }

                hideTyping();

                if (response.ok && data && data.success) {
                    addMessageWithTyping(data.message, 'bot');
                    lastMessageId = data.id;

                    // СОХРАНЯЕМ РАЗГОВОР СРАЗУ ПОСЛЕ ПОЛУЧЕНИЯ ОТВЕТА
                    saveConversation(historyText, data.message);
                } else {
                    // Формируем понятное сообщение об ошибке
                    let errorMsg = (data && data.error)
                        ? data.error
                        : `Сервер вернул ошибку: ${response.status}`;

                    // Технические детали показываем только если их прислал сервер (APP_DEBUG)
                    if (data && data.debug) {
                        if (data.debug.upstream_status) {
                            errorMsg += `\n\n[debug] Код API: ${data.debug.upstream_status}`;
                            if (data.debug.upstream_message) {
                                errorMsg += ` — ${data.debug.upstream_message}`;
                            }
                        } else if (data.debug.detail) {
                            errorMsg += `\n\n[debug] ${data.debug.detail}`;
                        }
                    }

                    addMessage(errorMsg, 'error');
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
            const typed = input.value.trim();
            if (!typed && attachedFiles.length === 0) return;

            // Не отправляем, пока распознаётся текст из вложений
            if (attachedFiles.some(f => f.processing)) {
                alert('Подождите, идёт распознавание текста из вложения…');
                return;
            }

            const composed = buildComposedMessage(typed);
            const meta = attachedFiles.map(f => ({
                name: f.name, kind: f.kind, dataUrl: f.dataUrl, warn: f.warn
            }));

            input.value = '';
            input.style.height = 'auto';
            clearAttachments();

            sendMessage(composed, typed, meta);
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
            
            // Очищаем сохранённый ID диалога
            localStorage.removeItem('lastConversationId');
            
            messagesEl.innerHTML = `
                <div class="welcome-message">
                    <h2>Добро пожаловать в Vedantolog AI</h2>
                    <p>Vedantolog AI  — это первый в мире комплекс моделей искусственного интеллекта, которые обучаются под руководством опытных экспертов в области ведического знания. Его миссия — сделать так, чтобы каждый искренний искатель истины мог получить доступ к полному объёму ведического знания и его носителям</p>
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

                // Сохраняем якорь цепочки диалога для контекста Timeweb API.
                // parent_message_id восстановится при загрузке диалога,
                // чтобы агент продолжал беседу с учётом контекста.
                conv.lastMessageId = lastMessageId;

                localStorage.setItem('conversations', JSON.stringify(conversations));
                
                // Сохраняем ID текущего диалога
                localStorage.setItem('lastConversationId', currentConversationId);
                
                renderHistory();
            }
        }

        function loadConversation(id) {
            const conv = conversations.find(c => c.id === id);
            if (!conv) return;

            currentConversationId = id;
            
            // Сохраняем ID текущего диалога в localStorage
            localStorage.setItem('lastConversationId', id);

            // Восстанавливаем якорь цепочки, чтобы продолжение диалога
            // сохраняло контекст на стороне Timeweb API
            lastMessageId = conv.lastMessageId || null;
            
            messagesEl.innerHTML = '';

            conv.messages.forEach(msg => {
                addMessage(msg.content, msg.role);
            });

            // Открыли диалог — показываем последнее сообщение
            forceScrollToBottom();

            // Mark as active
            document.querySelectorAll('.history-item').forEach(item => {
                item.classList.remove('active');
            });
            document.querySelector(`[data-id="${id}"]`)?.classList.add('active');
        }

        function deleteConversation(id) {
            // Удаляем беседу из массива
            const index = conversations.findIndex(c => c.id === id);
            if (index === -1) return;
            
            conversations.splice(index, 1);
            
            // Обновляем localStorage
            localStorage.setItem('conversations', JSON.stringify(conversations));
            
            // Обновляем список истории
            renderHistory();
            
            // Если удалена текущая беседа, начинаем новую
            if (currentConversationId === id) {
                startNewChat();
            }
        }

        function renderHistory() {
            const today = new Date().toDateString();
            const yesterday = new Date(Date.now() - 86400000).toDateString();
	    const t = translations[currentLang];

            const todayConvs = conversations.filter(c => new Date(c.timestamp).toDateString() === today);
            const yesterdayConvs = conversations.filter(c => new Date(c.timestamp).toDateString() === yesterday);
            const olderConvs = conversations.filter(c => {
                const date = new Date(c.timestamp).toDateString();
                return date !== today && date !== yesterday;
            });

            let html = '';

            if (todayConvs.length > 0) {
                html += '<div class="history-section"><div class="history-title">' + t.today + '</div>';
                todayConvs.forEach(conv => {
                    html += `
                        <div class="history-item ${conv.id === currentConversationId ? 'active' : ''}" 
                             data-id="${conv.id}">
                            <div class="history-item-content" onclick="loadConversation('${conv.id}')">
                                <svg class="history-item-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                </svg>
                                <span class="history-item-title">${conv.title}</span>
                            </div>
                            <button class="history-item-delete" onclick="event.stopPropagation(); deleteConversation('${conv.id}')" title="Удалить">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    `;
                });
                html += '</div>';
            }

            if (yesterdayConvs.length > 0) {
                html += '<div class="history-section"><div class="history-title">' + t.yesterday + '</div>';
                yesterdayConvs.forEach(conv => {
                    html += `
                        <div class="history-item ${conv.id === currentConversationId ? 'active' : ''}" 
                             data-id="${conv.id}">
                            <div class="history-item-content" onclick="loadConversation('${conv.id}')">
                                <svg class="history-item-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                </svg>
                                <span class="history-item-title">${conv.title}</span>
                            </div>
                            <button class="history-item-delete" onclick="event.stopPropagation(); deleteConversation('${conv.id}')" title="Удалить">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    `;
                });
                html += '</div>';
            }

            if (olderConvs.length > 0) {
                html += '<div class="history-section"><div class="history-title">' + t.earlier + '</div>';
                olderConvs.forEach(conv => {
                    html += `
                        <div class="history-item ${conv.id === currentConversationId ? 'active' : ''}" 
                             data-id="${conv.id}">
                            <div class="history-item-content" onclick="loadConversation('${conv.id}')">
                                <svg class="history-item-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                </svg>
                                <span class="history-item-title">${conv.title}</span>
                            </div>
                            <button class="history-item-delete" onclick="event.stopPropagation(); deleteConversation('${conv.id}')" title="Удалить">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    `;
                });
                html += '</div>';
            }

            historyList.innerHTML = html || '<div style="padding: 20px; text-align: center; color: #9ca3af; font-size: 14px;">' + t.emptyHistory + '</div>';
        }

        function translatePage() {
            const t = translations[currentLang];
            
            // Translate all elements with data-translate attribute
            document.querySelectorAll('[data-translate]').forEach(el => {
                const key = el.getAttribute('data-translate');
                if (t[key]) {
                    el.textContent = t[key];
                }
            });

            // Update placeholder
            input.placeholder = t.placeholder;

            // Update welcome message if present
            const welcome = document.querySelector('.welcome-message');
            if (welcome) {
                const h2 = welcome.querySelector('h2');
                const p = welcome.querySelector('p');
                if (h2) h2.textContent = t.welcomeTitle;
                if (p) p.innerHTML = t.welcomeText;
            }

	    // Update user avatars in all messages
            document.querySelectorAll('.message-group.user .message-avatar').forEach(avatar => {
                avatar.textContent = t.you;
            });

            // Update copy buttons that are not in "copied" state
            document.querySelectorAll('.copy-btn').forEach(btn => {
                btn.title = t.copy;
                if (!btn.classList.contains('copied')) {
                    const span = btn.querySelector('span');
                    if (span) span.textContent = t.copy;
                }
            });

            // Update language button
            document.getElementById('langTextSidebar').textContent = currentLang === 'ru' ? 'EN' : 'RU';
        }

        function toggleLanguage() {
            currentLang = currentLang === 'ru' ? 'en' : 'ru';
            localStorage.setItem('lang', currentLang);
            translatePage();
            renderHistory(); // Перерисовать историю с новым языком
        }

        // Initialize
        translatePage();
        renderHistory();
        
        // Восстанавливаем последний активный диалог после перезагрузки
        const lastConversationId = localStorage.getItem('lastConversationId');
        if (lastConversationId && conversations.find(c => c.id === lastConversationId)) {
            loadConversation(lastConversationId);
        }
        
        input.focus();
    </script>
</body>
</html>

