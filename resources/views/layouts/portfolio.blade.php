@php($home = request()->routeIs('home') ? '' : route('home'))
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $p['name'] . ' — ' . $p['roles'][0])</title>
    <meta name="description" content="@yield('description', $p['tagline'])">
    <meta property="og:title" content="@yield('title', $p['name'] . ' — ' . $p['roles'][0])">
    <meta property="og:description" content="@yield('description', $p['tagline'])">
    <meta property="og:image" content="@yield('og_image', asset($p['avatar']))">
    <meta name="theme-color" content="#07080d">
    <script>document.documentElement.classList.add('js')</script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600|space-grotesk:500,600,700|jetbrains-mono:400,500" rel="stylesheet">
    @vite(['resources/css/portfolio.css', 'resources/js/portfolio.js'])
</head>

<body>
    <div class="bg" aria-hidden="true">
        <div class="blob b1"></div>
        <div class="blob b2"></div>
        <div class="blob b3"></div>
        <div class="grid-lines"></div>
    </div>
    <div class="cursor-glow" aria-hidden="true"></div>
    <div class="progress" aria-hidden="true"></div>

    <header class="nav-wrap">
        <nav class="nav glass" id="nav">
            <a href="{{ route('home') }}" class="logo" id="nav-logo"><span class="logo-mark">{{ strtoupper(substr($p['handle'], 0, 1)) }}</span>{{ $p['handle'] }}<span class="accent">.</span></a>
            <ul class="nav-links" id="nav-links">
                <li><a href="{{ $home }}#about" data-section="about">About</a></li>
                <li><a href="{{ $home }}#skills" data-section="skills">Skills</a></li>
                <li><a href="{{ $home }}#projects" data-section="projects">Projects</a></li>
                <li><a href="{{ $home }}#journey" data-section="journey">Journey</a></li>
                <li><a href="{{ route('blog.index') }}" @class(['active' => request()->routeIs('blog.*')])>Blog</a></li>
            </ul>
            <a href="{{ $home }}#contact" class="btn btn-sm btn-primary nav-cta" id="nav-cta">Let's talk</a>
            <button class="nav-toggle" id="nav-toggle" aria-label="Toggle menu" aria-expanded="false"><x-icon name="menu" size="22" /></button>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container footer-inner">
            <p>© {{ date('Y') }} {{ $p['name'] }}. Built with Laravel &amp; a lot of coffee.</p>
            <div class="socials">
                @foreach ($p['socials'] as $name => $url)
                    <a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($name) }}" id="footer-social-{{ $name }}"><x-icon :name="$name" /></a>
                @endforeach
            </div>
            <a href="#top" class="to-top" id="to-top">Back to top ↑</a>
        </div>
    </footer>

    {{-- Live preview modal (native <dialog>) --}}
    <dialog class="preview" id="preview">
        <div class="preview-bar">
            <div class="dots"><i></i><i></i><i></i></div>
            <div class="preview-url" id="preview-url"></div>
            <div class="preview-devices" role="group" aria-label="Device size">
                <button data-w="100%" class="active" id="device-desktop" aria-label="Desktop"><x-icon name="monitor" /></button>
                <button data-w="820px" id="device-tablet" aria-label="Tablet"><x-icon name="tablet" /></button>
                <button data-w="390px" id="device-phone" aria-label="Phone"><x-icon name="phone" /></button>
            </div>
            <a class="preview-open" id="preview-open" target="_blank" rel="noopener" aria-label="Open in new tab"><x-icon name="external" /></a>
            <button class="preview-close" id="preview-close" aria-label="Close preview"><x-icon name="close" /></button>
        </div>
        <div class="preview-stage">
            <div class="preview-loading" id="preview-loading"><span class="spinner"></span>Loading live preview…
                <small>Blank? The site may block embedding — use the ↗ button to open it in a new tab.</small>
            </div>
            <iframe id="preview-frame" title="Live project preview" loading="lazy"></iframe>
        </div>
    </dialog>
</body>

</html>
