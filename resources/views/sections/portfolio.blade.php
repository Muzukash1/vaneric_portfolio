<section id="portfolio" class="py-16 sm:py-20 md:py-24 px-4 sm:px-6">
<div class="max-w-7xl mx-auto">

    {{-- Header --}}
    <div class="text-center mb-6 sa" data-sa="fade-down">
        <h2 class="font-display font-bold text-3xl sm:text-4xl md:text-5xl mb-3"
            style="background:linear-gradient(90deg,#A78BFA 0%,#C084FC 50%,#A78BFA 100%);
                   -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">
            Portfolio Showcase
        </h2>
        <p class="font-body text-gray-400 max-w-xl mx-auto text-sm leading-relaxed mt-2 px-2">
            Explore my journey through projects, certifications, and technical expertise.
        </p>
    </div>

    {{-- Tabs — stack vertically on phone, horizontal on sm+ --}}
    <div class="sa flex flex-col xs:flex-row gap-1 p-1.5 rounded-xl w-full sm:max-w-xl mx-auto mb-10 sm:mb-14"
         data-sa="fade-up" data-sa-delay="120"
         style="background:#16142E;border:1px solid rgba(123,92,240,0.25);">
        <button onclick="switchTab('projects')" id="tab-projects"
            class="portfolio-tab active flex-1 flex items-center justify-center gap-2 px-3 py-2.5 sm:px-4 rounded-lg font-display font-semibold text-xs sm:text-sm transition-all duration-300">
            <i data-lucide="code-2" class="w-3.5 h-3.5 sm:w-4 sm:h-4 flex-shrink-0"></i> Projects
        </button>
        <button onclick="switchTab('certificates')" id="tab-certificates"
            class="portfolio-tab flex-1 flex items-center justify-center gap-2 px-3 py-2.5 sm:px-4 rounded-lg font-display font-semibold text-xs sm:text-sm transition-all duration-300">
            <i data-lucide="award" class="w-3.5 h-3.5 sm:w-4 sm:h-4 flex-shrink-0"></i> Certificates
        </button>
        <button onclick="switchTab('techstack')" id="tab-techstack"
            class="portfolio-tab flex-1 flex items-center justify-center gap-2 px-3 py-2.5 sm:px-4 rounded-lg font-display font-semibold text-xs sm:text-sm transition-all duration-300">
            <i data-lucide="layers" class="w-3.5 h-3.5 sm:w-4 sm:h-4 flex-shrink-0"></i> Tech Stack
        </button>
    </div>

    {{-- Projects --}}
    <div id="panel-projects" class="tab-panel">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 sa-group">
            @foreach($portfolio['projects'] ?? [] as $i => $project)
                <div class="portfolio-project-card neon-card group relative overflow-hidden rounded-2xl"
                     style="background:linear-gradient(135deg,#1A1535 0%,#16142E 40%,#1E1440 100%);
                            box-shadow:inset 0 1px 0 rgba(255,255,255,0.04),0 4px 24px rgba(0,0,0,0.4);">

                    <div class="relative h-36 sm:h-44 overflow-hidden">
                        <div class="absolute inset-0 z-10" style="background:linear-gradient(to bottom,transparent 40%,#1A1535 100%);"></div>
                        @if(!empty($project['image']))
                            <img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div class="w-full h-full flex items-center justify-center"
                                 style="background:linear-gradient(135deg,rgba(123,92,240,0.15),rgba(139,92,246,0.08),#1A1535);">
                                <i data-lucide="code-2" class="w-10 h-10 transition-transform duration-300 group-hover:scale-110"
                                   style="color:rgba(167,139,250,0.5);"></i>
                            </div>
                        @endif
                    </div>

                    <div class="p-4 sm:p-5 relative z-10">
                        <h3 class="font-display font-bold text-sm sm:text-base text-white mb-2 transition-colors duration-300 group-hover:text-[#A78BFA]">
                            {{ $project['title'] }}
                        </h3>
                        <p class="font-body text-xs leading-relaxed mb-3 sm:mb-4" style="color:#64748B;">
                            {{ $project['description'] }}
                        </p>

                        @if(!empty($project['tags']))
                            <div class="flex flex-wrap gap-1.5 mb-3 sm:mb-4">
                                @foreach($project['tags'] as $tag)
                                    <span class="px-2 py-0.5 rounded-md text-xs font-body"
                                          style="background:rgba(123,92,240,0.12);color:#A78BFA;border:1px solid rgba(123,92,240,0.25);">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <div class="flex items-center justify-between pt-2 border-t" style="border-color:rgba(123,92,240,0.15);">
                            @if(!empty($project['demo_url']))
                                <a href="{{ $project['demo_url'] }}" target="_blank"
                                   class="inline-flex items-center gap-1.5 text-xs font-body font-medium transition-colors"
                                   style="color:#A78BFA;"
                                   onmouseover="this.style.color='#C4B5FD'"
                                   onmouseout="this.style.color='#A78BFA'">
                                    <i data-lucide="external-link" class="w-3 h-3"></i> Live Demo
                                </a>
                            @endif
                            <a href="{{ $project['details_url'] ?? '#' }}"
                               class="inline-flex items-center gap-1.5 text-xs font-body font-medium transition-colors ml-auto"
                               style="color:#475569;"
                               onmouseover="this.style.color='#E2E8F0'"
                               onmouseout="this.style.color='#475569'">
                                Details <i data-lucide="arrow-right" class="w-3 h-3"></i>
                            </a>
                        </div>
                    </div>

                    <div class="absolute inset-0 rounded-2xl pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-400"
                         style="border:1px solid rgba(123,92,240,0.55);box-shadow:0 0 24px rgba(123,92,240,0.12),inset 0 0 24px rgba(123,92,240,0.04);"></div>
                </div>
            @endforeach
        </div>

        @if($portfolio['has_more_projects'] ?? false)
            <div class="text-center mt-8 sa" data-sa="fade-up">
                <button class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-display font-semibold transition-all duration-300 hover:-translate-y-0.5"
                        style="background:rgba(123,92,240,0.1);border:1px solid rgba(123,92,240,0.3);color:#A78BFA;">
                    <i data-lucide="chevrons-down" class="w-4 h-4"></i> See More
                </button>
            </div>
        @endif
    </div>

    {{-- Certificates --}}
    <div id="panel-certificates" class="tab-panel hidden">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 sa-group">
            @foreach($portfolio['certificates'] ?? [] as $cert)
                <div class="portfolio-cert-card neon-card group relative overflow-hidden rounded-2xl p-5 sm:p-6"
                     style="background:linear-gradient(135deg,#1A1535 0%,#16142E 40%,#1E1440 100%);
                            box-shadow:inset 0 1px 0 rgba(255,255,255,0.04),0 4px 24px rgba(0,0,0,0.3);">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 flex items-center justify-center rounded-full mb-4 transition-all duration-300 group-hover:scale-110"
                         style="background:rgba(123,92,240,0.18);border:1px solid rgba(123,92,240,0.3);color:#A78BFA;">
                        <i data-lucide="award" class="w-4 h-4 sm:w-5 sm:h-5"></i>
                    </div>
                    <h3 class="font-display font-bold text-sm text-white mb-1 group-hover:text-[#A78BFA] transition-colors">
                        {{ $cert['title'] }}
                    </h3>
                    <p class="text-xs font-body mb-3" style="color:#64748B;">{{ $cert['issuer'] }} &bull; {{ $cert['date'] }}</p>
                    @if(!empty($cert['url']))
                        <a href="{{ $cert['url'] }}" target="_blank"
                           class="inline-flex items-center gap-1 text-xs font-body transition-colors"
                           style="color:#A78BFA;"
                           onmouseover="this.style.color='#C4B5FD'"
                           onmouseout="this.style.color='#A78BFA'">
                            View Certificate <i data-lucide="external-link" class="w-3 h-3"></i>
                        </a>
                    @endif
                    <div class="absolute inset-0 rounded-2xl pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-400"
                         style="border:1px solid rgba(123,92,240,0.55);box-shadow:0 0 20px rgba(123,92,240,0.1);"></div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Tech Stack --}}
    <div id="panel-techstack" class="tab-panel hidden">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
            @foreach($portfolio['tech_stack'] ?? [] as $idx => $category)
                <div class="sa" data-sa="{{ $idx % 2 === 0 ? 'slide-left' : 'slide-right' }}"
                     data-sa-delay="{{ $idx * 80 }}">
                    <h3 class="font-display font-semibold text-xs uppercase tracking-widest mb-3 sm:mb-4" style="color:#64748B;">
                        {{ $category['category'] }}
                    </h3>
                    <div class="flex flex-wrap gap-2 sm:gap-3">
                        @foreach($category['items'] as $tech)
                            <div class="tech-chip neon-card group flex items-center gap-2 px-3 py-2 sm:px-4 sm:py-2.5 rounded-xl cursor-default transition-all duration-300"
                                 style="background:linear-gradient(135deg,#1A1535,#16142E);">
                                @if(!empty($tech['icon']))
                                    <i data-lucide="{{ $tech['icon'] }}" class="w-3.5 h-3.5 sm:w-4 sm:h-4 flex-shrink-0" style="color:#A78BFA;"></i>
                                @endif
                                <span class="font-body text-xs sm:text-sm text-gray-300 group-hover:text-white transition-colors">
                                    {{ $tech['name'] }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
</section>

<style>
.portfolio-tab { color:#64748B;background:transparent;cursor:pointer;border:none;outline:none; }
.portfolio-tab.active {
    background:linear-gradient(135deg,#2D1F6E,#1E1B4B);
    color:#C4B5FD;
    box-shadow:0 0 0 1px rgba(123,92,240,0.4),0 4px 12px rgba(123,92,240,0.15);
}
.portfolio-tab:hover:not(.active) { color:#A78BFA;background:rgba(123,92,240,0.08); }
.tab-panel.hidden { display:none; }

html:not(.dark) .portfolio-project-card,
html:not(.dark) .portfolio-cert-card {
    background:linear-gradient(135deg,#EDE9FE,#F5F3FF,#EEF2FF) !important;
}
html:not(.dark) .tech-chip {
    background:linear-gradient(135deg,#EDE9FE,#F5F3FF) !important;
}

/* xs tab layout */
@media (max-width:389px) { .xs\:flex-row { flex-direction:column !important; } }
@media (min-width:390px) { .xs\:flex-row { flex-direction:row !important; } }
</style>

<script>
function switchTab(tab) {
    document.querySelectorAll('.portfolio-tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.add('hidden'));
    document.getElementById('tab-' + tab).classList.add('active');
    const panel = document.getElementById('panel-' + tab);
    panel.classList.remove('hidden');
    panel.querySelectorAll('.sa,.sa-group').forEach(el => {
        el.classList.remove('sa-visible');
        void el.offsetWidth;
        setTimeout(() => el.classList.add('sa-visible'), 60);
    });
    lucide.createIcons();
}
</script>
