<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

Route::get('/send_mail',function(){
    Mail::to('moussasamake884@gmail.com')->send(new SendMail);
    return view('mail.main');
});

Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/login_user', [UserController::class, 'login_user'])->name('user.login_user');
Route::post('/login_post', [UserController::class, 'login_post'])->name('user.login_post');
Route::post('/login_post_user', [UserController::class, 'login_post_user'])->name('user.login_post_user');
Route::get('/login_create', [UserController::class, 'create_account'])->name('user.create_account');

Route::prefix('')->group(function () {
    // Route::get('/', Accueil::class)->name('main');
    Route::get('/', [ProduitController::class, 'accueil'])->name('main');
    Route::get('/search', [ProduitController::class, 'search'])->name('search');
    Route::get('/credit/{produit}', [ProduitController::class, 'show'])->name('credit');
    Route::get('/payer/{produit}', [ProduitController::class, 'show_payer'])->name('payer');
    
    Route::get('/formation', [ProduitController::class, 'formation'])->name('formation');
    Route::post('/formation/send_formation', [ProduitController::class, 'send_formation'])->name('send_formation');
   
    Route::get('/maintenace', [ProduitController::class, 'maintenace'])->name('maintenace');
    
    // show article and make command
    Route::get('/form/{produit}', [ProduitController::class, 'form'])->name('credit.form')->middleware('auth');
    Route::post('/form_commande', [ProduitController::class, 'form_commande'])->name('credit.form_commande')->middleware('auth');
    // show article and make checkout
    Route::get('/form_payer/{produit}', [ProduitController::class, 'form_payer'])->name('payer.form')->middleware('auth');
    Route::post('/form_payer', [ProduitController::class, 'form_payer_post'])->name('payer.form_payer')->middleware('auth');

});

Route::prefix('admin')->middleware(['auth','admin:1'])->group(function () {

    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/commande', [AdminController::class, 'commande'])->name('admin.commande');
    Route::get('/achat', [AdminController::class, 'achat'])->name('admin.achat');
    Route::get('/client', [AdminController::class, 'client'])->name('admin.client');
    Route::get('/formation', [AdminController::class, 'formation'])->name('admin.formation');

    Route::prefix('')->group(function () {
        Route::get('/caregorie', [CategorieController::class, 'main'])->name('admin.categorie');
        Route::get('/categorie-edit/{id}', [CategorieController::class, 'edit']);
        Route::post('/categorie-update', [CategorieController::class, 'update'])->name('admin.categorie_update');
        Route::post('/categorie-add', [CategorieController::class, 'add'])->name('admin.categorie_add');
        Route::get('/categorie-delete_search/{id}', [CategorieController::class, 'delete_search']);
        Route::post('/categorie-delete', [CategorieController::class, 'delete'])->name('admin.categorie_delete');
    });
    Route::prefix('')->group(function () {
        Route::get('/image', [ImageController::class, 'main'])->name('admin.image');
        Route::get('/image-edit/{id}', [ImageController::class, 'edit']);
        Route::post('/image-update', [ImageController::class, 'update'])->name('admin.image_update');
        Route::post('/image-add', [ImageController::class, 'add'])->name('admin.image_add');
        Route::get('/image-delete_search/{id}', [ImageController::class, 'delete_search']);
        Route::post('/image-delete', [ImageController::class, 'delete'])->name('admin.image_delete');
    });
    Route::prefix('')->group(function () {
        Route::get('/produit', [ProduitController::class, 'main'])->name('admin.produit');
        Route::get('/produit-edit/{id}', [ProduitController::class, 'edit']);
        Route::post('/produit-update', [ProduitController::class, 'update'])->name('admin.produit_update');
        Route::post('/produit-add', [ProduitController::class, 'add'])->name('admin.produit_add');
        Route::get('/produit-delete_search/{id}', [ProduitController::class, 'delete_search']);
        Route::post('/produit-delete', [ProduitController::class, 'delete'])->name('admin.produit_delete');
    });



});
