@extends('layouts.portfolio')

@section('title', 'Blog · ' . $p['name'])
@section('description', 'Articles and notes by ' . $p['name'] . ' on web development, Laravel and tooling.')

@section('content')
    <section class="section container page-top">
        <div class="section-head reveal">
            <span class="eyebrow">Writing</span>
            <h1>Notes &amp; <span class="gradient-text">articles</span></h1>
            <p>Things I've learned while building — written down so you (and future me) don't have to learn them the hard way.</p>
        </div>
        <div class="posts-grid">
            @foreach (collect($p['posts'])->sortByDesc('date') as $post)
                @include('portfolio.partials.post-card')
            @endforeach
        </div>
    </section>
@endsection
