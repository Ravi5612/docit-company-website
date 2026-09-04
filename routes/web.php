<?php


use App\Http\Controllers\ContactLeadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\TermsConditionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WebsiteSettingController;
use App\Http\Controllers\SocialSettingController;
use App\Models\Technology;
use App\Models\Service;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\CareerApplicationController;
use App\Http\Controllers\PopupController;
use App\Http\Controllers\SocialFeedController;
use App\Http\Controllers\GaleryImagesController;
use App\Http\Controllers\HomeSliderController;

Route::get('/', function () {
    return view('website.pages.index');
})->name('home');
Route::get('/index', function () {
    return view('website.pages.index'); //for diff layout
})->name('index');
Route::get('/about-us', function () {
    return view('website.pages.about-us');
})->name('about-us');
Route::get('/eea', function () {
    return view('website.pages.eea');
})->name('eea');
Route::get('/career', function () {
    return view('website.pages.career');
})->name('career');
Route::get('/contact-us', function () {
    return view('website.pages.contact-us');
})->name('contact-us');
Route::get('/apply-now', function () {
    return view('website.pages.apply-now');
})->name('apply-now');
Route::get('/our-clients', function () {
    return view('website.pages.our-clients');
})->name('our-clients');
Route::get('/our-presence', function () {
    return view('website.pages.our-presence');
})->name('our-presence');
Route::get('/privacy-policy', function () {
    return view('website.pages.privacy-policy');
})->name('privacy-policy');
Route::get('/terms-conditions', function () {
    return view('website.pages.terms-conditions');
})->name('terms-conditions');
Route::get('/mission-vision', function () {
    return view('website.pages.mission-vision');
})->name('mission-vision');
Route::get('/our-blogs', function () {
    return view('website.pages.our-blogs');
})->name('our-blogs');
Route::get('/our-gallery', function () {
    return view('website.pages.our-gallery');
})->name('our-gallery');

Route::get('/blog-details/{slug}', function ($slug) {
    $blogs = Blog::where('slug', $slug)->firstOrFail();
    return view('website.pages.blog-details', compact('blogs'));
})->name('blog-details');



Route::get('/technology-details/{slug}', function ($slug) {
    $technology = Technology::where('slug', $slug)
        ->where('status', 'active')
        ->first();
    return view('website.pages.technology-details', compact('technology'));
})->name('technology-details');
Route::get('/service-details/{slug}', function ($slug) {
    $service = Service::where('slug', $slug)
        ->where('status', 'active')
        ->first();
    return view('website.pages.service-details', compact('service'));
})->name('service-details');

// contact leads store
Route::post('/contact-us/store', [ContactLeadController::class, 'store'])->name('contact-us.store');

Route::post('/career-application', [CareerApplicationController::class, 'store'])
    ->name('career.application.store');

