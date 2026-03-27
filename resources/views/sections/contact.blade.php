<section id="contact" class="py-16 sm:py-20 md:py-24 px-4 sm:px-6">
<div class="max-w-7xl mx-auto">

    {{-- Header --}}
    <div class="text-center mb-10 sm:mb-14 md:mb-16 sa" data-sa="fade-down">
        <h2 class="font-display font-bold text-3xl sm:text-4xl md:text-5xl mb-3">
            Get In
            <span style="background:linear-gradient(90deg,#A78BFA,#C084FC);
                         -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">
                Touch
            </span>
        </h2>
        <div class="w-16 sm:w-20 h-0.5 mx-auto rounded-full mt-2"
             style="background:linear-gradient(90deg,#7B5CF0,#A78BFA);"></div>
        <p class="font-body text-gray-400 text-sm max-w-md mx-auto mt-3 px-2">
            Have a project in mind or just want to say hi? My inbox is always open.
        </p>
    </div>

    {{-- Grid: stacks on mobile, 5-col on lg --}}
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-4 sm:gap-6 max-w-4xl mx-auto">

        {{-- Info cards --}}
        <div class="lg:col-span-2 flex flex-col gap-3 sm:gap-4">
            @foreach($contact['info'] ?? [
                ['icon'=>'mail',    'label'=>'Email',    'value'=>'vaneric@example.com','href'=>'mailto:vaneric@example.com'],
                ['icon'=>'map-pin', 'label'=>'Location', 'value'=>'Philippines',        'href'=>'#'],
                ['icon'=>'github',  'label'=>'GitHub',   'value'=>'github.com/vaneric', 'href'=>'#'],
            ] as $i => $info)
                <a href="{{ $info['href'] }}"
                   class="contact-info-card neon-card sa group relative overflow-hidden flex items-center gap-3 sm:gap-4 p-3.5 sm:p-4 rounded-2xl transition-all duration-300 hover:-translate-y-0.5"
                   data-sa="slide-left" data-sa-delay="{{ $i * 100 }}"
                   style="background:linear-gradient(135deg,#1A1535 0%,#16142E 100%);
                          box-shadow:inset 0 1px 0 rgba(255,255,255,0.04);">
                    <div class="w-8 h-8 sm:w-9 sm:h-9 flex items-center justify-center rounded-full flex-shrink-0 transition-all duration-300 group-hover:scale-110"
                         style="background:rgba(123,92,240,0.18);border:1px solid rgba(123,92,240,0.3);color:#A78BFA;">
                        <i data-lucide="{{ $info['icon'] }}" class="w-3.5 h-3.5 sm:w-4 sm:h-4"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="font-display font-semibold text-xs uppercase tracking-wider mb-0.5" style="color:#64748B;">
                            {{ $info['label'] }}
                        </p>
                        <p class="font-body text-sm text-gray-200 group-hover:text-white transition-colors truncate">
                            {{ $info['value'] }}
                        </p>
                    </div>
                    <div class="absolute inset-0 rounded-2xl pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-400"
                         style="border:1px solid rgba(123,92,240,0.5);box-shadow:0 0 18px rgba(123,92,240,0.1);"></div>
                </a>
            @endforeach
        </div>

        {{-- Form --}}
        <div class="lg:col-span-3 sa" data-sa="slide-right" data-sa-delay="150">
            <div class="contact-form-card neon-card relative overflow-hidden rounded-2xl p-4 sm:p-6"
                 style="background:linear-gradient(135deg,#1A1535 0%,#16142E 40%,#1E1440 100%);
                        box-shadow:inset 0 1px 0 rgba(255,255,255,0.04),0 4px 24px rgba(0,0,0,0.3);">

                @if(session('success'))
                    <div class="mb-4 p-3 rounded-xl text-sm font-body"
                         style="background:rgba(123,92,240,0.1);border:1px solid rgba(123,92,240,0.3);color:#A78BFA;">
                        ✓ {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST" class="space-y-3 sm:space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                        <div>
                            <label class="block text-xs font-display font-semibold uppercase tracking-wider mb-1.5" style="color:#64748B;">Name</label>
                            <input type="text" name="name" required placeholder="Your name"
                                   class="contact-field w-full px-3.5 py-2.5 rounded-xl text-white text-sm font-body placeholder:text-gray-600 focus:outline-none transition-all duration-300"
                                   style="background:rgba(13,13,26,0.6);border:1px solid rgba(123,92,240,0.2);color:#E2E8F0;">
                            @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-display font-semibold uppercase tracking-wider mb-1.5" style="color:#64748B;">Email</label>
                            <input type="email" name="email" required placeholder="you@example.com"
                                   class="contact-field w-full px-3.5 py-2.5 rounded-xl text-white text-sm font-body placeholder:text-gray-600 focus:outline-none transition-all duration-300"
                                   style="background:rgba(13,13,26,0.6);border:1px solid rgba(123,92,240,0.2);color:#E2E8F0;">
                            @error('email') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-display font-semibold uppercase tracking-wider mb-1.5" style="color:#64748B;">Subject</label>
                        <input type="text" name="subject" placeholder="What's it about?"
                               class="contact-field w-full px-3.5 py-2.5 rounded-xl text-white text-sm font-body placeholder:text-gray-600 focus:outline-none transition-all duration-300"
                               style="background:rgba(13,13,26,0.6);border:1px solid rgba(123,92,240,0.2);color:#E2E8F0;">
                    </div>
                    <div>
                        <label class="block text-xs font-display font-semibold uppercase tracking-wider mb-1.5" style="color:#64748B;">Message</label>
                        <textarea name="message" rows="4" required placeholder="Tell me about your project..."
                                  class="contact-field w-full px-3.5 py-2.5 rounded-xl text-white text-sm font-body placeholder:text-gray-600 focus:outline-none transition-all duration-300 resize-none"
                                  style="background:rgba(13,13,26,0.6);border:1px solid rgba(123,92,240,0.2);color:#E2E8F0;"></textarea>
                        @error('message') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit"
                            class="contact-submit w-full py-2.5 sm:py-3 rounded-xl font-display font-semibold text-sm text-white transition-all duration-300 hover:-translate-y-0.5 flex items-center justify-center gap-2"
                            style="background:linear-gradient(135deg,#7B5CF0 0%,#6D28D9 100%);
                                   box-shadow:0 4px 20px rgba(123,92,240,0.35),0 0 0 1px rgba(123,92,240,0.3);">
                        <i data-lucide="send" class="w-4 h-4"></i> Send Message
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
</section>

<style>
.contact-field:focus {
    border-color:rgba(123,92,240,0.6) !important;
    box-shadow:0 0 0 3px rgba(123,92,240,0.08),0 0 16px rgba(123,92,240,0.1) !important;
    background:rgba(13,13,26,0.8) !important;
}
.contact-submit:hover {
    background:linear-gradient(135deg,#8B6CF0 0%,#7C3AED 100%) !important;
    box-shadow:0 6px 28px rgba(123,92,240,0.55),0 0 0 1px rgba(139,92,246,0.4) !important;
}
html:not(.dark) .contact-info-card,
html:not(.dark) .contact-form-card {
    background:linear-gradient(135deg,#EDE9FE,#F5F3FF) !important;
}
html:not(.dark) .contact-field {
    background:rgba(255,255,255,0.8) !important;
    color:#1E1B4B !important;
    border-color:rgba(123,92,240,0.25) !important;
}
</style>
