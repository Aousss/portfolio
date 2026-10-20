<section class="section container" id="contact">
    <div class="contact glass reveal">
        <div class="contact-info">
            <span class="eyebrow">07 — Contact</span>
            <h2>Have a project in mind? <span class="gradient-text">Let's talk.</span></h2>
            <p>Whether it's a new website, a web app, or just a question — my inbox is always open. I usually reply within 24 hours.</p>
            <a href="mailto:{{ $p['email'] }}" class="contact-line" id="contact-email"><x-icon name="mail" /> {{ $p['email'] }}</a>
            <span class="contact-line"><x-icon name="map-pin" /> {{ $p['location'] }}</span>
            <div class="hero-socials">
                @foreach ($p['socials'] as $name => $url)
                    <a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($name) }}" id="contact-social-{{ $name }}"><x-icon :name="$name" size="20" /></a>
                @endforeach
            </div>
        </div>

        <form method="POST" action="{{ route('contact.store') }}" class="contact-form" id="contact-form" @if ($errors->any() || session('contact_success')) data-focus @endif>
            @csrf
            @if (session('contact_success'))
                <div class="alert ok" role="status"><x-icon name="check" /> {{ session('contact_success') }}</div>
            @endif
            <input type="text" name="website" class="hp" tabindex="-1" autocomplete="off" aria-hidden="true">
            <div class="field-row">
                <label class="field">
                    <span>Name</span>
                    <input type="text" name="name" id="contact-name" value="{{ old('name') }}" required maxlength="100" placeholder="Your name">
                    @error('name')<small class="err">{{ $message }}</small>@enderror
                </label>
                <label class="field">
                    <span>Email</span>
                    <input type="email" name="email" id="contact-email-input" value="{{ old('email') }}" required maxlength="150" placeholder="you@example.com">
                    @error('email')<small class="err">{{ $message }}</small>@enderror
                </label>
            </div>
            <label class="field">
                <span>Subject <em>(optional)</em></span>
                <input type="text" name="subject" id="contact-subject" value="{{ old('subject') }}" maxlength="150" placeholder="Project inquiry">
                @error('subject')<small class="err">{{ $message }}</small>@enderror
            </label>
            <label class="field">
                <span>Message</span>
                <textarea name="message" id="contact-message" rows="5" required minlength="10" maxlength="5000" placeholder="Tell me about your project…">{{ old('message') }}</textarea>
                @error('message')<small class="err">{{ $message }}</small>@enderror
            </label>
            <button type="submit" class="btn btn-primary btn-block" id="contact-submit"><x-icon name="send" /> Send message</button>
        </form>
    </div>
</section>
