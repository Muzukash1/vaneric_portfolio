<section id="about" class="py-16 sm:py-20 md:py-24 px-4 sm:px-6">
<div class="max-w-7xl mx-auto">

    {{-- Header --}}
    <div class="text-center mb-10 sm:mb-14 md:mb-16 sa" data-sa="fade-down">
        <h2 class="font-display font-bold text-3xl sm:text-4xl md:text-5xl mb-3"
            style="background:linear-gradient(90deg,#A78BFA 0%,#C084FC 50%,#A78BFA 100%);
                   -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">
            About Me
        </h2>
        <div class="w-16 sm:w-20 h-0.5 mx-auto rounded-full mt-2"
             style="background:linear-gradient(90deg,#7B5CF0,#A78BFA,#7B5CF0);"></div>
    </div>

    {{-- Bio --}}
    <div class="max-w-3xl mx-auto text-center mb-8 sm:mb-12 sa" data-sa="fade-up" data-sa-delay="100">
        <p class="font-body text-gray-300 text-sm sm:text-base leading-loose px-1">
            {!! $about['bio'] ?? 'Hello, I\'m <strong class="text-white">Vaneric San Pascual</strong> passionate about building smart and scalable web &amp; mobile applications. I\'ve completed a full-stack development course and constantly explore new technologies to refine my skills. Focused on continuous learning, I aim to transition into the IT industry by 2027 and eventually move towards AI and data science.' !!}
        </p>
    </div>

    {{-- CTA Buttons --}}
    <div class="flex flex-wrap justify-center gap-3 sm:gap-4 mb-10 sm:mb-14 md:mb-16 sa" data-sa="fade-up" data-sa-delay="200">
        <a href="{{ $about['cv_url'] ?? '#' }}" download
           class="about-btn-primary inline-flex items-center gap-2 px-5 py-2.5 sm:px-7 sm:py-3 rounded-lg font-display font-semibold text-sm text-white transition-all duration-300 hover:-translate-y-0.5"
           style="background:linear-gradient(135deg,#7B5CF0 0%,#6D28D9 100%);
                  box-shadow:0 4px 20px rgba(123,92,240,0.4),0 0 0 1px rgba(123,92,240,0.3);">
            <i data-lucide="file-text" class="w-4 h-4 flex-shrink-0"></i>
            Download CV
        </a>
        <a href="#portfolio"
           class="about-btn-secondary inline-flex items-center gap-2 px-5 py-2.5 sm:px-7 sm:py-3 rounded-lg font-display font-semibold text-sm transition-all duration-300 hover:-translate-y-0.5"
           style="background:transparent;border:1px solid rgba(123,92,240,0.5);color:#A78BFA;">
            <i data-lucide="code-2" class="w-4 h-4 flex-shrink-0"></i>
            View Projects
        </a>
    </div>

    {{-- Stats — 1 col phone, 3 col md+ --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-5 sa-group">
        @foreach($about['stats'] ?? [
            ['icon'=>'code-2','value'=>'6','label'=>'Total Projects',    'sublabel'=>'Innovative web & mobile solutions crafted'],
            ['icon'=>'award', 'value'=>'3','label'=>'Certificates',       'sublabel'=>'Professional skills validated'],
            ['icon'=>'globe', 'value'=>'2','label'=>'Years of Experience','sublabel'=>'Continuous learning journey'],
        ] as $stat)
            <div class="about-stat-card neon-card group relative overflow-hidden rounded-2xl p-5 sm:p-6 cursor-default"
                 style="background:linear-gradient(135deg,#1A1535 0%,#16142E 40%,#1E1440 100%);
                        box-shadow:inset 0 1px 0 rgba(255,255,255,0.04),0 4px 24px rgba(0,0,0,0.4);">

                <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"
                     style="background:radial-gradient(ellipse at 50% 0%,rgba(123,92,240,0.12) 0%,transparent 65%);"></div>

                {{-- On mobile: horizontal layout; on sm+: vertical --}}
                <div class="flex sm:block items-center gap-4">
                    <div class="flex sm:flex-none sm:justify-between sm:mb-5 items-center w-full relative z-10">
                        <div class="w-9 h-9 flex items-center justify-center rounded-full flex-shrink-0 transition-all duration-300 group-hover:scale-110"
                             style="background:rgba(123,92,240,0.18);border:1px solid rgba(123,92,240,0.3);color:#A78BFA;">
                            <i data-lucide="{{ $stat['icon'] }}" class="w-4 h-4"></i>
                        </div>
                        <span class="font-display font-bold leading-none transition-colors duration-300 group-hover:text-[#A78BFA] ml-auto sm:ml-0"
                              style="font-size:clamp(2rem,5vw,3rem);color:#FFFFFF;">
                            {{ $stat['value'] }}
                        </span>
                    </div>
                    <div class="relative z-10 min-w-0">
                        <p class="font-display font-semibold text-xs uppercase tracking-widest mb-1" style="color:#E2E8F0;letter-spacing:0.1em;">
                            {{ $stat['label'] }}
                        </p>
                        <p class="font-body text-xs" style="color:#64748B;">{{ $stat['sublabel'] }}</p>
                    </div>
                </div>

                <div class="absolute bottom-4 right-4 transition-all duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 group-hover:text-[#A78BFA]"
                     style="color:#334155;">
                    <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                </div>
                <div class="absolute inset-0 rounded-2xl pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-400"
                     style="border:1px solid rgba(123,92,240,0.55);box-shadow:0 0 20px rgba(123,92,240,0.15),inset 0 0 20px rgba(123,92,240,0.05);"></div>
            </div>
        @endforeach
    </div>

</div>
</section>

<style>
.about-btn-primary:hover {
    background:linear-gradient(135deg,#8B6CF0 0%,#7C3AED 100%) !important;
    box-shadow:0 6px 28px rgba(123,92,240,0.6),0 0 0 1px rgba(139,92,246,0.4) !important;
}
.about-btn-secondary:hover {
    background:rgba(123,92,240,0.1) !important;
    border-color:rgba(167,139,250,0.7) !important;
    color:#C4B5FD !important;
}
html:not(.dark) .about-stat-card {
    background:linear-gradient(135deg,#EDE9FE 0%,#F5F3FF 40%,#EEF2FF 100%) !important;
}
html:not(.dark) .about-stat-card span { color:#1E1B4B !important; }
html:not(.dark) .about-stat-card p:first-of-type { color:#1E1B4B !important; }
html:not(.dark) .about-stat-card p:last-of-type  { color:#6B7280 !important; }
</style>
