<a href="{{ route('blog.show', $post['slug']) }}" class="post-card glass glow-card reveal" id="post-{{ $post['slug'] }}">
    <div class="post-meta"><x-icon name="calendar" size="14" /> {{ \Carbon\Carbon::parse($post['date'])->format('M j, Y') }} · {{ max(1, (int) ceil(str_word_count($post['body']) / 200)) }} min read</div>
    <h3>{{ $post['title'] }}</h3>
    <p>{{ $post['excerpt'] }}</p>
    <div class="post-foot">
        <ul class="tags">
            @foreach ($post['tags'] as $tag)
                <li>{{ $tag }}</li>
            @endforeach
        </ul>
        <x-icon name="arrow-right" class="icon post-arrow" />
    </div>
</a>
