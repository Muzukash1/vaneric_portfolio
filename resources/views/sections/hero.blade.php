<section id="home" class="min-h-screen flex items-center pt-20 pb-12 px-4 sm:px-6 relative overflow-hidden">
<div class="max-w-7xl mx-auto w-full relative z-10">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">

    {{-- ── LEFT: Text — order 2 on mobile (below image) ── --}}
    <div class="w-full text-center lg:text-left order-2 lg:order-1">

        {{-- Badge --}}
        <div class="inline-flex items-center gap-2 px-3 py-1.5 sm:px-4 sm:py-2 rounded-full border text-xs sm:text-sm font-body mb-6 afu"
             style="animation-delay:.1s;opacity:0;border-color:rgba(123,92,240,0.35);background:rgba(123,92,240,0.08);color:#A78BFA;">
            <i data-lucide="sparkles" class="w-3 h-3 sm:w-3.5 sm:h-3.5 flex-shrink-0"></i>
            <span>{{ $developer['tagline'] ?? 'Ready to Innovate' }}</span>
        </div>

        {{-- Heading — fluid font size, never overflows --}}
        <h1 class="font-display font-bold leading-none mb-5 afu" style="animation-delay:.25s;opacity:0;">
            <span class="block text-white" style="font-size:clamp(2.2rem,8vw,4.5rem);line-height:1.08;">
                {{ $developer['role_prefix'] ?? 'Full Stack' }}
            </span>
            <span class="block" style="font-size:clamp(2.2rem,8vw,4.5rem);line-height:1.08;
                         background:linear-gradient(90deg,#A78BFA 0%,#FF6EB4 100%);
                         -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">
                {{ $developer['role_suffix'] ?? 'Developer' }}
            </span>
        </h1>

        {{-- Typing --}}
        <p class="text-gray-300 text-base sm:text-lg font-body mb-3 afu min-h-[1.75rem]" style="animation-delay:.4s;opacity:0;">
            <span id="typed-subtitle" class="font-medium"></span><span class="typing-cursor">|</span>
        </p>

        {{-- Description --}}
        <p class="text-gray-400 text-sm sm:text-base font-body leading-relaxed mb-8 afu mx-auto lg:mx-0"
           style="animation-delay:.5s;opacity:0;max-width:480px;">
            {{ $developer['description'] ?? 'Enhancing digital experiences that are smooth, scalable, and made to impress.' }}
        </p>

        {{-- Tech tags --}}
        <div class="flex flex-wrap justify-center lg:justify-start gap-2 mb-8 afu" style="animation-delay:.6s;opacity:0;">
            @foreach($developer['tech_tags'] ?? ['React','Javascript','Node.js','PostgreSQL'] as $tag)
                <span class="tech-tag px-3 py-1 sm:px-4 sm:py-1.5 rounded-full text-xs sm:text-sm font-body cursor-default transition-all duration-300"
                      style="border:1px solid rgba(255,255,255,0.12);background:rgba(255,255,255,0.05);color:#D1D5DB;">
                    {{ $tag }}
                </span>
            @endforeach
        </div>

        {{-- CTA Buttons --}}
        <div class="flex flex-wrap justify-center lg:justify-start gap-3 mb-10 afu" style="animation-delay:.7s;opacity:0;">
            <a href="#portfolio"
               class="inline-flex items-center gap-2 px-5 py-2.5 sm:px-6 sm:py-3 rounded-lg font-display font-semibold text-sm transition-all duration-300 hover:-translate-y-0.5"
               style="background:rgba(26,26,46,1);border:1px solid #1E1E35;color:#FFFFFF;"
               onmouseover="this.style.borderColor='rgba(123,92,240,0.5)';this.style.boxShadow='0 4px 20px rgba(123,92,240,0.18)'"
               onmouseout="this.style.borderColor='#1E1E35';this.style.boxShadow='none'">
                <i data-lucide="external-link" class="w-4 h-4 flex-shrink-0"></i> Projects
            </a>
            <a href="#contact"
               class="inline-flex items-center gap-2 px-5 py-2.5 sm:px-6 sm:py-3 rounded-lg font-display font-semibold text-sm transition-all duration-300 hover:-translate-y-0.5"
               style="background:rgba(26,26,46,1);border:1px solid #1E1E35;color:#FFFFFF;"
               onmouseover="this.style.borderColor='rgba(123,92,240,0.5)';this.style.boxShadow='0 4px 20px rgba(123,92,240,0.18)'"
               onmouseout="this.style.borderColor='#1E1E35';this.style.boxShadow='none'">
                <i data-lucide="mail" class="w-4 h-4 flex-shrink-0"></i> Contact
            </a>
        </div>

        {{-- Social icons --}}
        <div class="flex items-center justify-center lg:justify-start gap-3 sm:gap-4 afu" style="animation-delay:.8s;opacity:0;">
            @foreach($developer['social_links'] ?? [] as $social)
                <a href="{{ $social['href'] }}" target="_blank" rel="noopener noreferrer"
                   aria-label="{{ $social['label'] }}"
                   class="social-icon-btn w-10 h-10 sm:w-11 sm:h-11 flex items-center justify-center rounded-full transition-all duration-300 hover:-translate-y-1"
                   data-platform="{{ strtolower($social['label']) }}">
                    @if(strtolower($social['label']) === 'github')
                        <svg viewBox="0 0 24 24" class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor"><path d="M12 0C5.37 0 0 5.373 0 12c0 5.303 3.438 9.8 8.205 11.387.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61-.546-1.387-1.333-1.756-1.333-1.756-1.09-.745.083-.729.083-.729 1.205.084 1.84 1.237 1.84 1.237 1.07 1.834 2.807 1.304 3.492.997.108-.776.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.31.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.3 1.23A11.52 11.52 0 0 1 12 5.803c1.02.005 2.047.138 3.006.404 2.29-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222 0 1.606-.015 2.898-.015 3.293 0 .322.216.694.825.576C20.565 21.796 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                    @elseif(strtolower($social['label']) === 'linkedin')
                        <svg viewBox="0 0 24 24" class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    @elseif(strtolower($social['label']) === 'instagram')
                        <svg viewBox="0 0 24 24" class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
                    @else
                        <i data-lucide="{{ $social['icon'] }}" class="w-4 h-4 sm:w-5 sm:h-5"></i>
                    @endif
                </a>
            @endforeach
        </div>
    </div>

    {{-- ── RIGHT: Profile — order 1 on mobile (shows above text) ── --}}
    <div class="flex items-center justify-center order-1 lg:order-2 afu" style="animation-delay:.5s;opacity:0;">
        <div class="relative">

            {{-- Spinning ring --}}
            <div class="no-transition" style="
                position:absolute;inset:-3px;border-radius:9999px;
                background:conic-gradient(from 0deg,#A78BFA,#FF6EB4,#7B5CF0,#A78BFA);
                animation:spinRing 6s linear infinite;filter:blur(0.5px);
                box-shadow:0 0 30px rgba(123,92,240,0.45),0 0 60px rgba(255,110,180,0.25);"></div>

            {{-- Ambient glow --}}
            <div class="no-transition" style="
                position:absolute;inset:-18px;border-radius:9999px;
                background:radial-gradient(circle,rgba(123,92,240,0.18) 0%,rgba(255,110,180,0.1) 50%,transparent 70%);
                animation:ringGlow 3s ease-in-out infinite;"></div>

            {{-- Profile circle — fluid size --}}
            <div class="profile-wrapper relative overflow-hidden border-2 border-white/10"
                 style="width:clamp(185px,42vw,300px);height:clamp(185px,42vw,300px);
                        border-radius:9999px;cursor:pointer;
                        box-shadow:0 0 50px rgba(123,92,240,0.25),0 0 100px rgba(255,110,180,0.15);">

                @if(!empty($developer['profile_image']))
                    <img src="{{ asset($developer['profile_image']) }}" alt="{{ $developer['name'] }}" class="profile-img-dark">
                @else
                    <div class="profile-img-dark flex flex-col items-center justify-center" style="background:linear-gradient(135deg,#1A1535,#12121F);">
                        <i data-lucide="user" class="w-14 h-14" style="color:rgba(167,139,250,0.4);"></i>
                        <p class="text-xs text-gray-500 text-center mt-2 px-3 font-body">Add<br><code style="color:rgba(167,139,250,0.6);">profile_image</code></p>
                    </div>
                @endif

                @if(!empty($developer['profile_image_light']))
                    <img src="{{ asset($developer['profile_image_light']) }}" alt="{{ $developer['name'] }} shy" class="profile-img-light">
                @else
                    <div class="profile-img-light flex flex-col items-center justify-center" style="background:linear-gradient(135deg,#EDE9FE,#F5F3FF);">
                        <i data-lucide="smile" class="w-14 h-14" style="color:rgba(123,92,240,0.5);"></i>
                        <p class="text-xs text-center mt-2 px-3 font-body" style="color:rgba(0,0,0,0.4);">Hover photo</p>
                    </div>
                @endif

                <div class="profile-hover-hint absolute inset-0 flex items-end justify-center pb-3 transition-opacity duration-300 opacity-0"
                     style="background:linear-gradient(to top,rgba(0,0,0,0.45) 0%,transparent 55%);">
                    <span class="text-xs text-white font-body px-3 py-1 rounded-full" style="background:rgba(123,92,240,0.35);backdrop-filter:blur(8px);"></span>
                </div>
            </div>

            {{-- Badge: Software Developer — hidden on tiny screens --}}
            <div class="hidden xs:inline-flex no-transition items-center gap-1.5 absolute"
                 style="top:-30px;left:-40px;padding:5px 10px;border-radius:9999px;
                        background:rgba(123,92,240,0.14);border:1px solid rgba(123,92,240,0.4);
                        color:#A78BFA;font-size:11px;font-family:'Syne',sans-serif;font-weight:600;
                        backdrop-filter:blur(8px);white-space:nowrap;
                        animation:floatBadge 4s ease-in-out infinite;
                        box-shadow:0 0 14px rgba(123,92,240,0.2);">
                <i data-lucide="code-2" style="width:11px;height:11px;flex-shrink:0;"></i>
                Software Developer
            </div>

            {{-- Badge: Game Developer --}}
            <div class="hidden xs:inline-flex no-transition items-center gap-1.5 absolute"
                 style="top:-30px;right:-40px;padding:5px 10px;border-radius:9999px;
                        background:rgba(255,110,180,0.12);border:1px solid rgba(255,110,180,0.4);
                        color:#FF6EB4;font-size:11px;font-family:'Syne',sans-serif;font-weight:600;
                        backdrop-filter:blur(8px);white-space:nowrap;
                        animation:floatBadge 5s ease-in-out infinite 0.8s;
                        box-shadow:0 0 14px rgba(255,110,180,0.18);">
                <i data-lucide="gamepad-2" style="width:11px;height:11px;flex-shrink:0;"></i>
                Game Developer
            </div>

            {{-- Badge: Available — always visible --}}
            <div style="position:absolute;bottom:-10px;left:50%;transform:translateX(-50%);
                        display:inline-flex;align-items:center;gap:5px;
                        padding:5px 12px;border-radius:9999px;
                        background:rgba(123,92,240,0.12);border:1px solid rgba(123,92,240,0.35);
                        color:#00FF88;font-size:11px;font-family:'Syne',sans-serif;font-weight:600;
                        backdrop-filter:blur(8px);white-space:nowrap;
                        box-shadow:0 0 16px rgba(123,92,240,0.18);">
                <span style="width:6px;height:6px;background:#00FF88;border-radius:50%;
                             animation:pulse 1.5s infinite;display:inline-block;
                             box-shadow:0 0 6px #00FF88;flex-shrink:0;"></span>
                Available for work
            </div>
        </div>
    </div>

</div>{{-- end grid --}}
</div>
</section>

<style>
.profile-wrapper:hover .profile-img-dark  { opacity:0 !important; }
.profile-wrapper:hover .profile-img-light { opacity:1 !important; }
.profile-wrapper:hover .profile-hover-hint { opacity:1 !important; }

@keyframes spinRing   { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }
@keyframes ringGlow   { 0%,100%{opacity:.3;transform:scale(1)} 50%{opacity:.75;transform:scale(1.06)} }
@keyframes floatBadge { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-7px)} }
@keyframes fadeUp     { from{opacity:0;transform:translateY(30px)} to{opacity:1;transform:translateY(0)} }
.afu { animation:fadeUp 0.7s ease forwards; }
.typing-cursor { display:inline-block;animation:blink .8s step-end infinite;color:#A78BFA; }
@keyframes blink { 0%,100%{opacity:1} 50%{opacity:0} }

.social-icon-btn[data-platform="github"]    { background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.14);color:#E6EDF3; }
.social-icon-btn[data-platform="github"]:hover    { background:rgba(255,255,255,0.18);border-color:rgba(255,255,255,0.4); }
.social-icon-btn[data-platform="linkedin"]  { background:rgba(10,102,194,0.14);border:1px solid rgba(10,102,194,0.35);color:#0A66C2; }
.social-icon-btn[data-platform="linkedin"]:hover  { background:rgba(10,102,194,0.28);border-color:rgba(10,102,194,0.65); }
.social-icon-btn[data-platform="instagram"] { background:rgba(225,48,108,0.12);border:1px solid rgba(225,48,108,0.32);color:#E1306C; }
.social-icon-btn[data-platform="instagram"]:hover { background:rgba(225,48,108,0.24);border-color:rgba(225,48,108,0.6); }
.tech-tag:hover { border-color:rgba(123,92,240,0.5)!important;color:#A78BFA!important;background:rgba(123,92,240,0.08)!important; }

/* xs breakpoint for badge visibility (390px+) */
@media (max-width:389px) { .hidden.xs\:inline-flex { display:none !important; } }
@media (min-width:390px) { .hidden.xs\:inline-flex { display:inline-flex !important; } }
</style>

<script>
const subtitles=['Information Technology Student','Full Stack Developer','Game Developer','Open Source Enthusiast'];
let si=0,ci=0,del=false;
const el=document.getElementById('typed-subtitle');
function type(){
    const w=subtitles[si];
    if(!del){el.textContent=w.slice(0,++ci);if(ci===w.length){del=true;return setTimeout(type,1900);}}
    else{el.textContent=w.slice(0,--ci);if(ci===0){del=false;si=(si+1)%subtitles.length;}}
    setTimeout(type,del?55:88);
}
setTimeout(type,900);
</script>
