<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user.home');
Route::get('/about', [App\Http\Controllers\UserController::class, 'about'])->name('user.about');
Route::get('/blog-details/{id}/{slug}', [App\Http\Controllers\UserController::class, 'blog_details'])->name('user.blog_details');
Route::get('/blogs', [App\Http\Controllers\UserController::class, 'blogs'])->name('user.blogs');
Route::get('/contact', [App\Http\Controllers\UserController::class, 'contact'])->name('user.contact');
Route::get('/gallery', [App\Http\Controllers\UserController::class, 'gallery'])->name('user.gallery');
Route::get('/package-details/{id}/{slug}', [App\Http\Controllers\UserController::class, 'package_details'])->name('user.package_details');
Route::get('/packages', [App\Http\Controllers\UserController::class, 'packages'])->name('user.packages');
Route::get('/privacy-policy', [App\Http\Controllers\UserController::class, 'privacy_policy'])->name('user.privacy_policy');
Route::get('/terms-and-conditions', [App\Http\Controllers\UserController::class, 'terms_and_conditions'])->name('user.terms_and_conditions');
Route::get('/visa', [App\Http\Controllers\UserController::class, 'visa'])->name('user.visa');
Route::get('/visa-details/{slug}', [App\Http\Controllers\UserController::class, 'visa_details'])->name('user.visa_details');
Route::get('/visa/filter/{continent}', [App\Http\Controllers\UserController::class, 'filterVisas'])->name('user.visa.filter');
Route::post('/visa-enquiry', [App\Http\Controllers\UserController::class, 'store_visaEnq'])->name('visa.enquiry.store');
Route::post('/contact-enquiry', [App\Http\Controllers\UserController::class, 'storeContEnquiry'])->name('contact.enquiry.store');

//change password
Route::get('/change-password', [App\Http\Controllers\Admin\DashboardController::class, 'changePasswordForm'])->name('admin.changePassword');
Route::post('/change-password', [App\Http\Controllers\Admin\DashboardController::class, 'updatePassword'])->name('admin.updatePassword');


//Store Enquiry
Route::post('/store_enquiry', [App\Http\Controllers\UserController::class, 'store_enquiry'])->name('user.store_enquiry');
Route::post('/subscribe', [App\Http\Controllers\UserController::class, 'store_subscription'])->name('user.subscribe');


// admin
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

// continents and countries
Route::get('/admin/continent-list', [App\Http\Controllers\Admin\GeographyController::class, 'continents'])->name('admin.continents');
Route::get('/admin/continent/change/{code}/{status}', [App\Http\Controllers\Admin\GeographyController::class, 'continent_change_status'])->name('admin.continent_change_status');

Route::get('/admin/country-list', [App\Http\Controllers\Admin\GeographyController::class, 'countries'])->name('admin.countries');
Route::get('/admin/country/change/{id}/{status}', [App\Http\Controllers\Admin\GeographyController::class, 'country_change_status'])->name('admin.country_change_status');

// packages
Route::get('/admin/packages-list', [App\Http\Controllers\Admin\PackageController::class, 'index'])->name('admin.packages');
Route::get('/admin/packages-new', [App\Http\Controllers\Admin\PackageController::class, 'create'])->name('admin.package_new');
Route::post('/admin/packages/store', [App\Http\Controllers\Admin\PackageController::class, 'store'])->name('admin.package_store');
Route::get('/admin/{id}/packages-edit', [App\Http\Controllers\Admin\PackageController::class, 'edit'])->name('admin.package_edit');
Route::post('/admin/packages/update/{id}', [App\Http\Controllers\Admin\PackageController::class, 'update'])->name('admin.package_update');
Route::get('/admin/packages/delete/{id}', [App\Http\Controllers\Admin\PackageController::class, 'destroy'])->name('admin.package_delete');
Route::get('/admin/packages/change/{id}/{status}', [App\Http\Controllers\Admin\PackageController::class, 'change_status'])->name('admin.package_change_status');

