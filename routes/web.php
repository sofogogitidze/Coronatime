<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\WorldwideStatistics;
use Illuminate\Support\Facades\Route;

Route::get('change-locale/{locale}', [LanguageController::class, 'change'])->name('locale.change');

Route::group(['middleware' => ['guest']], function () {
	Route::view('/', 'pages.welcome')->name('home');

	Route::view('email/verify-reset', 'pages.email_sent')->name('reset.email_sent');
	Route::view('email/reset-verified', 'pages.reset_verified')->name('reset.verified');

	Route::controller(RegisterController::class)->group(function () {
		Route::get('register', 'show')->name('register.show');
		Route::post('register', 'register')->name('register');
	});

	Route::post('login', [AuthController::class, 'login'])->name('login');

	Route::controller(PasswordResetController::class)->group(function () {
		Route::get('forgot-password', 'show')->name('password.request');
		Route::post('forgot-password', 'submit')->name('password.email');
		Route::get('reset-password/{token}', 'showReset')->name('password.reset');
		Route::post('reset-password', 'update')->name('password.update');
	});
});

Route::group(['middleware' => ['auth']], function () {
	Route::controller(EmailVerificationController::class)->group(function () {
		Route::get('email/verify/{id}/{hash}', 'verify')->middleware(['signed'])->name('verification.verify');
		Route::get('email/verify', 'show')->name('email.sent');
		Route::get('email-verified', 'verified')->name('email.verified');
	});

	Route::get('worldwide-statistics', [WorldwideStatistics::class, 'index'])->name('worldwide.statistics')->middleware(['verified']);
	Route::get('country-statistics', [StatisticController::class, 'index'])->name('country.statistics')->middleware(['verified']);

	Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
