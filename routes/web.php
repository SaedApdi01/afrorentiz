<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\MessageController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\PropertyController;
use App\Http\Controllers\Admin\PropertyController as AdminProperty;
use App\Http\Controllers\Admin\UserListController;
use Illuminate\Support\Facades\Route;




Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('privacy-policy', [FrontendController::class, 'privacy'])->name('privacy');
Route::get('terms-and-conditions', [FrontendController::class, 'terms'])->name('terms');
Route::get('about', [FrontendController::class, 'about'])->name('about');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('properties', [FrontendController::class, 'properties'])->name('properties');
Route::get('property/{slug}', [FrontendController::class, 'viewProperty'])->name('property.view')->middleware('auth');


Route::group([
    'middleware' => ['auth', 'isAdmin'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {

    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('properties', [AdminProperty::class, 'index'])->name('properties');
    Route::delete('delete/property/{id}', [AdminProperty::class, 'destroy'])->name('destroy.property');

    Route::get('users', [UserListController::class, 'index'])->name('users.index');
});




Route::middleware(['auth', 'verified'])->group(function () {

    /**User dashboard */
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('edit-profile', [DashboardController::class, 'editProfile'])->name('edit-profile');
    Route::post('update-profile', [ProfileController::class, 'updateProfile'])->name('update-profile');
    Route::post('update-passowrd', [ProfileController::class, 'updatePassword'])->name('update-password');
    /**Profile routes ends */

    /**Adding property routes start */
    Route::get('add-property', [PropertyController::class, 'index'])->name('property.index')->middleware('profileCompleted');
    Route::post('store-property', [PropertyController::class, 'storeProperty'])->name('property.store');
    Route::get('edit-property/{id}', [PropertyController::class, 'editProperty'])->name('property.edit');
    Route::post('update-property/{id}', [PropertyController::class, 'updateProperty'])->name('property.update');
    Route::delete('/property/{id}', [PropertyController::class, 'destroy'])->name('property.destroy');
    Route::post('send-messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('messages', [MessageController::class, 'ownerMessages'])->name('owner.messages');
    Route::delete('delete/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    /**addin property routes end */
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
