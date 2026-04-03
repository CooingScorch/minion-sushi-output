<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\WaiterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaxController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ADMIN\AdminDashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ADMIN\AdminFeedbackController;
use App\Http\Controllers\ADMIN\AdminContactController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes — Minion Sushi Table-Side App
|--------------------------------------------------------------------------
*/

// ── PAGE ROUTES ──────────────────────────────────────────────────────────

Route::get('/',                  [PageController::class, 'showlogin'])                       ->name('login');
Route::post('/login',            [PageController::class, 'login'])                           ->name('postlogin');
Route::get('/register',          [PageController::class, 'showRegister'])                    ->name('register');
Route::post('/register',         [PageController::class, 'register'])                        ->name('postregister');
Route::get('/forgot-password',   [PageController::class, 'showForgotForm'])                  ->name('forgot-password');
Route::post('/forgot-password',  [PageController::class, 'sendTemporaryPassword'])           ->name('postforgotpassword');
Route::get('/guest',             [PageController::class, 'guest'])                           ->name('guest');
Route::get('/home',              [HomeController::class,  'home'])                           ->name('home');

Route::get('/menu',              [PageController::class,  'menu'])                           ->name('menu');
Route::get('menu/sashimi',         [PageController::class, 'sashimi'])                         ->name('sashimi');
Route::get('menu/sushi',         [PageController::class, 'sushi'])                           ->name('sushi');
Route::get('menu/drinks',         [PageController::class, 'drinks'])                          ->name('drinks');
Route::get('menu/donburi',         [PageController::class, 'donburi'])                         ->name('donburi');
Route::get('menu/noodles',         [PageController::class, 'noodles'])                         ->name('noodles');

Route::get('/cart',              [CartController::class,  'cartPage'])                           ->name('cart');
Route::post('/order/place', [CartController::class, 'placeOrder'])                            ->name('order.place');
//Route::get('/feedback',  [PageController::class,  'feedback'])->name('feedback');
//Route::get('/profile',           [PageController::class,  'profile'])               ->name('profile');
Route::get('/waiter',            [PageController::class,  'waiter'])                         ->name('waiter');
//Route::get('/settings',  [PageController::class,  'settings'])->name('settings');
//Route::get('/logout',    [PageController::class,  'logout'])->name('logout');
Route::get('/contact',           [PageController::class, 'contact'])->name('contact');
Route::post('/contact',          [ContactController::class, 'store'])->name('contact.store');

//only user who login can access
Route::middleware('checklogin')->group(function () {

    Route::get('/profile',           [PageController::class,  'profile'])                    ->name('profile');
    Route::get('/profile/password',  [PageController::class, 'showChangePassword'])          ->name('change-password');
    Route::post('/profile/password', [PageController::class, 'updatePassword'])              ->name('postforupdatepassword');
    Route::get('/profile/edit',      [PageController::class, 'showEditProfile'])             ->name('editProfile');
    Route::post('/profile/edit',     [PageController::class, 'updateProfile'])               ->name('postupdateProfile');
    Route::get('/settings',          [PageController::class,  'settings'])                   ->name('settings');
    Route::get('/logout',            [PageController::class,  'logout'])                     ->name('logout');
    Route::get('/feedback',          [FeedbackController::class, 'index'])->name('feedback');
    Route::post('/feedback',         [FeedbackController::class, 'store'])->name('feedback.store');
});

