// Portfolio interactions — no dependencies.
const $ = (s, el = document) => el.querySelector(s);
const $$ = (s, el = document) => [...el.querySelectorAll(s)];
const reduced = matchMedia('(prefers-reduced-motion: reduce)').matches;

// Scroll reveal (staggered per parent)
const io = new IntersectionObserver((entries) => {
    entries.forEach((e) => {
        if (!e.isIntersecting) return;
        e.target.classList.add('in');
        io.unobserve(e.target);
    });
}, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
$$('.reveal').forEach((el) => {
    const sibs = [...el.parentElement.children].filter((c) => c.classList.contains('reveal'));
    el.style.setProperty('--d', `${Math.min(sibs.indexOf(el), 6) * 0.08}s`);
    io.observe(el);
});

// Typed roles
const typed = $('#typed');
if (typed && !reduced) {
    const words = JSON.parse(typed.dataset.words);
    let w = 0, c = words[0].length, del = true;
    const tick = () => {
        const word = words[w];
        c += del ? -1 : 1;
        typed.textContent = word.slice(0, c);
        let wait = del ? 40 : 80;
        if (!del && c === word.length) { del = true; wait = 1800; }
        else if (del && c === 0) { del = false; w = (w + 1) % words.length; wait = 300; }
        setTimeout(tick, wait);
    };
    setTimeout(tick, 2000);
}

// Count-up stats
const countIO = new IntersectionObserver((entries) => {
    entries.forEach((e) => {
        if (!e.isIntersecting) return;
        const el = e.target, end = +el.dataset.count, t0 = performance.now(), dur = 1400;
        const step = (t) => {
            const k = Math.min((t - t0) / dur, 1);
            el.textContent = Math.round(end * (1 - Math.pow(1 - k, 3)));
            if (k < 1) requestAnimationFrame(step);
        };
        reduced ? (el.textContent = end) : requestAnimationFrame(step);
        countIO.unobserve(el);
    });
});
$$('[data-count]').forEach((el) => countIO.observe(el));

// Cursor glow + card spotlight
addEventListener('pointermove', (e) => {
    document.body.style.setProperty('--mx', `${e.clientX}px`);
    document.body.style.setProperty('--my', `${e.clientY}px`);
    const card = e.target.closest?.('.glow-card');
    if (card) {
        const r = card.getBoundingClientRect();
        card.style.setProperty('--x', `${e.clientX - r.left}px`);
        card.style.setProperty('--y', `${e.clientY - r.top}px`);
    }
}, { passive: true });

// Nav: scrolled state, progress bar, active section
const nav = $('#nav');
const onScroll = () => {
    const max = document.documentElement.scrollHeight - innerHeight;
    document.body.style.setProperty('--p', max > 0 ? scrollY / max : 0);
    nav.classList.toggle('scrolled', scrollY > 20);
};
addEventListener('scroll', onScroll, { passive: true });
onScroll();

const links = $$('[data-section]');
const secIO = new IntersectionObserver((entries) => {
    entries.forEach((e) => {
        if (e.isIntersecting) links.forEach((a) => a.classList.toggle('active', a.dataset.section === e.target.id));
    });
}, { rootMargin: '-45% 0px -50% 0px' });
links.forEach((a) => { const s = document.getElementById(a.dataset.section); if (s) secIO.observe(s); });

// Mobile menu
const toggle = $('#nav-toggle');
toggle.addEventListener('click', () => {
    const open = nav.classList.toggle('open');
    toggle.setAttribute('aria-expanded', open);
});
$$('#nav-links a').forEach((a) => a.addEventListener('click', () => nav.classList.remove('open')));

// Project filter
$$('#project-filters button').forEach((btn) => btn.addEventListener('click', () => {
    $$('#project-filters button').forEach((b) => b.classList.toggle('active', b === btn));
    const f = btn.dataset.filter;
    $$('.project-card').forEach((card) => card.classList.toggle('hidden', f !== 'all' && card.dataset.category !== f));
}));

// Live preview dialog
const dlg = $('#preview'), frame = $('#preview-frame'), loading = $('#preview-loading');
$$('[data-preview]').forEach((btn) => btn.addEventListener('click', () => {
    const url = btn.dataset.preview;
    $('#preview-url').textContent = url;
    $('#preview-open').href = url;
    loading.hidden = false;
    frame.style.width = '100%';
    $$('.preview-devices button').forEach((b, i) => b.classList.toggle('active', i === 0));
    frame.src = url;
    dlg.showModal();
}));
frame.addEventListener('load', () => { if (frame.src) loading.hidden = true; });
$$('.preview-devices button').forEach((b) => b.addEventListener('click', () => {
    $$('.preview-devices button').forEach((x) => x.classList.toggle('active', x === b));
    frame.style.width = b.dataset.w;
}));
$('#preview-close').addEventListener('click', () => dlg.close());
dlg.addEventListener('click', (e) => { if (e.target === dlg) dlg.close(); }); // backdrop click
dlg.addEventListener('close', () => frame.removeAttribute('src'));

// Bring contact form into view after submit / validation errors
$('#contact-form[data-focus]')?.scrollIntoView({ block: 'center' });
