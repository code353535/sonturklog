<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Livewire\Feedlinkform;
use App\Http\Controllers\FeedController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Livewire\Siteupdate;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminuserController;
use App\Http\Controllers\AdmincategoryController;
use App\Http\Controllers\AdminsiteController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\AdmintalepController;
use App\Http\Controllers\FrontController;

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

Route::get('/',  [FrontController::class, 'index'])->name('front.index');

Route::get('/kategori/{cat}',  [FrontController::class, 'kategorilist'])->name('front.kategori');
Route::get('/sss', [SiteController::class, 'sss'])->name('sss');
Route::get('/gizlilik-politikasi', [FrontController::class, 'gizlilik'])->name('gizlilik');
Route::get('/kullanim-sartlari', [FrontController::class, 'sartlar'])->name('sartlar');
Route::get('/yayin-politikasi', [FrontController::class, 'yayinsartlari'])->name('yayinsartlari');
Route::post('/linksay',  [FrontController::class, 'linksay'])->name('front.linksay');
Route::get('/detaylar/{id}/{slug}',  [FrontController::class, 'detay'])->name('front.detaylar');
Route::get('/bloglar',  [FrontController::class, 'bloglar'])->name('front.bloglar');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::post('/okundu', [SiteController::class, 'markAsNotification'])->name('markAsNotification');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/sifre', function () {return view('profile.sifre');})->name('profile.sifre');

    Route::get('/site/ekle', [SiteController::class, 'ekle'])->name('site.ekle');
    Route::get('/site/index', [SiteController::class, 'index'])->name('site.index');
    Route::get('/site/sahiplik-onay/{id}', [SiteController::class, 'sahiplik'])->name('sahiplik.onay');
    Route::get('/site/dogrula/{id}', [SiteController::class, 'dogrula'])->name('sahiplik.dogrula');
    Route::get('/site/guncelle/{id}', Siteupdate::class)->name('site.edit');
    Route::delete('/site/sil', [SiteController::class, 'sitesil'])->name('site.sil');

    Route::get('/site/linkekle/{id}', Feedlinkform::class)->name('feed.ekle');

    Route::get('/site/destek', [SiteController::class, 'destek'])->name('site.destek');
    Route::post('/site/destek/form', [SiteController::class, 'destekform'])->name('site.destekform');
    Route::get('/site/destek/liste', [SiteController::class, 'desteklist'])->name('site.desteklist');
    Route::get('/site/destek/liste/detay/{id}', [SiteController::class, 'destekdetay'])->name('site.destekdetay');
    Route::post('/site/destek/liste/edit/{id}', [SiteController::class, 'destekedit'])->name('site.destekedit');
    Route::get('/site/destek/cevap/{id}', [SiteController::class, 'kap'])->name('site.destekkap');
    Route::get('/site/redonay/{id}', [SiteController::class, 'redonay'])->name('site.redonay');
});



Route::group(['middleware' => ['App\Http\Middleware\Admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users/userlist', [AdminUserController::class, 'userlist'])->name('admin.userlist');
    Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/users/{user}/update', [AdminUserController::class, 'update'])->name('admin.update');
    Route::delete('/admin/user/{user}/destroy', [AdminUserController::class, 'destroy'])->name('adminsite.destroy');

    Route::get('/admin/kategori/list', [AdmincategoryController::class, 'categorylist'])->name('admin.categorylist');
    Route::get('/admin/kategori/ekle', [AdmincategoryController::class, 'categoryadd'])->name('admin.categoryadd');
    Route::post('/admin/kategori/ekle', [AdmincategoryController::class, 'create'])->name('admin.categorycreate');
    Route::get('/admin/kategori/{category}/edit', [AdmincategoryController::class, 'edit'])->name('admin.categoryedit');
    Route::put('/admin/kategori/{category}/update', [AdmincategoryController::class, 'update'])->name('admin.categoryupdate');
    Route::delete('/admin/kategori/{category}/destroy', [AdmincategoryController::class, 'destroy'])->name('admin.categorydestroy');

    Route::get('/admin/siteler/sitelist', [AdminsiteController::class, 'index'])->name('admin.sitelist');
    Route::get('/admin/siteler/onaybekleyen', [AdminsiteController::class, 'onaybekleyen'])->name('admin.onaybekleyen');
    Route::get('/admin/siteler/onayli', [AdminsiteController::class, 'onayli'])->name('admin.onayli');
    Route::get('/admin/siteler/{site}/update', [AdminSiteController::class, 'update'])->name('admin.siteupdate');
    Route::put('/admin/siteler/{site}/kaydet', [AdminSiteController::class, 'kaydet'])->name('admin.sitekaydet');
    Route::delete('/admin/siteler/{site}/destroy', [AdminSiteController::class, 'sitedestroy'])->name('adminsite.sitedestroy');

    Route::get('/admin/siteler/{site}/feedlist', [AdminSiteController::class, 'feedlist'])->name('admin.feedlist');
    Route::get('/admin/siteler/{feed}/feededit', [AdminSiteController::class, 'feededit'])->name('admin.feededit');
    Route::put('/admin/siteler/{feed}/kaydet', [AdminSiteController::class, 'feedupdate'])->name('admin.feedupdate');
    Route::delete('/admin/siteler/{feed}/feeddestroy', [AdminSiteController::class, 'feeddestroy'])->name('admin.feeddestroy');

    Route::get('/admin/siteler/{feed}/botlist', [AdminSiteController::class, 'botlist'])->name('admin.botlist');
    Route::delete('/admin/siteler/{bot}/botdestroy', [AdminSiteController::class, 'botdestroy'])->name('admin.botdestroy');

    Route::get('/admin/siteler/siteekle', [AdminsiteController::class, 'siteekle'])->name('admin.siteekle');
    Route::post('/admin/siteler/eklekaydet', [AdminSiteController::class, 'siteeklekaydet'])->name('admin.siteeklekaydet');

    Route::get('/admin/destek/list', [AdmintalepController::class, 'list'])->name('admin.desteklist');
    Route::get('/admin/destek/{destek}/edit', [AdmintalepController::class, 'edit'])->name('admin.destekedit');
    Route::put('/admin/destek/{destek}/update', [AdmintalepController::class, 'update'])->name('admin.destekupdate');
});

require __DIR__.'/auth.php';