Route::get('/dashboard', function () {
    $totalLeads = App\Models\ContactLead::count();
    $blogs = App\Models\Blog::count();


    return view('admin.views.dashboard', [
        'totalLeads' => $totalLeads,
        'blogs' => $blogs,

    ]);
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    // setting page
    Route::get('/admin-settings', function () {
        return view('admin.views.setting');
    })->name('admin-setting');

    // profile CRUD
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // admin settings
    Route::get('/admin-settings', function () {
        return view('admin.views.setting');
    })->name('admin-setting');


    // CONTACT LEADS
    Route::get('/admin-leads', [ContactLeadController::class, 'index'])->name('admin-leads');
    Route::delete('/admin-leads/{lead}', [ContactLeadController::class, 'destroy'])->name('admin-leads.destroy');
    Route::post('/leads/delete-selected', [ContactLeadController::class, 'deleteSelected']);


    Route::get('/admin-career-applications', [CareerApplicationController::class, 'index'])->name('admin-career-applications');
    Route::delete('/admin-career-applications/{application}', [CareerApplicationController::class, 'destroy'])->name('admin-career-applications.destroy');
    Route::post('/career-applications/delete-selected', [CareerApplicationController::class, 'deleteSelected']);
    // ************************************************************************************
    // ************************************************************************************
    // Event categories page CMS
    // ************************************************************************************
    // ************************************************************************************





    // blogs
    Route::get('/admin-blogs', [BlogController::class, 'index'])->name('admin-blogs');
    Route::post('/admin-blogs', [BlogController::class, 'store'])->name('admin-blogs.store');
    Route::put('/admin-blogs/{blog}', [BlogController::class, 'update'])->name('admin-blogs.update');
    Route::delete('/admin-blogs/{blog}', [BlogController::class, 'destroy'])->name('admin-blogs.destroy');

    // admin service
    Route::get('/admin-service', [ServiceController::class, 'index'])->name('admin-service');
    Route::post('/admin-service', [ServiceController::class, 'store'])->name('admin-service.store');
    Route::put('/admin-service/{Service}', [ServiceController::class, 'update'])->name('admin-service.update');
    Route::delete('/admin-service/{Service}', [ServiceController::class, 'destroy'])->name('admin-service.destroy');


    // admin technology
    Route::get('/admin-technology', [TechnologyController::class, 'index'])->name('admin-technology.index');
    Route::post('/admin-technology', [TechnologyController::class, 'store'])->name('admin-technology.store');
    Route::put('/admin-technology/{item}', [TechnologyController::class, 'update'])->name('admin-technology.update');
    Route::delete('/admin-technology/{item}', [TechnologyController::class, 'destroy'])->name('admin-technology.destroy');
    // admin partner
    Route::get('/admin-partner', [PartnerController::class, 'index'])->name('admin-partner.index');
    Route::post('/admin-partner', [PartnerController::class, 'store'])->name('admin-partner.store');
    Route::put('/admin-partner/{item}', [PartnerController::class, 'update'])->name('admin-partner.update');
    Route::delete('/admin-partner/{item}', [PartnerController::class, 'destroy'])->name('admin-partner.destroy');



    // ************************************************************************************
    // ************************************************************************************
    // privacy Policy page CMS
    // ************************************************************************************
    // ************************************************************************************
    Route::get('/admin-privacy-policy', [PrivacyPolicyController::class, 'index'])->name('admin-privacy-policy.index');
    Route::put('/admin-privacy-policy/{section}', [PrivacyPolicyController::class, 'update'])->name('admin-privacy-policy.update');
    // ************************************************************************************
    // ************************************************************************************
    // Terms Condition page CMS
    // ************************************************************************************
    // ************************************************************************************
    Route::get('/admin-terms-condition', [TermsConditionController::class, 'index'])->name('admin-terms-condition.index');
    Route::put('/admin-terms-condition/{section}', [TermsConditionController::class, 'update'])->name('admin-terms-condition.update');


    // routes
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
    Route::put('roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    // ************************************************************************************
    // ************************************************************************************
    // Website settings CMS
    // ************************************************************************************
    // ************************************************************************************

    Route::get('/admin-settings', [WebsiteSettingController::class, 'index'])->name('admin-settings.index');
    Route::put('/admin-settings', [WebsiteSettingController::class, 'update'])->name('admin-settings.update');
    // ************************************************************************************
    // ************************************************************************************
    // POPUP CMS
    // ************************************************************************************
    // ************************************************************************************

    Route::get('/admin-popup', [PopupController::class, 'index'])->name('admin-popup.index');
    Route::put('/admin-popup', [PopupController::class, 'update'])->name('admin-popup.update');
    // ************************************************************************************
    // ************************************************************************************
    // social feed CMS
    // ************************************************************************************
    // ************************************************************************************

    Route::get('/admin-social-feed', [SocialFeedController::class, 'index'])->name('admin-social-feed.index');
    Route::put('/admin-social-feed', [SocialFeedController::class, 'update'])->name('admin-social-feed.update');
    // ************************************************************************************
    // ************************************************************************************
    // social settings CMS
    // ************************************************************************************
    // ************************************************************************************
    Route::get('/admin-social-settings', [SocialSettingController::class, 'index'])
        ->name('admin-social-settings.index');

    Route::put('/admin-social-settings', [SocialSettingController::class, 'update'])
        ->name('admin-social-settings.update');


    // admin gallery
    Route::get('/admin-gallery', [GaleryImagesController::class, 'index'])->name('admin-gallery.index');
    Route::post('/admin-gallery', [GaleryImagesController::class, 'store'])->name('admin-gallery.store');
    Route::put('/admin-gallery/{item}', [GaleryImagesController::class, 'update'])->name('admin-gallery.update');
    Route::delete('/admin-gallery/{item}', [GaleryImagesController::class, 'destroy'])->name('admin-gallery.destroy');
    // admin slider
    Route::get('/admin-slider', [HomeSliderController::class, 'index'])->name('admin-slider.index');
    Route::post('/admin-slider', [HomeSliderController::class, 'store'])->name('admin-slider.store');
    Route::put('/admin-slider/{item}', [HomeSliderController::class, 'update'])->name('admin-slider.update');
    Route::delete('/admin-slider/{item}', [HomeSliderController::class, 'destroy'])->name('admin-slider.destroy');

});


Route::get('/admin-users', [UserController::class, 'index'])->name('admin-users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');



require __DIR__ . '/auth.php';
