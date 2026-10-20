<?php

use App\Http\Controllers\ProfileController;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// ---- Portfolio (content lives in config/portfolio.php) ----
Route::get('/', fn () => view('portfolio.home', ['p' => config('portfolio')]))->name('home');

Route::get('/projects/{slug}', function (string $slug) {
    $projects = collect(config('portfolio.projects'));
    $i = $projects->search(fn ($x) => $x['slug'] === $slug);
    abort_if($i === false, 404);

    return view('portfolio.project', [
        'p' => config('portfolio'),
        'project' => $projects[$i],
        'next' => $projects[($i + 1) % $projects->count()],
    ]);
})->name('projects.show');

Route::get('/blog', fn () => view('portfolio.blog', ['p' => config('portfolio')]))->name('blog.index');

Route::get('/blog/{slug}', function (string $slug) {
    $post = collect(config('portfolio.posts'))->firstWhere('slug', $slug) ?? abort(404);

    return view('portfolio.post', ['p' => config('portfolio'), 'post' => $post]);
})->name('blog.show');

Route::post('/contact', function (Request $request) {
    abort_if(filled($request->input('website')), 422); // honeypot: bots fill hidden field

    $data = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:150',
        'subject' => 'nullable|string|max:150',
        'message' => 'required|string|min:10|max:5000',
    ]);

    $msg = ContactMessage::create($data);

    rescue(fn () => Mail::raw(
        "From: {$msg->name} <{$msg->email}>\n\n{$msg->message}",
        fn ($m) => $m->to(config('portfolio.email'))->replyTo($msg->email)->subject('Portfolio: '.($msg->subject ?: 'New message'))
    ));

    return redirect(url()->previous().'#contact')->with('contact_success', "Thanks {$msg->name}! Your message has been sent — I'll reply soon.");
})->middleware('throttle:5,1')->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/invoice', [\App\Http\Controllers\InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('/invoice/generate', [\App\Http\Controllers\InvoiceController::class, 'generatePdf'])->name('invoice.generate');
});

require __DIR__ . '/auth.php';
