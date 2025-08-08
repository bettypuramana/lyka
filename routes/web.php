<?php

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
Route::get('/blog-details', [App\Http\Controllers\UserController::class, 'blog_details'])->name('user.blog_details');
Route::get('/blogs', [App\Http\Controllers\UserController::class, 'blogs'])->name('user.blogs');
Route::get('/contact', [App\Http\Controllers\UserController::class, 'contact'])->name('user.contact');
Route::get('/gallery', [App\Http\Controllers\UserController::class, 'gallery'])->name('user.gallery');
Route::get('/package-details', [App\Http\Controllers\UserController::class, 'package_details'])->name('user.package_details');
Route::get('/packages', [App\Http\Controllers\UserController::class, 'packages'])->name('user.packages');
Route::get('/privacy-policy', [App\Http\Controllers\UserController::class, 'privacy_policy'])->name('user.privacy_policy');
Route::get('/terms-and-conditions', [App\Http\Controllers\UserController::class, 'terms_and_conditions'])->name('user.terms_and_conditions');
Route::get('/visa', [App\Http\Controllers\UserController::class, 'visa'])->name('user.visa');
Route::get('/visa-details', [App\Http\Controllers\UserController::class, 'visa_details'])->name('user.visa_details');

// admin
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

// continents and countries
Route::get('/admin/continent/list', [App\Http\Controllers\Admin\GeographyController::class, 'continents'])->name('admin.continents');
Route::get('/admin/continent/change/{code}/{status}', [App\Http\Controllers\Admin\GeographyController::class, 'continent_change_status'])->name('admin.continent_change_status');

Route::get('/admin/country/list', [App\Http\Controllers\Admin\GeographyController::class, 'countries'])->name('admin.countries');
Route::get('/admin/country/change/{id}/{status}', [App\Http\Controllers\Admin\GeographyController::class, 'country_change_status'])->name('admin.country_change_status');

// packages
Route::get('/admin/packages/list', [App\Http\Controllers\Admin\PackageController::class, 'index'])->name('admin.packages');
Route::get('/admin/packages/new', [App\Http\Controllers\Admin\PackageController::class, 'create'])->name('admin.package_new');
Route::post('/admin/packages/store', [App\Http\Controllers\Admin\PackageController::class, 'store'])->name('admin.package_store');
Route::get('/admin/packages/edit/{id}', [App\Http\Controllers\Admin\PackageController::class, 'edit'])->name('admin.package_edit');
Route::post('/admin/packages/update/{id}', [App\Http\Controllers\Admin\PackageController::class, 'update'])->name('admin.package_update');
Route::get('/admin/packages/delete/{id}', [App\Http\Controllers\Admin\PackageController::class, 'destroy'])->name('admin.package_delete');

// visa
Route::get('/admin/visa/list', [App\Http\Controllers\Admin\VisaController::class, 'index'])->name('admin.visa_list');

// blogs
Route::get('/admin/blog/list', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('admin.blogs');

// banner And gallery
Route::get('/admin/banner/list', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'banners'])->name('admin.banners');
Route::get('/admin/gallery/list', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'gallery'])->name('admin.gallery');
Route::get('/admin/settings/contact', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'contact_settings'])->name('admin.settings.contact');
Route::get('/admin/settings/aboutus', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'aboutus_settings'])->name('admin.settings.aboutus');
Route::get('/admin/settings/social-media-links', [App\Http\Controllers\Admin\SiteConfigurationController::class, 'socialmedialinks_settings'])->name('admin.settings.social_media_links');

// enquiry
Route::get('/admin/enquiry/package/list', [App\Http\Controllers\Admin\EnquiryController::class, 'package_enquiries'])->name('admin.package_enquiries');
Route::get('/admin/enquiry/visa/list', [App\Http\Controllers\Admin\EnquiryController::class, 'visa_enquiries'])->name('admin.visa_enquiries');
Route::get('/admin/enquiry/contact/list', [App\Http\Controllers\Admin\EnquiryController::class, 'contact_enquiries'])->name('admin.contact_enquiries');

// testimonials
Route::get('/admin/testimonial/list', [App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('admin.testimonials');
// subscriptions
Route::get('/admin/subscription/list', [App\Http\Controllers\Admin\SubscriptionController::class, 'index'])->name('admin.subscriptions');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
