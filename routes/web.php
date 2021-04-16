<?php

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

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Admin Login
 */
Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'showAdminLoginForm'])->name('admin.login');
Route::get('/admin/register', [App\Http\Controllers\AdminController::class, 'showAdminRegisterForm'])->name('admin.register');
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'showAdminDashboard'])->name('admin.dashboard');

Route::post('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');
Route::post('/admin/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('admin.register');

/**
 * Route For Blog Post
 */
Route::resource('/post', 'App\Http\Controllers\PostController');
Route::get('/post-trash', 'App\Http\Controllers\PostController@postTrashShow')->name('post.trash');
Route::get('/post-trash-update/{id}', 'App\Http\Controllers\PostController@postTrashUpdate')->name('post.trash.update');
Route::get('/post-status-update/{id}', 'App\Http\Controllers\PostController@postStatusUpdate')->name('post.status.update');

Route::resource('/category', 'App\Http\Controllers\CategoryController');
Route::get('/category/status-inactive/{id}', 'App\Http\Controllers\CategoryController@statusUpdateInactive');
Route::get('/category/status-active/{id}', 'App\Http\Controllers\CategoryController@statusUpdateActive');

Route::resource('/tag', 'App\Http\Controllers\TagController');
Route::get('/tag/status-inactive/{id}', 'App\Http\Controllers\TagController@statusUpdateInactive');
Route::get('/tag/status-active/{id}', 'App\Http\Controllers\TagController@statusUpdateActive');

/**
 * Route For Role
 */
Route::resource('/role', 'App\Http\Controllers\RoleController');
Route::get('edit-role/{id}', 'App\Http\Controllers\RoleController@edit')->name('edit.role');
Route::get('/role/status-update/{id}', 'App\Http\Controllers\RoleController@statusUpdateRole')->name('role.status.update');
Route::post('/role/assign', 'App\Http\Controllers\RoleController@assignRole')->name('role.assign');

/**
 * Route For Frontend
 */
Route::get('blog', [\App\Http\Controllers\BlogPageController::class, 'showBlogPage']);
Route::get('blog/{slug}', [\App\Http\Controllers\BlogPageController::class, 'blogSingle'])->name('post.single');

/**
 * Route For Search Blog Post
 */
Route::post('blog', [\App\Http\Controllers\BlogPageController::class, 'searchBlog'])->name('post.search');
Route::get('blog/category/{slug}', [\App\Http\Controllers\BlogPageController::class, 'searchBlogByCat'])->name('post.cat.search');
Route::get('blog/tag/{slug}', [\App\Http\Controllers\BlogPageController::class, 'searchBlogByTag'])->name('post.tag.search');
Route::get('blog/admin/{user_id}', [\App\Http\Controllers\BlogPageController::class, 'searchBlogByAdmin'])->name('post.admin.search');