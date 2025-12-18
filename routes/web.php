<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (Frontend)
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// About
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// Blog (Temporarily Hidden)
// Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
// Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
// Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Download CV
Route::get('/download-cv', [HomeController::class, 'downloadCv'])->name('download.cv');

/*
|--------------------------------------------------------------------------
| Authentication Routes (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Skills Management
    Route::resource('skills', SkillController::class);
    
    // Experience Management
    Route::resource('experiences', ExperienceController::class);
    
    // Projects Management
    Route::resource('projects', AdminProjectController::class);
    
    // Services Management
    Route::resource('services', AdminServiceController::class);
    
    // Testimonials Management
    Route::resource('testimonials', TestimonialController::class);
    
    // Contact Messages
    Route::resource('contacts', AdminContactController::class)->only(['index', 'show', 'destroy']);
    Route::patch('contacts/{contact}/mark-read', [AdminContactController::class, 'markAsRead'])->name('contacts.mark-read');
    Route::patch('contacts/{contact}/mark-unread', [AdminContactController::class, 'markAsUnread'])->name('contacts.mark-unread');
    
    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    
});
