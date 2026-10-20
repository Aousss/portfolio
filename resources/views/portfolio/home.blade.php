@extends('layouts.portfolio')

@section('content')
    {{-- ================= HERO ================= --}}
    <section class="hero container" id="top">
        <div class="hero-text">
            @if ($p['available'])
                <span class="pill reveal"><span class="pulse"></span> Available for freelance &amp; full-time work</span>
            @endif
            <h1 class="reveal">Hi, I'm <span class="gradient-text">{{ $p['name'] }}</span><span class="wave">👋</span></h1>
            <p class="hero-role reveal">
                <span class="mono">&lt;</span><span class="typed" id="typed" data-words='@json($p['roles'])'>{{ $p['roles'][0] }}</span><span class="caret"></span><span class="mono">/&gt;</span>
            </p>
            <p class="hero-sub reveal">{{ $p['tagline'] }}</p>
            <div class="hero-cta reveal">
                <a href="#projects" class="btn btn-primary" id="hero-projects">View my work <x-icon name="arrow-right" /></a>
                <a href="#contact" class="btn btn-ghost" id="hero-contact">Get in touch</a>
            </div>
            <div class="hero-socials reveal">
                @foreach ($p['socials'] as $name => $url)
                    <a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($name) }}" id="hero-social-{{ $name }}"><x-icon :name="$name" size="20" /></a>
                @endforeach
                <span class="loc"><x-icon name="map-pin" size="16" /> {{ $p['location'] }}</span>
            </div>
        </div>

        <div class="hero-visual reveal">
            <div class="avatar-ring">
                <img src="{{ asset($p['avatar']) }}" alt="Portrait of {{ $p['name'] }}" class="avatar" width="420" height="420">
            </div>
            <div class="float-card glass fc1"><x-icon name="code" /> <div><b>{{ count($p['projects']) }}+</b><small>Featured builds</small></div></div>
            <div class="float-card glass fc2"><span class="dot-green"></span> <div><b>Laravel</b><small>Main stack</small></div></div>
            <div class="code-card glass fc3">