//only admin user can access
Route::middleware('is_admin')->group(function () {

Route::get('/dashboard',         [AdminDashboardController::class, 'showAdminDashboard'])     ->name('AdminDashboard');
Route::get('/admin/password',    [AdminDashboardController::class, 'showChangePassword'])     ->name('admin.change-password');
Route::post('/admin/password',   [AdminDashboardController::class, 'updatePassword'])         ->name('admin.update-password');
Route::get('/admin/customers',   [AdminDashboardController::class, 'showCustomerList'])       ->name('admin.customer-list');
Route::get('/admin/customers/{id}/edit', [AdminDashboardController::class, 'editCustomer'])   ->name('admin.customer.edit');
Route::put('/admin/customers/{id}', [AdminDashboardController::class, 'updateCustomer'])      ->name('admin.customer.update');
Route::delete('/admin/customers/{id}',[AdminDashboardController::class, 'deleteCustomer'])    ->name('admin.customer.delete');
Route::get('/admin/staff',       [AdminDashboardController::class, 'showStaffList'])          ->name('admin.staff-list');
Route::get('/admin/staff/{id}/edit', [AdminDashboardController::class, 'editStaff'])          ->name('admin.staff.edit');
Route::put('/admin/staff/{id}',  [AdminDashboardController::class, 'updateStaff'])            ->name('admin.staff.update');
Route::delete('/admin/staff/{id}',    [AdminDashboardController::class, 'deleteStaff'])       ->name('admin.staff.delete');
Route::get('/admin/menu',        [AdminDashboardController::class, 'showAddDropMenu'])        ->name('admin.add-drop-menu');
Route::get('/admin/menu/create',        [AdminDashboardController::class, 'createMenuItem'])  ->name('admin.menuItem.create');
Route::post('/admin/menu/add',        [AdminDashboardController::class, 'addMenuItem'])       ->name('admin.menuItem.add');
Route::get('/admin/menu/{id}/edit',    [AdminDashboardController::class, 'editMenuItem'])     ->name('admin.menuItem.edit');
Route::post('/admin/menu/{id}',    [AdminDashboardController::class, 'updateMenuItem'])     ->name('admin.menuItem.update');
Route::delete('/admin/menu/{id}',    [AdminDashboardController::class, 'deleteMenuItem'])     ->name('admin.menuItem.delete');
Route::get('/admin/orders',      [AdminDashboardController::class, 'showOrderLog'])           ->name('admin.order-log');  
Route::get('/admin/order/items',      [AdminDashboardController::class, 'showOrderItems'])           ->name('admin.order.items');  

Route::get('/admin/feedback', [AdminFeedbackController::class, 'index'])->name('admin.feedback.index');
Route::delete('/admin/feedback/{feedback}', [AdminFeedbackController::class, 'destroy'])->name('admin.feedback.destroy');
Route::get('/admin/contact', [AdminContactController::class, 'index'])->name('admin.contact.index');
Route::delete('/admin/contact/{contact}', [AdminContactController::class, 'destroy'])->name('admin.contact.destroy');    
});

// ── LANGUAGE SWITCH ───────────────────────────────────────────────────────

Route::get('/language/{lang}', [LanguageController::class, 'switch'])
    ->where('lang', 'en|zh|ms')
    ->name('language.switch');

// ── API / AJAX ROUTES ─────────────────────────────────────────────────────

// Pax (party size)
Route::post('/api/pax',       [PaxController::class,   'save'])->name('pax.save');
Route::post('/api/clear-pax', [PaxController::class,   'clear'])->name('pax.clear');

// Table
Route::get('/api/occupied-tables',  [HomeController::class,  'occupiedTables']);
Route::post('/api/table',           [TableController::class, 'store'])->name('table.save');
Route::post('/api/clear-table',     [TableController::class, 'clear'])->name('table.clear');

// Waiter
Route::post('/api/waiter', [WaiterController::class, 'call'])->name('waiter.call');

// Cart
Route::post('/api/cart/add',    [CartController::class, 'add'])->name('cart.add');
Route::post('/api/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/api/cart/clear',  [CartController::class, 'clear'])->name('cart.clear');

// Order
Route::post('/api/order/place', [OrderController::class, 'place'])->name('order.place');

// Billing
Route::post('/api/bill/request',  [BillingController::class, 'requestBill'])->name('bill.request');
Route::get('/api/bill/status',    [BillingController::class, 'billStatus'])->name('bill.status');
Route::post('/api/bill/cancel',   [BillingController::class, 'cancelBill'])->name('bill.cancel');