// visa
Route::get('/admin/visa-list', [App\Http\Controllers\Admin\VisaController::class, 'index'])->name('admin.visa_list');
Route::get('/admin/visa-new', [App\Http\Controllers\Admin\VisaController::class, 'create'])->name('admin.visa_new');
Route::post('/admin/visa/store', [App\Http\Controllers\Admin\VisaController::class, 'store'])->name('admin.visa_store');
Route::get('/admin/{id}/visa-edit', [App\Http\Controllers\Admin\VisaController::class, 'edit'])->name('admin.visa_edit');
Route::post('/admin/visa/update/{id}', [App\Http\Controllers\Admin\VisaController::class, 'update'])->name('admin.visa_update');
Route::get('/admin/visa/delete/{id}', [App\Http\Controllers\Admin\VisaController::class, 'destroy'])->name('admin.visa_delete');

// blogs
Route::get('/admin/blog-list', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('admin.blogs');
Route::get('/admin/blog-new', [App\Http\Controllers\Admin\BlogController::class, 'create'])->name('admin.blog_new');
Route::post('/admin/blog/store', [App\Http\Controllers\Admin\BlogController::class, 'store'])->name('admin.blog_store');
Route::get('/admin/{id}/blog-edit', [App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('admin.blog_edit');
Route::post('/admin/blog/update/{id}', [App\Http\Controllers\Admin\BlogController::class, 'update'])->name('admin.blog_update');
Route::get('/admin/blog/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('admin.blog_delete');

// banner And gallery
Route::get('/admin/banner-list', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'banners'])->name('admin.banners');
Route::get('/admin/banner-new', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'banner_create'])->name('admin.banner_new');
Route::post('/admin/banner/store', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'banner_store'])->name('admin.banner_store');
Route::get('/admin/{id}/banner-edit', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'banner_edit'])->name('admin.banner_edit');
Route::post('/admin/banner/update/{id}', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'banner_update'])->name('admin.banner_update');
Route::get('/admin/banner/delete/{id}', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'banner_destroy'])->name('admin.banner_delete');

Route::get('/admin/gallery-list', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'gallery'])->name('admin.gallery');
Route::post('/admin/gallery/store', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'store_gallery'])->name('admin.store_gallery');
Route::get('/admin/gallery/delete/{id}', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'destroy_gallery'])->name('admin.gallery_delete');

Route::get('/admin/settings', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'settings'])->name('admin.settings');
Route::post('/admin/settings-update/{id}', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'settings_update'])->name('admin.settings_update');

// enquiry
Route::get('/admin/packag-enquiry-list', [App\Http\Controllers\Admin\EnquiryController::class, 'package_enquiries'])->name('admin.package_enquiries');
Route::get('/admin/visa-enquiry-list', [App\Http\Controllers\Admin\EnquiryController::class, 'visa_enquiries'])->name('admin.visa_enquiries');
Route::get('/admin/contact-enquiry-list', [App\Http\Controllers\Admin\EnquiryController::class, 'contact_enquiries'])->name('admin.contact_enquiries');

// testimonials
Route::get('/admin/testimonial-list', [App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('admin.testimonials');
Route::get('/admin/testimonial-new', [App\Http\Controllers\Admin\TestimonialController::class, 'create'])->name('admin.testimonial_new');
Route::post('/admin/testimonial/store', [App\Http\Controllers\Admin\TestimonialController::class, 'store'])->name('admin.testimonial_store');
Route::get('/admin/{id}/testimonial-edit', [App\Http\Controllers\Admin\TestimonialController::class, 'edit'])->name('admin.testimonial_edit');
Route::post('/admin/testimonial/update/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'update'])->name('admin.testimonial_update');
Route::get('/admin/testimonial/delete/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'destroy'])->name('admin.testimonial_delete');

// subscriptions
Route::get('/admin/subscription-list', [App\Http\Controllers\Admin\SubscriptionController::class, 'index'])->name('admin.subscriptions');
Route::get('/admin/subscription/delete/{id}', [App\Http\Controllers\Admin\SubscriptionController::class, 'destroy'])->name('admin.subscription_destroy');
Route::get('admin/subscriptions/export', [App\Http\Controllers\Admin\SubscriptionController::class, 'export'])->name('admin.subscriptions.export');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__.'/auth.php';

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
