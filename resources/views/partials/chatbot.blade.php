{{-- ============================================================
     CHATBOT WIDGET
     Include this in layouts/app.blade.php just before </body>
     @include('partials.chatbot')
     ============================================================ --}}

{{-- Floating trigger button --}}
<button id="chat-trigger"
        aria-label="Chat with Vaneric"
        class="fixed bottom-6 right-6 z-50 flex items-center gap-2.5 px-4 py-3 rounded-full text-white font-display font-semibold text-sm shadow-2xl transition-all duration-300 hover:-translate-y-1 hover:shadow-brand/40"
        style="background: linear-gradient(135deg, #7B5CF0, #5B21B6); box-shadow: 0 8px 32px rgba(123,92,240,0.4);">
    <i data-lucide="message-circle" class="w-5 h-5"></i>
    <span>Chat with Vaneric</span>
    {{-- Unread dot --}}
    <span id="chat-unread" class="absolute -top-1 -right-1 w-3 h-3 bg-green-400 rounded-full border-2 border-surface animate-pulse"></span>
</button>

{{-- Chat window --}}
<div id="chat-window"
     class="fixed bottom-24 right-6 z-50 w-[340px] max-h-[560px] flex flex-col rounded-2xl overflow-hidden shadow-2xl border border-border-dim transition-all duration-300 origin-bottom-right"
     style="background:#12121F; display:none; transform:scale(0.9); opacity:0;">

    {{-- Header --}}
    <div class="flex items-center gap-3 px-4 py-3.5 border-b border-border-dim flex-shrink-0"
         style="background: linear-gradient(135deg, rgba(123,92,240,0.2), rgba(91,33,182,0.1));">

        {{-- Avatar --}}
        <div class="relative flex-shrink-0">
            <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-brand/40"
                 style="box-shadow: 0 0 12px rgba(0,255,128,0.2);">
                @if(!empty($developer['profile_image'] ?? ''))
                    <img src="{{ asset($developer['profile_image']) }}" alt="Vaneric" class="w-full h-full object-cover object-top">
                @else
                    <div class="w-full h-full bg-brand/20 flex items-center justify-center">
                        <i data-lucide="user" class="w-5 h-5 text-brand-light"></i>
                    </div>
                @endif
            </div>
            <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-400 rounded-full border-2 border-[#12121F]"></span>
        </div>

        {{-- Name + status --}}
        <div class="flex-1 min-w-0">
            <p class="font-display font-bold text-sm text-white truncate">
                Chat with {{ $developer[''] ?? 'Vaneric' }}
            </p>
            <p class="flex items-center gap-1 text-xs text-green-400 font-body">
                <span class="w-1.5 h-1.5 bg-green-400 rounded-full inline-block"></span>
                Online
            </p>
        </div>

        {{-- Close --}}
        <button id="chat-close" class="text-gray-500 hover:text-white transition-colors flex-shrink-0" aria-label="Close chat">
            <i data-lucide="x" class="w-4 h-4"></i>
        </button>
    </div>

    {{-- Messages area --}}
    <div id="chat-messages"
         class="flex-1 overflow-y-auto px-4 py-4 space-y-4 font-body"
         style="min-height: 260px; max-height: 360px; scrollbar-width: thin; scrollbar-color: #1E1E35 transparent;">

        {{-- Welcome message --}}
        <div class="chat-msg-bot flex items-start gap-2.5">
            <div class="w-7 h-7 rounded-full overflow-hidden flex-shrink-0 border border-brand/30">
                @if(!empty($developer['profile_image'] ?? ''))
                    <img src="{{ asset($developer['profile_image']) }}" alt="" class="w-full h-full object-cover object-top">
                @else
                    <div class="w-full h-full bg-brand/20 flex items-center justify-center">
                        <i data-lucide="user" class="w-3 h-3 text-brand-light"></i>
                    </div>
                @endif
            </div>
            <div>
                <p class="text-xs text-gray-500 mb-1">{{ $developer['name'] ?? 'Vaneric' }}</p>
                <div class="bot-bubble px-3.5 py-2.5 rounded-2xl rounded-tl-sm text-sm text-gray-100 leading-relaxed"
                     style="background: #1A1A2E; border: 1px solid #1E1E35; max-width: 230px;">
                    Hi there! 👋 Thanks for visiting my website. Feel free to ask me anything about programming, web development, or my experiences in tech. Let me know how I can help!
                </div>
            </div>
        </div>

    </div>

    {{-- Quick suggestions --}}
    <div id="chat-suggestions" class="px-4 py-2 flex flex-wrap gap-1.5 border-t border-border-dim flex-shrink-0" style="background:#0D0D1A;">
        <button onclick="sendSuggestion(this)" class="suggestion-btn px-2.5 py-1 text-xs rounded-full border border-border-dim text-gray-400 hover:border-brand/40 hover:text-brand-light transition-all duration-200 font-body">
            🛠️ What are your skills?
        </button>
        <button onclick="sendSuggestion(this)" class="suggestion-btn px-2.5 py-1 text-xs rounded-full border border-border-dim text-gray-400 hover:border-brand/40 hover:text-brand-light transition-all duration-200 font-body">
            💼 Show me your projects
        </button>
        <button onclick="sendSuggestion(this)" class="suggestion-btn px-2.5 py-1 text-xs rounded-full border border-border-dim text-gray-400 hover:border-brand/40 hover:text-brand-light transition-all duration-200 font-body">
            📬 How to contact you?
        </button>
        <button onclick="sendSuggestion(this)" class="suggestion-btn px-2.5 py-1 text-xs rounded-full border border-border-dim text-gray-400 hover:border-brand/40 hover:text-brand-light transition-all duration-200 font-body">
            📄 Download CV
        </button>
    </div>

    {{-- Input area --}}
    <div class="px-3 py-3 border-t border-border-dim flex-shrink-0" style="background:#0D0D1A;">
        <div class="flex items-end gap-2">
            <div class="flex-1">
                <textarea id="chat-input"
                          placeholder="Type a message..."
                          rows="1"
                          maxlength="1000"
                          class="w-full px-3.5 py-2.5 rounded-xl text-sm font-body text-white placeholder:text-gray-600 resize-none border border-border-dim focus:outline-none focus:border-brand/50 focus:ring-1 focus:ring-brand/20 transition-all"
                          style="background:#1A1A2E; min-height:40px; max-height:100px; overflow-y:auto;"
                          onkeydown="handleKey(event)"
                          oninput="updateCounter(this)"></textarea>
                <p class="text-right text-xs text-gray-600 mt-0.5 font-body">
                    <span id="char-count">0</span>/1000
                </p>
            </div>
            <button id="chat-send"
                    onclick="sendMessage()"
                    class="w-9 h-9 flex items-center justify-center rounded-xl bg-brand hover:bg-brand-dark text-white transition-all duration-200 hover:shadow-lg hover:shadow-brand/30 flex-shrink-0 mb-5"
                    aria-label="Send message">
                <i data-lucide="send" class="w-4 h-4"></i>
            </button>
        </div>
        <p class="text-center text-xs text-gray-600 font-body -mt-1">Ask me about programming, web dev, or tech!</p>
    </div>

</div>

<style>
#chat-messages::-webkit-scrollbar { width: 4px; }
#chat-messages::-webkit-scrollbar-track { background: transparent; }
#chat-messages::-webkit-scrollbar-thumb { background: #1E1E35; border-radius: 9999px; }

.chat-msg-user { display: flex; justify-content: flex-end; }
.user-bubble {
    background: linear-gradient(135deg, #7B5CF0, #5B21B6);
    color: #fff;
    padding: 10px 14px;
    border-radius: 18px;
    border-bottom-right-radius: 4px;
    font-size: 0.875rem;
    line-height: 1.5;
    max-width: 230px;
    word-break: break-word;
}

.typing-dots span {
    display: inline-block;
    width: 6px; height: 6px;
    background: #A78BFA;
    border-radius: 50%;
    animation: typingDot 1.4s infinite ease-in-out;
}
.typing-dots span:nth-child(2) { animation-delay: 0.2s; }
.typing-dots span:nth-child(3) { animation-delay: 0.4s; }
@keyframes typingDot {
    0%,80%,100% { transform: scale(0.6); opacity: 0.4; }
    40%          { transform: scale(1);   opacity: 1;   }
}

#chat-window.open {
    display: flex !important;
    animation: chatOpen 0.25s ease forwards;
}
@keyframes chatOpen {
    from { transform: scale(0.9); opacity: 0; }
    to   { transform: scale(1);   opacity: 1; }
}
@keyframes chatClose {
    from { transform: scale(1);   opacity: 1; }
    to   { transform: scale(0.9); opacity: 0; }
}
</style>

<script>
// ─── State ───────────────────────────────────────────────
const chatHistory = [];  // [{role, content}] for context window
const MAX_HISTORY = 10;  // keep last N exchanges

// ─── Open / Close ─────────────────────────────────────────
document.getElementById('chat-trigger').addEventListener('click', openChat);
document.getElementById('chat-close').addEventListener('click', closeChat);

function openChat() {
    const win = document.getElementById('chat-window');
    document.getElementById('chat-unread').style.display = 'none';
    win.classList.add('open');
    win.style.display = 'flex';
    setTimeout(() => document.getElementById('chat-input').focus(), 300);
}

function closeChat() {
    const win = document.getElementById('chat-window');
    win.style.animation = 'chatClose 0.2s ease forwards';
    setTimeout(() => {
        win.classList.remove('open');
        win.style.display = 'none';
        win.style.animation = '';
    }, 200);
}

// ─── Input helpers ────────────────────────────────────────
function updateCounter(el) {
    document.getElementById('char-count').textContent = el.value.length;
    // Auto-grow
    el.style.height = 'auto';
    el.style.height = Math.min(el.scrollHeight, 100) + 'px';
}

function handleKey(e) {
    if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
    }
}

