<?php

use Illuminate\Support\Facades\Route;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:5,1')->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Redirect Filament's admin login to the shared login page (named for Filament)
Route::get('admin/login', function () {
    return redirect('/login');
})->name('filament.admin.auth.login');

Route::get('/', function () {
    // If authenticated user is admin, redirect to Filament admin
    if (Auth::check() && Auth::user()->is_admin) {
        return redirect('/admin');
    }

    $products = Product::with('category')->get();
    return view('shop', compact('products'));
});

// Profile route for authenticated users
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile');

// Registration (uses custom AuthController created earlier)
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.attempt');

// Product detail route
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

// Product filter route
Route::get('/products/filter', [ProductController::class, 'filter'])->name('products.filter');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::middleware('auth')->group(function () {
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
});

// Protected checkout route
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/payment/midtrans', [PaymentController::class, 'midtrans'])->name('payment.midtrans');
});

// Midtrans callback (webhook)
Route::post('/payment/callback', [PaymentController::class, 'callback']);

// Payment result pages
Route::get('/payment/success', function () {
    return view('payment.success');
});
Route::get('/payment/failed', function () {
    return view('payment.failed');
});
Route::get('/payment/pending', function () {
    return view('payment.pending');
});

// Google OAuth routes (Socialite)
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

require __DIR__.'/auth_custom.php';

// Password reset (request link, send email, show reset form, perform reset)
Route::get('password/reset', function () {
    return view('auth.passwords.email');
})->name('password.request');

Route::post('password/email', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    $status = Password::sendResetLink($request->only('email'));
    return $status === Password::RESET_LINK_SENT
        ? back()->with('status', __($status))
        : back()->withErrors(['email' => __($status)]);
})->name('password.email');

Route::get('password/reset/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->name('password.reset');

Route::post('password/reset', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
            $user->save();
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');

