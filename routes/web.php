<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Frontend\ReservationController;
use App\Http\Controllers\Frontend\RoomController;
use App\Http\Controllers\Frontend\UserProfileController;

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\RoomControllerBackoffice;
use App\Http\Controllers\Backend\ReservationControllerBackoffice;

use App\Http\Controllers\PromoCodeController;

use App\Http\Controllers\Frontend\PaymentController;

// Rotas do Frontend
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('client.login');
Route::post('/login', [AuthController::class, 'login'])->name('client.login.submit');
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('client.signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('client.signup.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('client.logout');

// Rotas do Frontend Quartos
Route::get('/room/{id}', [RoomController::class, 'show'])->name('room.show');
Route::post('/room/{id}/reserve', [ReservationController::class, 'store'])->name('room.store');

//Rotas do Frontend Reservas
Route::get('/reserve', [ReservationController::class, 'create'])->name('reserve.create');
Route::post('/reserve', [ReservationController::class, 'store'])->name('reserve.store');


// Rotas do Backend
Route::get('/panel/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/panel/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/panel/logout', [AdminController::class, 'logout'])->name('admin.logout');

//Rota Verificar Promo
Route::post('/promo/validate', [PromoCodeController::class, 'validatePromoCode'])->name('promo.validate');


// Rotas de Pagamento
Route::middleware(['auth'])->group(function () {
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.page');
    Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');
    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');

    //Rotas do Frontend Perfil
    Route::get('/profile', [UserProfileController::class, 'index'])->name('user.profile');

});




Route::prefix('panel')->middleware('employee')->group(function () {

    Route::get('/logs', [AdminController::class, 'logs'])->name('admin.logs');

    // Rotas para index
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/rooms', [AdminController::class, 'rooms'])->name('admin.rooms');
    Route::get('/reservations', [AdminController::class, 'reservations'])->name('admin.reservations');

    // Rotas para edição de quartos
    Route::get('/rooms/{id}/edit', [RoomControllerBackoffice::class, 'edit'])->name('admin.rooms.edit');
    Route::put('/rooms/{id}', [RoomControllerBackoffice::class, 'update'])->name('admin.rooms.update');
    // Rotas para exclusão de quartos
    Route::delete('/rooms/{id}/delete', [RoomControllerBackoffice::class, 'delete'])->name('admin.rooms.delete');


    //Rotas do Backoffice Reservas
    Route::get('/reserve/{id}/edit', [ReservationControllerBackoffice::class, 'edit'])->name('reserve.edit');
    Route::put('/reserve/{id}', [ReservationControllerBackoffice::class, 'update'])->name('reserve.update');
    Route::delete('/reserve/{id}', [ReservationControllerBackoffice::class, 'destroy'])->name('reserve.destroy');

});

