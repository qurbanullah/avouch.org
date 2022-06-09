<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Packages\PackageInfoComponent;
use App\Http\Livewire\Packages\PackageDetailComponent;
use App\Http\Livewire\Packages\PackagesGroupDetailComponent;
use App\Http\Livewire\Packages\PackageDownloadComponent;

use App\Http\Livewire\Posts\PostDetailComponent;
use App\Http\Livewire\Posts\PostEditComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Start of routes those require snctum authentication with admin rights
Route::group(['middleware' => [
    'auth:sanctum',
    'verified',
    'ensure.user.is.admin'
]], function () {

    // Admin dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Manage users
    Route::get('/admin/users/all-users', function () {
        return view('admin.users.all-users');
    })->name('admin.users.all-users');

    Route::get('/admin/users/online-users', function () {
        return view('admin.users.online-users');
    })->name('admin.users.online-users');
    // End Manage Users

    // Manage Groups
    Route::get('/admin/groups/all-groups', function () {
        return view('admin.packages.admin-all-groups');
    })->name('admin.packages.admin-all-groups');
    // End Manage Groups

    // Manage Packages
    Route::get('/admin/packages/all-packages', function () {
        return view('admin.packages.all-packages');
    })->name('admin.packages.all-packages');

    Route::get('/admin/packages/all-built-packages', function () {
        return view('admin.packages.all-built-packages');
    })->name('admin.packages.all-built-packages');
    // End Manage Packages

    // Manage Magazine
    Route::get('/admin/posts/admin-all-posts', function () {
        return view('admin.posts.admin-all-posts');
    })->name('admin.posts.admin-all-posts');

    Route::get('/admin/posts/create-new-post', function () {
        return view('admin.posts.admin-create-new-post');
    })->name('admin.posts.admin-create-new-post');
});

// Start of routes those; require snctum authentication
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// End of routes those; require snctum authentication

// Route::get('/upload', 'App\Http\Controllers\UploadController@store')->name('upload');

// Start of routes which do not require any authentication
Route::get('/', function () {
    return view('home');
})->name('home');

// Route::get('contact-us', function () {
//     return view('contact-us');
// })->name('contact-us');

Route::get('/contact-us', [App\Http\Controllers\ContactUsController::class, 'contactForm'])->name('contact-us');

Route::post('/contact-us', [App\Http\Controllers\ContactUsController::class, 'storeContactForm'])->name('contact-us.store');


Route::get('open-source', function () {
    return view('open-source');
})->name('open-source');

Route::get('download-releases', function () {
    return view('downloads.download-releases');
})->name('downloads.download-releases');

// Start of package routes
Route::get('packages/home', function () {
    return view('packages.package-home');
})->name('packages.package-home');
Route::get('/packages/package-info/{package_slug}', PackageInfoComponent::class)->name('packages.package-info-component');
Route::get('/packages/package-detail/{package_id}', PackageDetailComponent::class)->name('packages.package-detail-component');
// Route::get('/packages/download/{package}', PackageDownloadComponent::class)->name('packages.package-download-component');

Route::get('groups', function () {
    return view('packages.packages-groups');
})->name('packages.packages-groups');
Route::get('groups/group-detail/{group_slug}', PackagesGroupDetailComponent::class)->name('packages.packages-group-detail-component');

// End of package routes

// Start of magazine routes
Route::get('magazine', function () {
    return view('posts.post-home');
})->name('posts.post-home');
Route::get('/magazine/{post_slug}', PostDetailComponent::class)->name('posts.post-detail-component');
Route::get('/magazine/edit-post/{post_slug}', PostEditComponent::class)->name('posts.post-edit-component');
// End of magazine routes


// Start of wiki routes
Route::get('wiki', function () {
    return view('wiki.wiki-home');
})->name('wiki.wiki-home');
// Route::get('/wiki/{wiki_slug}', PackageDetailComponent::class)->name('wiki.wiki-detail-component');
// End of package routes
