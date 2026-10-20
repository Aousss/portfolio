@extends('layouts.portfolio')

@section('title', $project['title'] . ' — Case study · ' . $p['name'])
@section('description', $project['tagline'])
@section('og_image', asset($project['image']))

@php
    $v = $project['video'];
    $hasVideo = $v && (Str::startsWith($v, 'http') || file_exists(public_path($v)));
    $demo = url($project['demo']);
@endphp

@section('content')
    <article class="case container">
        <a href="{{ route('home') }}#projects" class="back-link reveal" id="back-projects"><x-icon name="arrow-left" size="16" /> All projects</a>

        <header class="case-head">
            <span class="eyebrow reveal">Case study · {{ $project['year'] }}</span>
            <h1 class="reveal">{{ $project['title'] }}</h1>
            <p class="case-tagline reveal">{{ $project['tagline'] }}</p>
            <div class="case-actions reveal">
                <button class="btn btn-primary" data-preview="{{ $demo }}" id="case-preview"><x-icon name="eye" /> Live preview</button>
                <a href="{{ $demo }}" target="_blank" rel="noopener" class="btn btn-ghost" id="case-demo"><x-icon name="external" /> Open demo</a>
                <a href="{{ $project['source'] }}" target="_blank" rel="noopener" class="btn btn-ghost" id="case-source"><x-icon name="github" /> Source code</a>
            </div>
            <dl class="case-facts glass reveal">
                <div><dt>Role</dt><dd>{{ $project['role'] }}</dd></div>
                <div><dt>Year</dt><dd>{{ $project['year'] }}</dd></div>
                <div><dt>Stack</dt><dd>{{ implode(', ', $project['tags']) }}</dd></div>
            </dl>
        </header>

        <div class="browser case-hero reveal">
            <div class="browser-bar"><i></i><i></i><i></i><span>{{ parse_url($demo, PHP_URL_HOST) }}</span></div>
            <img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }} screenshot">
        </div>

        <div class="case-body">
            <section class="case-block glass reveal">
                <span class="case-num">01</span>
                <h2>The problem</h2>
                <p>{{ $project['problem'] }}</p>
            </section>
            <section class="case-block glass reveal">
                <span class="case-num">02</span>
                <h2>The solution</h2>
                <p>{{ $project['solution'] }}</p>
            </section>
            <section class="case-block glass reveal">
                <span class="case-num">03</span>
                <h2>Key features</h2>
                <ul class="checks">
                    @foreach ($project['features'] as $f)
                        <li><x-icon name="check" size="16" /> {{ $f }}</li>
                    @endforeach
                </ul>
            </section>
            <section class="case-block glass reveal">
                <span class="case-num">04</span>
                <h2>Results</h2>
                <ul class="results">
                    @foreach ($project['results'] as $r)
                        <li>{{ $r }}</li>
                    @endforeach
                </ul>
            </section>
        </div>

        @if ($hasVideo)
            <section class="case-section reveal" id="walkthrough">
                <h2><x-icon name="play" /> Walkthrough</h2>
                <div class="browser media">
                    <div class="browser-bar"><i></i><i></i><i></i><span>Recorded demo</span></div>
                    @if (Str::contains($v, ['youtube.com/embed', 'player.vimeo.com']))
                        <iframe src="{{ $v }}" title="{{ $project['title'] }} walkthrough video" allowfullscreen loading="lazy"></iframe>
                    @elseif (Str::endsWith($v, ['.mp4', '.webm']))
                        <video src="{{ Str::startsWith($v, 'http') ? $v : asset($v) }}" controls muted loop autoplay playsinline></video>
                    @else
                        <img src="{{ Str::startsWith($v, 'http') ? $v : asset($v) }}" alt="{{ $project['title'] }} animated walkthrough" loading="lazy">
                    @endif
                </div>
            </section>
        @endif

        <section class="case-section reveal" id="try-live">
            <h2><x-icon name="monitor" /> Try it live</h2>
            <p class="muted">This is the real, running website embedded below. Prefer full screen? Use <b>Live preview</b> or <b>Open demo</b> above.</p>
            <div class="browser live-embed">
                <div class="browser-bar"><i></i><i></i><i></i><span>{{ $demo }}</span></div>
                <iframe src="{{ $demo }}" title="{{ $project['title'] }} live demo" loading="lazy"></iframe>
            </div>
        </section>

        @if (count($project['gallery']) > 1)
            <section class="case-section reveal">
                <h2>Gallery</h2>
                <div class="gallery">
                    @foreach ($project['gallery'] as $img)
                        <a href="{{ asset($img) }}" target="_blank" class="browser"><img src="{{ asset($img) }}" alt="{{ $project['title'] }} screen {{ $loop->iteration }}" loading="lazy"></a>
                    @endforeach
                </div>
            </section>
        @endif

        <a href="{{ route('projects.show', $next['slug']) }}" class="next-project glass glow-card reveal" id="next-project">
            <span class="eyebrow">Next project</span>
            <b>{{ $next['title'] }}</b>
            <x-icon name="arrow-right" size="28" />
        </a>
    </article>

    @include('portfolio.partials.contact')
@endsection
