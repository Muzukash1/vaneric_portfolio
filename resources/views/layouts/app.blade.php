<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark" id="html-root">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Portfolio | {{ $developer['name'] ?? 'Developer' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Syne','sans-serif'],
                        body:    ['DM Sans','sans-serif'],
                    },
                    colors: {
                        'brand':          '#7B5CF0',
                        'brand-light':    '#A78BFA',
                        'brand-dark':     '#5B21B6',
                        'surface':        '#0D0D1A',
                        'surface-card':   '#12121F',
                        'surface-raised': '#1A1A2E',
                        'border-dim':     '#1E1E35',
                    },
                }
            }
        }
    </script>

    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">

    <style>
        /* ── Reset & base ── */
        *, *::before, *::after { box-sizing: border-box; }
        body, body * {
            transition: background-color 0.45s ease, border-color 0.35s ease,
                        color 0.3s ease, box-shadow 0.35s ease;
        }
        .no-transition, .no-transition * { transition: none !important; }

        /* ── Dark mode base ── */
        html.dark body { background: #0D0D1A; color: #FFFFFF; }

        /* ── Light mode ── */
        html:not(.dark) body              { background: #F2F4FF; color: #0D0D2A; }
        html:not(.dark) .nav-blur         { background: rgba(242,244,255,0.9) !important; border-bottom: 1px solid rgba(123,92,240,0.15) !important; }
        html:not(.dark) .nav-blur.scrolled{ background: rgba(242,244,255,0.98) !important; }
        html:not(.dark) .nav-link         { color: #3A3A6A !important; }
        html:not(.dark) .nav-link.active,
        html:not(.dark) .nav-link:hover   { color: #0D0D2A !important; }
        html:not(.dark) .text-white        { color: #0D0D2A !important; }
        html:not(.dark) .text-gray-300     { color: #3A3A6A !important; }
        html:not(.dark) .text-gray-400     { color: #555580 !important; }
        html:not(.dark) .text-gray-500     { color: #7070A0 !important; }
        html:not(.dark) [class*="bg-surface-card"]   { background: #FFFFFF !important; }
        html:not(.dark) [class*="bg-surface-raised"] { background: #ECEEFF !important; }
        html:not(.dark) [class*="border-border-dim"] { border-color: rgba(123,92,240,0.2) !important; }
        html:not(.dark) .grid-overlay {
            background-image:
                linear-gradient(rgba(123,92,240,0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(123,92,240,0.06) 1px, transparent 1px) !important;
        }
        html:not(.dark) .neon-blob { opacity: 0.15 !important; }

        /* ── Profile image swap ── */
        .profile-img-dark, .profile-img-light {
            position: absolute; inset: 0;
            width: 100%; height: 100%;
            object-fit: cover; object-position: top center;
            transition: opacity 0.6s ease;
        }
        html.dark  .profile-img-dark  { opacity: 1; }
        html.dark  .profile-img-light { opacity: 0; }
        html:not(.dark) .profile-img-dark  { opacity: 0; }
        html:not(.dark) .profile-img-light { opacity: 1; }
        .profile-wrapper:hover .profile-img-dark  { opacity: 0 !important; }
        .profile-wrapper:hover .profile-img-light { opacity: 1 !important; }

        /* ── Grid overlay ── */
        .grid-overlay {
            background-image:
                linear-gradient(rgba(123,92,240,0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(123,92,240,0.04) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        /* ── Neon card glow ── */
        .neon-card {
            border: 1px solid rgba(123,92,240,0.22);
            transition: border-color 0.35s ease, box-shadow 0.35s ease, transform 0.3s ease !important;
        }
        .neon-card:hover {
            border-color: rgba(123,92,240,0.55) !important;
            box-shadow: 0 0 20px rgba(123,92,240,0.15), 0 0 50px rgba(123,92,240,0.06) !important;
            transform: translateY(-4px);
        }

        /* ── Scroll animation system ── */
        .sa {
            will-change: opacity, transform;
            transition-property: opacity, transform;
            transition-timing-function: cubic-bezier(0.22, 1, 0.36, 1);
            transition-duration: 0.65s;
        }
        .sa[data-sa="fade-up"]                            { opacity:0; transform:translateY(40px); }
        .sa[data-sa="fade-down"]                          { opacity:0; transform:translateY(-36px); }
        .sa[data-sa="slide-left"],.sa[data-sa="fade-left"]{ opacity:0; transform:translateX(-48px); }
        .sa[data-sa="slide-right"],.sa[data-sa="fade-right"]{ opacity:0; transform:translateX(48px); }
        .sa[data-sa="scale-up"]                           { opacity:0; transform:scale(0.88); }
        .sa[data-sa="fade"]                               { opacity:0; }
        .sa.sa-visible                                    { opacity:1 !important; transform:none !important; }

        /* sa-group stagger */
        .sa-group > * {
            opacity:0; transform:translateY(30px);
            will-change: opacity, transform;
            transition: opacity 0.55s cubic-bezier(0.22,1,0.36,1), transform 0.55s cubic-bezier(0.22,1,0.36,1);
        }
        .sa-group:not(.sa-visible) > * { transition-delay:0s !important; opacity:0 !important; transform:translateY(30px) !important; }
        .sa-group.sa-visible > *:nth-child(1)  { opacity:1;transform:none;transition-delay:0.04s; }
        .sa-group.sa-visible > *:nth-child(2)  { opacity:1;transform:none;transition-delay:0.12s; }
        .sa-group.sa-visible > *:nth-child(3)  { opacity:1;transform:none;transition-delay:0.20s; }
        .sa-group.sa-visible > *:nth-child(4)  { opacity:1;transform:none;transition-delay:0.28s; }
        .sa-group.sa-visible > *:nth-child(5)  { opacity:1;transform:none;transition-delay:0.36s; }
        .sa-group.sa-visible > *:nth-child(6)  { opacity:1;transform:none;transition-delay:0.44s; }
        .sa-group.sa-visible > *:nth-child(7)  { opacity:1;transform:none;transition-delay:0.52s; }
        .sa-group.sa-visible > *:nth-child(8)  { opacity:1;transform:none;transition-delay:0.60s; }
        .sa-group.sa-visible > *:nth-child(9)  { opacity:1;transform:none;transition-delay:0.68s; }
        .sa-group.sa-visible > *:nth-child(10) { opacity:1;transform:none;transition-delay:0.76s; }

        /* Hero animation */
        @keyframes fadeUp { from{opacity:0;transform:translateY(30px)} to{opacity:1;transform:translateY(0)} }
        .afu { animation: fadeUp 0.7s ease forwards; }

        /* ── Neon blob keyframes ── */
        @keyframes driftBlue {
            0%   { opacity:0.55; transform:translate(0,0) scale(1); }
            25%  { opacity:0.68; transform:translate(18px,-14px) scale(1.04); }
            50%  { opacity:0.72; transform:translate(10px,20px) scale(1.07); }
            75%  { opacity:0.60; transform:translate(-12px,10px) scale(1.02); }
            100% { opacity:0.55; transform:translate(0,0) scale(1); }
        }
        @keyframes driftRed {
            0%   { opacity:0.45; transform:translate(0,0) scale(1); }
            25%  { opacity:0.58; transform:translate(-16px,12px) scale(1.05); }
            50%  { opacity:0.62; transform:translate(8px,-18px) scale(1.08); }
            75%  { opacity:0.50; transform:translate(14px,8px) scale(1.03); }
            100% { opacity:0.45; transform:translate(0,0) scale(1); }
        }
        @keyframes driftPurple {
            0%,100% { opacity:0.35; transform:translate(0,0) scale(1); }
            50%     { opacity:0.45; transform:translate(-8px,12px) scale(1.05); }
        }

        /* ── Scrollbar ── */
        ::-webkit-scrollbar       { width:5px; }
        ::-webkit-scrollbar-track { background:#0D0D1A; }
        ::-webkit-scrollbar-thumb { background:#1E1E35; border-radius:9999px; }
        ::-webkit-scrollbar-thumb:hover { background:#7B5CF0; }
        ::selection { background:rgba(123,92,240,0.35); color:#fff; }
    </style>
</head>

<body class="font-body overflow-x-hidden">

    {{-- Fixed global background --}}
    <div class="fixed inset-0 z-0 pointer-events-none" aria-hidden="true">
        <div class="grid-overlay absolute inset-0"></div>

        <div class="neon-blob" style="position:absolute;top:2%;right:4%;width:clamp(280px,48vw,750px);height:clamp(280px,48vw,750px);border-radius:9999px;background:radial-gradient(circle at 40% 40%,rgba(0,170,255,0.13) 0%,rgba(0,170,255,0.05) 45%,transparent 70%);filter:blur(18px);animation:driftBlue 18s ease-in-out infinite;"></div>
        <div class="neon-blob" style="position:absolute;top:30%;left:-2%;width:clamp(220px,42vw,640px);height:clamp(220px,42vw,640px);border-radius:9999px;background:radial-gradient(circle at 60% 40%,rgba(255,34,68,0.11) 0%,rgba(255,34,68,0.04) 45%,transparent 70%);filter:blur(20px);animation:driftRed 22s ease-in-out infinite 2s;"></div>
        <div class="neon-blob" style="position:absolute;bottom:4%;right:18%;width:clamp(180px,35vw,520px);height:clamp(180px,35vw,520px);border-radius:9999px;background:radial-gradient(circle at 50% 50%,rgba(0,170,255,0.10) 0%,rgba(0,170,255,0.03) 45%,transparent 70%);filter:blur(22px);animation:driftBlue 25s ease-in-out infinite 5s;"></div>
        <div class="neon-blob" style="position:absolute;bottom:12%;left:10%;width:clamp(160px,32vw,460px);height:clamp(160px,32vw,460px);border-radius:9999px;background:radial-gradient(circle at 50% 50%,rgba(255,34,68,0.09) 0%,rgba(255,34,68,0.03) 45%,transparent 70%);filter:blur(20px);animation:driftRed 20s ease-in-out infinite 8s;"></div>
        <div class="neon-blob" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:clamp(280px,55vw,900px);height:clamp(280px,55vw,900px);border-radius:9999px;background:radial-gradient(circle at 50% 50%,rgba(123,92,240,0.06) 0%,transparent 65%);filter:blur(30px);animation:driftPurple 35s ease-in-out infinite 1s;"></div>
    </div>

    @include('partials.nav')
    <main class="relative z-10">@yield('content')</main>
    @include('partials.footer')
    @include('partials.chatbot')

    <script>lucide.createIcons();</script>
    <script src="{{ asset('js/portfolio.js') }}"></script>
</body>
</html>