// ─── Suggestions ─────────────────────────────────────────
function sendSuggestion(btn) {
    const text = btn.textContent.trim().replace(/^[\p{Emoji}\s]+/u, '').trim();
    document.getElementById('chat-input').value = text;
    // Hide suggestions after first use
    document.getElementById('chat-suggestions').style.display = 'none';
    sendMessage();
}

// ─── Append messages ──────────────────────────────────────
function appendUserMessage(text) {
    const box = document.getElementById('chat-messages');
    box.insertAdjacentHTML('beforeend', `
        <div class="chat-msg-user">
            <div class="user-bubble">${escHtml(text)}</div>
        </div>
    `);
    scrollBottom();
}

function appendBotMessage(text, avatarSrc) {
    const box = document.getElementById('chat-messages');
    const avatar = avatarSrc
        ? `<img src="${avatarSrc}" alt="" class="w-full h-full object-cover object-top">`
        : `<div class="w-full h-full bg-brand/20 flex items-center justify-center"><i data-lucide="user" class="w-3 h-3 text-brand-light"></i></div>`;

    box.insertAdjacentHTML('beforeend', `
        <div class="chat-msg-bot flex items-start gap-2.5">
            <div class="w-7 h-7 rounded-full overflow-hidden flex-shrink-0 border border-brand/30">${avatar}</div>
            <div>
                <div class="bot-bubble px-3.5 py-2.5 rounded-2xl rounded-tl-sm text-sm text-gray-100 leading-relaxed"
                     style="background:#1A1A2E; border:1px solid #1E1E35; max-width:230px; word-break:break-word;">
                    ${formatBotText(text)}
                </div>
            </div>
        </div>
    `);
    lucide.createIcons();
    scrollBottom();
}

