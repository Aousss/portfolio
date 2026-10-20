<article class="project-card reveal glow-card" data-category="{{ $project['category'] }}" id="project-{{ $project['slug'] }}">
    <a href="{{ route('projects.show', $project['slug']) }}" class="project-shot browser" aria-label="{{ $project['title'] }} case study">
        <div class="browser-bar"><i></i><i></i><i></i><span>{{ parse_url(url($project['demo']), PHP_URL_HOST) }}</span></div>
        <div class="shot-img"><img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }} screenshot" loading="lazy"></div>
        @if ($project['video'] && (Str::startsWith($project['video'], 'http') || file_exists(public_path($project['video']))))
            <span class="badge-video"><x-icon name="play" size="12" /> Walkthrough</span>
        @endif
    </a>
    <div class="project-body">
        <div class="project-meta"><span>{{ $project['year'] }}</span><span>·</span><span>{{ $project['role'] }}</span></div>
        <h3><a href="{{ route('projects.show', $project['slug']) }}">{{ $project['title'] }}</a></h3>
        <p>{{ $project['tagline'] }}</p>
        <ul class="tags">
            @foreach ($project['tags'] as $tag)
                <li>{{ $tag }}</li>
            @endforeach
        </ul>
        <div class="project-actions">
            <button class="btn btn-sm btn-primary" data-preview="{{ url($project['demo']) }}" id="preview-{{ $project['slug'] }}"><x-icon name="eye" size="16" /> Live preview</button>
            <a class="btn btn-sm btn-ghost" href="{{ url($project['demo']) }}" target="_blank" rel="noopener" id="demo-{{ $project['slug'] }}"><x-icon name="external" size="16" /> Demo</a>
            <a class="btn btn-sm btn-ghost" href="{{ $project['source'] }}" target="_blank" rel="noopener" id="source-{{ $project['slug'] }}"><x-icon name="code" size="16" /> Code</a>
            <a class="link-arrow" href="{{ route('projects.show', $project['slug']) }}" id="case-{{ $project['slug'] }}">Case study <x-icon name="arrow-right" size="16" /></a>
        </div>
    </div>
</article>