<pre><span class="k">$dev</span> = <span class="f">new</span> Developer(
  name: <span class="s">'{{ $p['name'] }}'</span>,
  loves: [<span class="s">'clean code'</span>],
);</pre>
            </div>
        </div>
    </section>

    <section class="stats container">
        @foreach ($p['stats'] as $s)
            <div class="stat glass reveal">
                <b><span data-count="{{ $s['value'] }}">0</span>{{ $s['suffix'] }}</b>
                <span>{{ $s['label'] }}</span>
            </div>
        @endforeach
    </section>

    {{-- tech marquee --}}
    <div class="marquee" aria-hidden="true">
        <div class="marquee-track">
            @foreach ([1, 2] as $_)
                @foreach (collect($p['skills'])->flatten() as $tech)
                    <span>{{ $tech }}</span><i>✦</i>
                @endforeach
            @endforeach
        </div>
    </div>

    {{-- ================= ABOUT ================= --}}
    <section class="section container" id="about">
        <div class="section-head reveal">
            <span class="eyebrow">01 — About me</span>
            <h2>Code that solves <span class="gradient-text">real problems</span></h2>
        </div>
        <div class="about-grid">
            <div class="about-text reveal">
                @foreach ($p['bio'] as $para)
                    <p>{{ $para }}</p>
                @endforeach
                <a href="#contact" class="link-arrow" id="about-contact">Let's build something together <x-icon name="arrow-right" size="16" /></a>
            </div>
            <div class="about-card glass glow-card reveal">
                <dl>
                    <div><dt>Name</dt><dd>{{ $p['name'] }}</dd></div>
                    <div><dt>Role</dt><dd>{{ $p['roles'][0] }}</dd></div>
                    <div><dt>Based in</dt><dd>{{ $p['location'] }}</dd></div>
                    <div><dt>Email</dt><dd><a href="mailto:{{ $p['email'] }}">{{ $p['email'] }}</a></dd></div>
                    <div><dt>Status</dt><dd class="ok">{{ $p['available'] ? 'Open to opportunities' : 'Currently busy' }}</dd></div>
                </dl>
            </div>
        </div>
    </section>

    {{-- ================= SKILLS ================= --}}
    <section class="section container" id="skills">
        <div class="section-head reveal">
            <span class="eyebrow">02 — Skills</span>
            <h2>My <span class="gradient-text">tech stack</span></h2>
        </div>
        <div class="skills-grid">
            @foreach ($p['skills'] as $group => $items)
                <div class="skill-card glass glow-card reveal">
                    <div class="skill-icon"><x-icon :name="['layers', 'server', 'wrench'][$loop->index] ?? 'sparkle'" size="22" /></div>
                    <h3>{{ $group }}</h3>
                    <ul class="chips">
                        @foreach ($items as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ================= PROJECTS ================= --}}
    <section class="section container" id="projects">
        <div class="section-head reveal">
            <span class="eyebrow">03 — Projects</span>
            <h2>Things I've <span class="gradient-text">built &amp; shipped</span></h2>
            <p>Every project comes with proof: a live preview you can try right here, the source code, and a full case study.</p>
        </div>
        <div class="filters reveal" role="group" aria-label="Filter projects" id="project-filters">
            <button class="active" data-filter="all" id="filter-all">All</button>
            @foreach (collect($p['projects'])->pluck('category')->unique() as $cat)
                <button data-filter="{{ $cat }}" id="filter-{{ Str::slug($cat) }}">{{ $cat }}</button>
            @endforeach
        </div>
        <div class="projects-grid">
            @foreach ($p['projects'] as $project)
                @include('portfolio.partials.project-card')
            @endforeach
        </div>
    </section>

    {{-- ================= JOURNEY ================= --}}
    <section class="section container" id="journey">
        <div class="section-head reveal">
            <span class="eyebrow">04 — Journey</span>
            <h2>Experience &amp; <span class="gradient-text">education</span></h2>
        </div>
        <div class="journey-grid">
            <ol class="timeline">
                @foreach ($p['experience'] as $e)
                    <li class="reveal">
                        <span class="tl-dot {{ $e['type'] }}"><x-icon :name="$e['type'] === 'work' ? 'briefcase' : 'graduation'" size="14" /></span>
                        <div class="tl-card glass glow-card">
                            <span class="tl-period">{{ $e['period'] }}</span>
                            <h3>{{ $e['title'] }}</h3>
                            <span class="tl-place">{{ $e['place'] }}</span>
                            <p>{{ $e['description'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
            <div class="certs">
                <h3 class="certs-title reveal"><x-icon name="award" /> Certificates &amp; achievements</h3>
                @foreach ($p['certificates'] as $c)
                    <a href="{{ $c['url'] }}" target="_blank" rel="noopener" class="cert glass glow-card reveal" id="cert-{{ $loop->index }}">
                        <span class="cert-year">{{ $c['year'] }}</span>
                        <div>
                            <b>{{ $c['title'] }}</b>
                            <small>{{ $c['issuer'] }}</small>
                        </div>
                        <x-icon name="external" size="16" />
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= TESTIMONIALS ================= --}}
    <section class="section container" id="testimonials">
        <div class="section-head reveal">
            <span class="eyebrow">05 — Kind words</span>
            <h2>What people <span class="gradient-text">say</span></h2>
        </div>
        <div class="testimonials">
            @foreach ($p['testimonials'] as $t)
                <figure class="quote glass glow-card reveal">
                    <span class="quote-mark">“</span>
                    <blockquote>{{ $t['quote'] }}</blockquote>
                    <figcaption>
                        <span class="initials">{{ Str::of($t['name'])->explode(' ')->map(fn($w) => $w[0])->take(2)->join('') }}</span>
                        <div><b>{{ $t['name'] }}</b><small>{{ $t['role'] }}</small></div>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </section>

    {{-- ================= BLOG ================= --}}
    <section class="section container" id="blog">
        <div class="section-head row reveal">
            <div>
                <span class="eyebrow">06 — Writing</span>
                <h2>Latest <span class="gradient-text">articles</span></h2>
            </div>
            <a href="{{ route('blog.index') }}" class="link-arrow" id="blog-all">All articles <x-icon name="arrow-right" size="16" /></a>
        </div>
        <div class="posts-grid">
            @foreach (collect($p['posts'])->sortByDesc('date')->take(3) as $post)
                @include('portfolio.partials.post-card')
            @endforeach
        </div>
    </section>

    {{-- ================= CONTACT ================= --}}
    @include('portfolio.partials.contact')
@endsection
