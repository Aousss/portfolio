@extends('layouts.portfolio')

@section('title', $post['title'] . ' · ' . $p['name'])
@section('description', $post['excerpt'])

@section('content')
    <article class="container post page-top">
        <a href="{{ route('blog.index') }}" class="back-link reveal" id="back-blog"><x-icon name="arrow-left" size="16" /> All articles</a>
        <header class="post-head reveal">
            <div class="post-meta"><x-icon name="calendar" size="14" /> {{ \Carbon\Carbon::parse($post['date'])->format('F j, Y') }} · {{ max(1, (int) ceil(str_word_count($post['body']) / 200)) }} min read</div>
            <h1>{{ $post['title'] }}</h1>
            <ul class="tags">
                @foreach ($post['tags'] as $tag)
                    <li>{{ $tag }}</li>
                @endforeach
            </ul>
        </header>
        <div class="prose glass reveal">
            {!! Str::markdown($post['body'], ['html_input' => 'escape']) !!}
        </div>
        <div class="post-author glass reveal">
            <img src="{{ asset($p['avatar']) }}" alt="{{ $p['name'] }}" width="56" height="56">
            <div>
                <b>Written by {{ $p['name'] }}</b>
                <small>{{ $p['roles'][0] }} · {{ $p['location'] }}</small>
            </div>
            <a href="{{ route('home') }}#contact" class="btn btn-sm btn-primary" id="post-contact">Work with me</a>
        </div>
    </article>
@endsection
