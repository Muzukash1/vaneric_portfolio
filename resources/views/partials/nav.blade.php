<nav class="fixed top-0 left-0 right-0 z-50 nav-blur" id="navbar">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        {{-- Logo --}}
        <a href="#home" class="font-display font-bold text-lg text-brand-light">
            {{ $developer['name'] ?? 'Vaneric San Pascual' }}
        </a>

        {{-- Desktop Nav --}}
        <ul class="hidden md:flex items-center gap-8">
            @foreach($navLinks ?? [['label' => 'Home', 'href' => '#home'], ['label' => 'About', 'href' => '#about'], ['label' => 'Portfolio', 'href' => '#portfolio'], ['label' => 'Contact', 'href' => '#contact']] as $link)
                <li>
                    <a href="{{ $link['href'] }}"
                       class="nav-link font-body text-sm font-medium text-gray-400 hover:text-white transition-colors duration-300 relative py-1">
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Mobile hamburger --}}
        <button class="md:hidden text-gray-400 hover:text-white transition-colors" id="mobile-menu-btn" aria-label="Open menu">
            <i data-lucide="menu" class="w-5 h-5"></i>
        </button>
    </div>

    {{-- Mobile menu --}}
    <div class="hidden md:hidden px-6 pb-4" id="mobile-menu">
        <ul class="flex flex-col gap-3">
            @foreach($navLinks ?? [['label' => 'Home', 'href' => '#home'], ['label' => 'About', 'href' => '#about'], ['label' => 'Portfolio', 'href' => '#portfolio'], ['label' => 'Contact', 'href' => '#contact']] as $link)
                <li>
                    <a href="{{ $link['href'] }}" class="block text-sm text-gray-400 hover:text-white py-1 transition-colors">
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
