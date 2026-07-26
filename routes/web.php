<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Website
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
Route::get('/careers/{job:slug}', [CareerController::class, 'show'])->name('careers.show');
Route::post('/careers/apply', [JobApplicationController::class, 'store'])->name('careers.apply');

Route::post('/meetings/book', [MeetingController::class, 'store'])->name('meetings.book');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [Admin\AuthController::class, 'login'])->name('login.store');

    Route::middleware('auth')->group(function () {
        Route::post('/logout', [Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::resource('services', Admin\ServiceController::class)->except(['show']);
        Route::resource('projects', Admin\ProjectController::class)->except(['show']);
        Route::resource('testimonials', Admin\TestimonialController::class)->except(['show']);
        Route::resource('faqs', Admin\FaqController::class)->except(['show']);
        Route::resource('posts', Admin\PostController::class)->except(['show']);
        Route::resource('jobs', Admin\JobController::class)->except(['show']);
        Route::resource('galleries', Admin\GalleryController::class)->except(['show']);
        Route::resource('team-members', Admin\TeamMemberController::class)->except(['show']);

        Route::get('/job-applications', [Admin\JobApplicationController::class, 'index'])->name('job-applications.index');
        Route::patch('/job-applications/{application}/status', [Admin\JobApplicationController::class, 'updateStatus'])->name('job-applications.update-status');
        Route::get('/job-applications/{application}/download', [Admin\JobApplicationController::class, 'downloadCv'])->name('job-applications.download');
        Route::delete('/job-applications/{application}', [Admin\JobApplicationController::class, 'destroy'])->name('job-applications.destroy');

        Route::get('/meetings', [Admin\MeetingController::class, 'index'])->name('meetings.index');
        Route::patch('/meetings/{meeting}/status', [Admin\MeetingController::class, 'updateStatus'])->name('meetings.update-status');
        Route::delete('/meetings/{meeting}', [Admin\MeetingController::class, 'destroy'])->name('meetings.destroy');

        Route::get('/messages', [Admin\MessageController::class, 'index'])->name('messages.index');
        Route::delete('/messages/{message}', [Admin\MessageController::class, 'destroy'])->name('messages.destroy');

        Route::get('/subscribers', [Admin\SubscriberController::class, 'index'])->name('subscribers.index');
        Route::delete('/subscribers/{subscriber}', [Admin\SubscriberController::class, 'destroy'])->name('subscribers.destroy');

        Route::get('/settings', [Admin\SettingController::class, 'edit'])->name('settings.edit');
        Route::put('/settings', [Admin\SettingController::class, 'update'])->name('settings.update');
    });
});
