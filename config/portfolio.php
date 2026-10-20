<?php

/*
|--------------------------------------------------------------------------
| Portfolio content
|--------------------------------------------------------------------------
| Everything shown on the portfolio lives here. Edit freely.
| Images go in public/images/portfolio/. Paths below are relative to public/.
| Project "video" accepts: YouTube/Vimeo embed URL, .mp4/.webm, or .gif/.webp.
| If a demo site refuses to load in the preview modal, it sends
| X-Frame-Options / CSP frame-ancestors — the "Open in new tab" link still works.
*/

return [

    'name' => 'Firdaus',
    'handle' => 'aousss',
    'roles' => ['Full-Stack Developer', 'Laravel Craftsman', 'UI Enthusiast', 'Problem Solver'],
    'tagline' => 'I build fast, polished web apps — from database schema to the last pixel of the UI.',
    'bio' => [
        "I'm a full-stack web developer based in Malaysia who loves turning messy real-world problems into clean, reliable software. My daily tools are Laravel, PHP and modern JavaScript, and I care a lot about performance, accessibility and the small details that make an interface feel great.",
        "I've shipped e-commerce stores, internal dashboards, booking systems and document-generation tools for clients and side projects. When I'm not coding, I'm usually learning something new, writing about what I've learned, or tweaking my dev setup for the hundredth time.",
    ],
    'location' => 'Kuala Lumpur, Malaysia',
    'email' => 'hello@example.com',
    'avatar' => 'images/portfolio/avatar.jpg',
    'available' => true,

    'socials' => [
        'github' => 'https://github.com/aousss',
        'linkedin' => 'https://www.linkedin.com/in/aousss',
        'x' => 'https://x.com/aousss',
        'email' => 'mailto:hello@example.com',
    ],

    'stats' => [
        ['value' => 3, 'suffix' => '+', 'label' => 'Years coding'],
        ['value' => 15, 'suffix' => '+', 'label' => 'Projects shipped'],
        ['value' => 10, 'suffix' => '+', 'label' => 'Happy clients'],
        ['value' => 4, 'suffix' => '', 'label' => 'Certifications'],
    ],

    'skills' => [
        'Frontend' => ['HTML5', 'CSS3', 'JavaScript', 'TypeScript', 'Vue.js', 'Alpine.js', 'Tailwind CSS', 'Livewire'],
        'Backend' => ['PHP', 'Laravel', 'REST APIs', 'MySQL', 'SQLite', 'PostgreSQL', 'Redis', 'Queues & Jobs'],
        'Tools & DevOps' => ['Git & GitHub', 'Vite', 'Docker', 'Laragon', 'Linux', 'Nginx', 'CI/CD', 'Figma'],
    ],

    'projects' => [
        [
            'slug' => 'invoice-generator',
            'title' => 'Invoice PDF Generator',
            'tagline' => 'Create professional invoices with dynamic line items and download them as PDF in one click.',
            'year' => '2026',
            'role' => 'Solo developer',
            'image' => 'images/portfolio/invoice.jpg',
            'gallery' => ['images/portfolio/invoice.jpg'],
            'video' => 'images/portfolio/invoice-walkthrough.webp',
            'tags' => ['Laravel', 'DomPDF', 'Blade', 'Tailwind'],
            'category' => 'Laravel',
            'demo' => '/invoice',
            'source' => 'https://github.com/aousss/aousss-portfolio',
            'problem' => 'Freelancers and small businesses often build invoices by hand in spreadsheets or word processors — slow, error-prone and inconsistent in format.',
            'solution' => 'A lightweight, authenticated Laravel tool where you fill in client details and any number of line items. Totals are calculated server-side, validated, and rendered into a clean PDF template with DomPDF.',
            'features' => ['Dynamic add/remove line items', 'Server-side validation of every item', 'Automatic totals', 'Instant PDF download', 'Auth-protected with Laravel Breeze'],
            'results' => ['Invoice created in under 30 seconds', 'Zero calculation mistakes', 'Consistent, branded documents'],
        ],
        [
            'slug' => 'shopease',
            'title' => 'ShopEase E-Commerce',
            'tagline' => 'A full e-commerce storefront with cart, checkout, order tracking and an admin dashboard.',
            'year' => '2025',
            'role' => 'Full-stack developer',
            'image' => 'images/portfolio/shopease.jpg',
            'gallery' => ['images/portfolio/shopease.jpg'],
            'video' => null,
            'tags' => ['Laravel', 'Livewire', 'MySQL', 'Stripe'],
            'category' => 'Laravel',
            'demo' => 'https://example.com',
            'source' => 'https://github.com/aousss/shopease',
            'problem' => 'A local sneaker shop was selling only through Instagram DMs, losing orders and spending hours on manual stock tracking.',
            'solution' => 'Built a responsive storefront with real-time cart (Livewire), secure checkout, inventory management and an admin panel with sales reports.',
            'features' => ['Product variants & stock tracking', 'Live cart without page reloads', 'Online payment integration', 'Order status emails', 'Admin sales dashboard'],
            'results' => ['3× more orders in the first month', 'Manual stock work cut by ~80%', 'Lighthouse performance score 95+'],
        ],
        [
            'slug' => 'taskflow',
            'title' => 'TaskFlow Kanban',
            'tagline' => 'A drag-and-drop project board for teams, with real-time updates and progress insights.',
            'year' => '2025',
            'role' => 'Frontend lead',
            'image' => 'images/portfolio/taskflow.jpg',
            'gallery' => ['images/portfolio/taskflow.jpg'],
            'video' => null,
            'tags' => ['Vue.js', 'Laravel API', 'WebSockets', 'Tailwind'],
            'category' => 'JavaScript',
            'demo' => 'https://example.com',
            'source' => 'https://github.com/aousss/taskflow',
            'problem' => 'A small agency tracked tasks across chat threads and spreadsheets, so nobody knew what was blocked or overdue.',
            'solution' => 'A single-page Kanban app in Vue backed by a Laravel REST API, with WebSocket broadcasting so every board updates instantly for the whole team.',
            'features' => ['Drag-and-drop cards & columns', 'Real-time collaboration', 'Labels, due dates & assignees', 'Progress analytics', 'Dark mode'],
            'results' => ['Used daily by a 12-person team', 'Missed deadlines dropped noticeably', 'Sub-100ms board updates'],
        ],
        [
            'slug' => 'cliniccare',
            'title' => 'ClinicCare Booking',
            'tagline' => 'Online appointment booking for clinics with doctor schedules and automated reminders.',
            'year' => '2024',
            'role' => 'Full-stack developer',
            'image' => 'images/portfolio/cliniccare.jpg',
            'gallery' => ['images/portfolio/cliniccare.jpg'],
            'video' => null,
            'tags' => ['Laravel', 'Alpine.js', 'MySQL', 'Queues'],
            'category' => 'Laravel',
            'demo' => 'https://example.com',
            'source' => 'https://github.com/aousss/cliniccare',
            'problem' => 'Patients had to phone the clinic to book, causing long hold times and frequent double-bookings.',
            'solution' => 'A booking system where patients pick a doctor and an available slot; staff manage schedules from a dashboard and queued jobs send email/SMS reminders.',
            'features' => ['Doctor schedules & slot generation', 'Double-booking prevention', 'Automated reminders via queues', 'Staff dashboard', 'Mobile-first UI'],
            'results' => ['Phone bookings down 60%', 'No-shows reduced with reminders', 'Zero double-bookings since launch'],
        ],
    ],

    // type: work | education
    'experience' => [
        ['period' => '2025 — Present', 'title' => 'Full-Stack Developer (Freelance)', 'place' => 'Self-employed', 'type' => 'work', 'description' => 'Designing and building Laravel web apps for small businesses: e-commerce, booking systems and internal tools.'],
        ['period' => '2024 — 2025', 'title' => 'Web Developer Intern', 'place' => 'Tech Studio Sdn. Bhd.', 'type' => 'work', 'description' => 'Built features for client projects, wrote REST APIs, and improved page performance across several Laravel and Vue apps.'],
        ['period' => '2021 — 2025', 'title' => 'Bachelor of Computer Science', 'place' => 'Universiti Teknologi', 'type' => 'education', 'description' => 'Specialised in software engineering. Final-year project: a clinic appointment booking platform (ClinicCare).'],
        ['period' => '2019 — 2021', 'title' => 'Diploma in Information Technology', 'place' => 'Politeknik', 'type' => 'education', 'description' => 'Foundations in programming, databases, networking and web development.'],
    ],

    'certificates' => [
        ['title' => 'Laravel Certified Developer', 'issuer' => 'Laravel', 'year' => '2025', 'url' => '#'],
        ['title' => 'JavaScript Algorithms & Data Structures', 'issuer' => 'freeCodeCamp', 'year' => '2024', 'url' => '#'],
        ['title' => 'Responsive Web Design', 'issuer' => 'freeCodeCamp', 'year' => '2023', 'url' => '#'],
        ['title' => 'Google UX Design Foundations', 'issuer' => 'Google / Coursera', 'year' => '2023', 'url' => '#'],
    ],

    'testimonials' => [
        ['quote' => 'Firdaus turned our Instagram-only shop into a real online store in weeks. Orders tripled and the admin panel is so easy to use.', 'name' => 'Aiman R.', 'role' => 'Owner, Sneaker Shop'],
        ['quote' => 'Clean code, clear communication, and he always delivered ahead of schedule. Our team uses TaskFlow every single day.', 'name' => 'Nurul H.', 'role' => 'Project Manager, Creative Agency'],
        ['quote' => 'Our receptionists finally have time to breathe. The booking system just works, and patients love the reminders.', 'name' => 'Dr. Lim K.', 'role' => 'Clinic Director'],
    ],

    'posts' => [
        [
            'slug' => 'generating-pdfs-in-laravel',
            'title' => 'Generating PDF Invoices in Laravel with DomPDF',
            'date' => '2026-09-28',
            'tags' => ['Laravel', 'PDF'],
            'excerpt' => 'How I built the invoice generator in this portfolio: validation, totals, and turning a Blade view into a downloadable PDF.',
            'body' => <<<'MD'
Generating a PDF in Laravel is surprisingly easy once you treat the PDF as **just another Blade view**.

## 1. Install DomPDF

```bash
composer require barryvdh/laravel-dompdf
```

## 2. Validate the input

Never trust the browser to calculate money. Validate each line item and compute the total on the server:

```php
$request->validate([
    'items' => 'required|array',
    'items.*.quantity' => 'required|numeric',
    'items.*.price' => 'required|numeric',
]);
```

## 3. Render and download

```php
$pdf = Pdf::loadView('invoice.template', $data);
return $pdf->download('invoice.pdf');
```

That's it. Keep the template simple (tables and inline styles work best with DomPDF) and you get consistent, printable documents every time.
MD,
        ],
        [
            'slug' => 'livewire-cart-without-javascript',
            'title' => 'Building a Live Shopping Cart with Livewire',
            'date' => '2026-07-14',
            'tags' => ['Livewire', 'E-commerce'],
            'excerpt' => 'A real-time cart without writing a single line of custom JavaScript — lessons from building ShopEase.',
            'body' => <<<'MD'
For ShopEase I wanted a cart that updates instantly, but I didn't want to maintain a separate SPA. **Livewire** was the perfect fit.

## The idea

Each cart action (add, remove, change quantity) is a method on a Livewire component. Livewire sends a tiny request, re-renders the component on the server, and patches the DOM.

## What I learned

- Keep components small: one for the cart icon, one for the cart drawer.
- Use events to keep them in sync.
- Store the cart in the session for guests and in the database for logged-in users.

The result feels like an SPA, but it's all PHP and Blade.
MD,
        ],
        [
            'slug' => 'my-laragon-dev-setup',
            'title' => 'My Laragon Setup for Fast Laravel Development on Windows',
            'date' => '2026-05-02',
            'tags' => ['Tooling', 'Windows'],
            'excerpt' => 'Pretty URLs, instant new projects and zero config — why Laragon is my go-to local environment on Windows.',
            'body' => <<<'MD'
Laragon gives every project in `C:\laragon\www` a pretty URL like `project.test` automatically.

## Why I like it

- **Portable and fast** — starts in a second.
- **Auto virtual hosts** — no editing the hosts file.
- **Quick app creation** — one click for a new Laravel project.

Pair it with `npm run dev` for Vite hot reload and you have a smooth workflow with almost no setup.
MD,
        ],
    ],
];
