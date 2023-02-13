<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ViewerController;

use App\Http\Controllers\Website\HomeController;

use App\Models\Viewer;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('test' , 'cms.parent');
Route::view('temp' , 'cms.temp');


Route::prefix('cms/')->middleware('guest:admin,author')->group(function(){
    Route::get('{guard}/login' , [UserAuthController::class , 'showLogin'])->name('view.login');
    Route::post('{guard}/login' , [UserAuthController::class , 'login']);
});

Route::prefix('cms/admin/')->middleware('auth:admin,author')->group(function(){
    Route::get('logout' , [UserAuthController::class , 'logout'])->name('cms.logout');
});

Route::prefix('cms/admin/')->middleware('auth:admin,author')->group(function(){
    Route::view('' , 'cms.parent');
    Route::resource('cities' , CityController::class);

    Route::resource('countries' , CountryController::class);
    Route::post('countries_update/{id}' , [CountryController::class , 'update']);

    Route::resource('admins' , AdminController::class);
    Route::post('admins_update/{id}' , [AdminController::class , 'update'])->name('admins_update');

    Route::resource('authors' , AuthorController::class);
    Route::post('authors_update/{id}' , [AuthorController::class , 'update'])->name('authors_update');

    Route::resource('categories' , CategoryController::class);
    Route::post('categories_update/{id}' , [CategoryController::class , 'update'])->name('categories_update');

    Route::resource('viewers' , ViewerController::class);
    Route::delete('viewers', [ViewerController::class, 'truncate'])->name('viewers.destroyAll');
    Route::post('viewers_update/{id}' , [ViewerController::class , 'update'])->name('viewers_update');

    Route::resource('articles' , ArticleController::class);
    Route::post('articles_update/{id}' , [ArticleController::class , 'update'])->name('articles_update');
    Route::get('/create/articles/{id}', [ArticleController::class, 'createArticle'])->name('createArticle');
    Route::get('/index/articles/{id}', [ArticleController::class, 'indexArticle'])->name('indexArticle');

    Route::resource('roles' , RoleController::class);
    Route::post('roles_update/{id}' , [RoleController::class , 'update'])->name('roles_update');

    Route::resource('permissions' , PermissionController::class);
    Route::post('permissions_update/{id}' , [PermissionController::class , 'update'])->name('permissions_update');
    Route::resource('roles.permissions' , RolePermissionController::class);

    Route::resource('sliders' , SliderController::class);
    Route::post('sliders_update/{id}' , [SliderController::class , 'update'])->name('sliders_update');

    Route::resource('contacts' , ContactController::class);
    Route::resource('comments' , CommentController::class);

});


Route::prefix('website/')->group(function(){
    Route::get('news' , [HomeController::class , 'index'])->name('news');
    Route::get('all/{id}' , [HomeController::class , 'all'])->name('news.all');
    Route::get('det/{id}' , [HomeController::class , 'det'])->name('news.det');

    Route::get('contact' , [HomeController::class , 'contact'])->name('news.contact');
    Route::post('storeContact' , [HomeController::class , 'storeContact']);

});

Route::prefix('front/')->group(function(){
    Route::get('index/' , [NewsController::class , 'index'])->name('news');
    Route::get('all/{id}' , [NewsController::class , 'all'])->name('news.all');
    Route::get('det/{id}' , [NewsController::class , 'det'])->name('news.det');

});