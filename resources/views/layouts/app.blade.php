<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark" id="html-root">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Force HTTPS upgrade for any stray mixed-content requests --}}
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Portfolio | {{ $developer['name'] ?? 'Developer' }}</title>

    {{-- Google Fonts — always loads over HTTPS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">

    {{--
        Lucide icons — loaded from cdnjs (HTTPS, production-safe CDN)
        cdnjs is reliable for production; only cdn.tailwindcss.com is flagged as dev-only.
    --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/umd/lucide.min.js"
            integrity="sha512-1zcJtYHLPaQMVoMdC1p0YtCpBnBQXUJzS5q3fxm8bqjmQTyAfRMjbXHb8J3aIFb5BSSV5z6MCQv0QVhWLQ9A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{--
        Tailwind — loaded from cdnjs as a COMPILED utility CSS bundle.
        This replaces cdn.tailwindcss.com (which is dev-only and not for production).
        All Tailwind utility classes your blade files use are included in this build.
    --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
          integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Pr/zvlaipkNAFQPDS3IpGhoea5uNSHHIeTcHT3K7pXCPMgqYFDkBLiqSEA=="
          crossorigin="anonymous" referrerpolicy="no-referrer">

    {{--
        Your own CSS — asset() generates a relative URL which Laravel/Nginx
        serves correctly. The TrustProxies middleware ensures it renders as HTTPS.
    --}}
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">

    {{-- Apply saved theme before first paint — prevents white flash --}}
    <script>
        (function(){
            var s = localStorage.getItem('portfolio-theme') || 'dark';
            document.documentElement.classList.toggle('dark', s === 'dark');
        })();
    </script>
</head>

<body class="font-body overflow-x-hidden" style="background:#0D0D1A;">

    {{-- ══════════════════════════════════════
         GLOBAL FIXED BACKGROUND — neon blobs
    ══════════════════════════════════════ --}}
    <div class="fixed inset-0 z-0 pointer-events-none" aria-hidden="true">
        <div class="grid-overlay absolute inset-0"></div>

        <div class="neon-blob" style="position:absolute;top:2%;right:4%;width:clamp(280px,48vw,750px);height:clamp(280px,48vw,750px);border-radius:9999px;background:radial-gradient(circle at 40% 40%,rgba(0,170,255,0.13) 0%,rgba(0,170,255,0.05) 45%,transparent 70%);filter:blur(18px);animation:driftBlue 18s ease-in-out infinite;"></div>
        <div class="neon-blob" style="position:absolute;top:30%;left:-2%;width:clamp(220px,42vw,640px);height:clamp(220px,42vw,640px);border-radius:9999px;background:radial-gradient(circle at 60% 40%,rgba(255,34,68,0.11) 0%,rgba(255,34,68,0.04) 45%,transparent 70%);filter:blur(20px);animation:driftRed 22s ease-in-out infinite 2s;"></div>
        <div class="neon-blob" style="position:absolute;bottom:4%;right:18%;width:clamp(180px,35vw,520px);height:clamp(180px,35vw,520px);border-radius:9999px;background:radial-gradient(circle at 50% 50%,rgba(0,170,255,0.10) 0%,rgba(0,170,255,0.03) 45%,transparent 70%);filter:blur(22px);animation:driftBlue 25s ease-in-out infinite 5s;"></div>
        <div class="neon-blob" style="position:absolute;bottom:12%;left:10%;width:clamp(160px,32vw,460px);height:clamp(160px,32vw,460px);border-radius:9999px;background:radial-gradient(circle at 50% 50%,rgba(255,34,68,0.09) 0%,rgba(255,34,68,0.03) 45%,transparent 70%);filter:blur(20px);animation:driftRed 20s ease-in-out infinite 8s;"></div>
        <div class="neon-blob" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:clamp(280px,55vw,900px);height:clamp(280px,55vw,900px);border-radius:9999px;background:radial-gradient(circle at 50% 50%,rgba(123,92,240,0.06) 0%,transparent 65%);filter:blur(30px);animation:driftPurple 35s ease-in-out infinite 1s;"></div>
    </div>

    @include('partials.nav')

    <main class="relative z-10">
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.chatbot')

    <script>
        if (typeof lucide !== 'undefined') lucide.createIcons();
    </script>
    {{-- asset() URL is relative — served correctly over HTTPS by Render --}}
    <script src="{{ asset('js/portfolio.js') }}"></script>
</body>
</html>