function showTyping() {
    const box = document.getElementById('chat-messages');
    box.insertAdjacentHTML('beforeend', `
        <div class="chat-msg-bot flex items-start gap-2.5" id="typing-indicator">
            <div class="w-7 h-7 rounded-full overflow-hidden flex-shrink-0 border border-brand/30 bg-brand/20 flex items-center justify-center">
                <i data-lucide="user" class="w-3 h-3 text-brand-light"></i>
            </div>
            <div class="bot-bubble px-4 py-3 rounded-2xl rounded-tl-sm" style="background:#1A1A2E; border:1px solid #1E1E35;">
                <div class="typing-dots flex gap-1">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>
    `);
    lucide.createIcons();
    scrollBottom();
}

function removeTyping() {
    const el = document.getElementById('typing-indicator');
    if (el) el.remove();
}

// ─── Send ─────────────────────────────────────────────────
async function sendMessage() {
    const input   = document.getElementById('chat-input');
    const sendBtn = document.getElementById('chat-send');
    const text    = input.value.trim();
    if (!text) return;

    // Clear + disable
    input.value = '';
    input.style.height = 'auto';
    document.getElementById('char-count').textContent = '0';
    input.disabled = true;
    sendBtn.disabled = true;
    sendBtn.style.opacity = '0.5';

    appendUserMessage(text);
    showTyping();

    // Add to history
    chatHistory.push({ role: 'user', content: text });
    if (chatHistory.length > MAX_HISTORY * 2) chatHistory.splice(0, 2);

    try {
        const res = await fetch('/chatbot/message', {
            method:  'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                'Accept':       'application/json',
            },
            body: JSON.stringify({
                message: text,
                history: chatHistory.slice(-MAX_HISTORY * 2, -1), // exclude last (just added)
            }),
        });

        const data = await res.json();
        removeTyping();

        const reply = data.reply || 'Sorry, something went wrong!';
        const avatarSrc = document.querySelector('#chat-window img')?.src || '';
        appendBotMessage(reply, avatarSrc);

        // Add bot reply to history
        chatHistory.push({ role: 'assistant', content: reply });

    } catch (err) {
        removeTyping();
        appendBotMessage('Connection issue — please try again!', '');
    } finally {
        input.disabled = false;
        sendBtn.disabled = false;
        sendBtn.style.opacity = '1';
        input.focus();
    }
}

// ─── Helpers ──────────────────────────────────────────────
function scrollBottom() {
    const box = document.getElementById('chat-messages');
    setTimeout(() => box.scrollTo({ top: box.scrollHeight, behavior: 'smooth' }), 50);
}

function escHtml(str) {
    return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

function formatBotText(text) {
    // Convert **bold** and basic newlines
    return escHtml(text)
        .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
        .replace(/\n/g, '<br>');
}
</script>
