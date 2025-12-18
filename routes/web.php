<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
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

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');

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
    
    // Note: Additional admin routes will be added as controllers are created
    // For now, dashboard is accessible at: /admin/dashboard
    
});

/*
|--------------------------------------------------------------------------
| Future Admin Routes (To be added)
|--------------------------------------------------------------------------
|
| Once you generate the remaining admin controllers, add these routes:
|
| Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
|     
|     // Profile Management
|     Route::resource('profile', Admin\AdminProfileController::class)->except(['index', 'show', 'destroy']);
|     
|     // Skills Management
|     Route::resource('skills', Admin\SkillController::class);
|     
|     // Experience Management
|     Route::resource('experiences', Admin\ExperienceController::class);
|     
|     // Projects Management
|     Route::resource('projects', Admin\AdminProjectController::class);
|     
|     // Services Management
|     Route::resource('services', Admin\AdminServiceController::class);
|     
|     // Blog Management
|     Route::resource('blog/posts', Admin\BlogPostController::class);
|     Route::resource('blog/categories', Admin\BlogCategoryController::class);
|     
|     // Testimonials Management
|     Route::resource('testimonials', Admin\TestimonialController::class);
|     
|     // Contact Messages
|     Route::resource('contacts', Admin\AdminContactController::class)->only(['index', 'show', 'destroy']);
|     
|     // Settings
|     Route::get('settings', [Admin\SettingController::class, 'index'])->name('settings.index');
|     Route::put('settings', [Admin\SettingController::class, 'update'])->name('settings.update');
| });
|
*/
