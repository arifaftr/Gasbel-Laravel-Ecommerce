# GASSBEL E-COMMERCE - SETUP & CONFIGURATION GUIDE

## 1. INSTALL REQUIRED PACKAGES

```bash
composer require laravel/socialite midtrans/midtrans-php
```

## 2. DATABASE MIGRATION

```bash
php artisan migrate
```

This will add the `google_id` column to users table.

---

## 3. GOOGLE OAuth SETUP

### Step 1: Create Google OAuth Credentials
- Go to https://console.cloud.google.com/
- Create a new project or select existing one
- Navigate to "APIs & Services" > "Credentials"
- Click "Create Credentials" > "OAuth client ID"
- Select "Web application"
- Add these Authorized redirect URIs:
  - http://ecommerce_filament1.test/auth/google/callback (local)
  - https://yourdomain.com/auth/google/callback (production)
- Copy your Client ID and Client Secret

### Step 2: Update .env file

```env
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret
GOOGLE_REDIRECT_URI=http://ecommerce_filament1.test/auth/google/callback
```

### Step 3: Verify config/services.php

Should contain:
```php
'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('GOOGLE_REDIRECT_URI'),
],
```

### Step 4: Test Google Login
- Visit /login page
- Click "Login with Google"
- Follow the OAuth consent flow

**Troubleshooting:**
- Clear cache: `php artisan config:cache && php artisan cache:clear`
- Check `.env` variables are correct
- Verify redirect URI matches exactly in Google Console
- Check `storage/logs/laravel.log` for errors

---

## 4. MIDTRANS PAYMENT GATEWAY SETUP

### Step 1: Get Midtrans Credentials
- Go to https://dashboard.sandbox.midtrans.com (for testing)
- Register/Login with your account
- Navigate to "Settings" > "Access Keys"
- Copy the Server Key and Client Key

### Step 2: Update .env file

```env
MIDTRANS_IS_PRODUCTION=false
MIDTRANS_SERVER_KEY=your_midtrans_server_key
MIDTRANS_CLIENT_KEY=your_midtrans_client_key
```

For production:
```env
MIDTRANS_IS_PRODUCTION=true
MIDTRANS_SERVER_KEY=your_production_server_key
MIDTRANS_CLIENT_KEY=your_production_client_key
```

### Step 3: Set Allowed Callbacks in Midtrans
- In Midtrans Dashboard, go to "Settings" > "Notification URL"
- Add: `http://yourdomain.com/payment/callback`

### Step 4: Test Payment Flow
1. Login to your store
2. Add products to cart
3. Click "Lanjut ke Pembayaran" (Proceed to Checkout)
4. Fill shipping address and click "Lanjutkan ke Pembayaran"
5. On payment page, click "Bayar Sekarang" (Pay Now)
6. Test card numbers from Midtrans docs will work in sandbox

**Test Cards (Sandbox):**
- Visa: 4111111111111111 (any future date, any CVV)
- MasterCard: 5555555555554444 (any future date, any CVV)

---

## 5. AUTHENTICATION & SECURITY

### Features Implemented:
- ✅ Google OAuth Login/Register (Socialite)
- ✅ Rate Limiting: 5 failed login attempts per 1 minute
- ✅ CSRF Protection on all forms
- ✅ Password hashing (bcrypt)
- ✅ Session regeneration after login
- ✅ Checkout protection (auth middleware)

### Login Routes:
- GET `/login` - Show login form
- POST `/login` - Submit login (throttled 5:1)
- GET `/register` - Show register form
- POST `/register` - Submit registration
- GET `/auth/google` - Redirect to Google OAuth
- GET `/auth/google/callback` - Google callback handler
- POST `/logout` - Logout user

---

## 6. CHECKOUT & PAYMENT FLOW

### Checkout Routes:
- GET `/checkout` - Show checkout form (requires auth)
- POST `/checkout` - Process checkout form
- GET `/payment/midtrans` - Display Midtrans payment page

### Payment Result Routes:
- GET `/payment/success` - Payment successful page
- GET `/payment/failed` - Payment failed page
- GET `/payment/pending` - Payment pending page
- POST `/payment/callback` - Midtrans webhook callback

### Checkout Flow:
1. User logs in
2. Adds items to cart
3. Clicks "Lanjut ke Pembayaran" button
4. Redirected to `/checkout` (protected by auth)
5. Fills shipping address
6. Clicks "Lanjutkan ke Pembayaran"
7. Data validated and stored in session
8. Redirected to `/payment/midtrans`
9. Selects payment method in Midtrans popup
10. Completes payment
11. Redirected to success/failed/pending page based on status

---

## 7. ENVIRONMENT VARIABLES CHECKLIST

Add these to your `.env` file:

```env
# Google OAuth
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=http://ecommerce_filament1.test/auth/google/callback

# Midtrans Payment
MIDTRANS_IS_PRODUCTION=false
MIDTRANS_SERVER_KEY=
MIDTRANS_CLIENT_KEY=
```

---

## 8. KEY FEATURES

### Modern Authentication ✅
- Google OAuth with Laravel Socialite
- User auto-registration on first Google login
- Existing user auto-login
- Stores google_id in database for future linking

### Security ✅
- Rate limiting (5 attempts/1 min on login POST)
- CSRF protection on all forms
- Password hashing with bcrypt
- Session regeneration after login
- Auth middleware on checkout

### Payment Integration ✅
- Midtrans Snap popup integration
- Item-level payment detail
- Order summary with tax & shipping calculation
- Payment callback webhook handling
- Success/Failed/Pending result pages

### UX ✅
- Smooth login/register flow
- Google button on both login & register pages
- Protected checkout automatically redirects to login
- After login, redirects back to intended page (checkout)
- Styled Bootstrap UI matching store design

---

## 9. TROUBLESHOOTING

**Google OAuth not working?**
- Check Client ID/Secret are correct
- Verify redirect URI in Google Console
- Run: `php artisan config:cache`
- Check logs: `tail -f storage/logs/laravel.log`

**Midtrans payment not loading?**
- Verify Client Key is correct
- Check browser console for JavaScript errors
- Ensure snap.js script loaded from Midtrans CDN
- Test in sandbox first before production

**Checkout form not submitting?**
- Verify auth middleware is active (you're logged in)
- Check Laravel logs for validation errors
- Ensure cart has items and totals calculated

**Cart totals not matching checkout?**
- CheckoutController now pulls fresh cart data
- Calculates: subtotal + (10% tax) + Rp 15,000 shipping
- Verify cart items have correct prices and quantities

---

## 10. QUICK START COMMANDS

```bash
# Install packages
composer require laravel/socialite midtrans/midtrans-php

# Run migrations
php artisan migrate

# Clear cache
php artisan config:cache
php artisan cache:clear

# View routes
php artisan route:list

# Check logs
tail -f storage/logs/laravel.log
```

---

## 11. FILE STRUCTURE

```
app/Http/Controllers/
├── AuthController.php          (Register/Google OAuth logic)
├── CheckoutController.php      (Checkout form & calculation)
├── PaymentController.php       (Midtrans integration)
└── GoogleAuthController.php    (Google OAuth redirect/callback)

routes/
├── web.php                     (All route definitions)

resources/views/
├── auth/
│   ├── login.blade.php         (Login form + Google button)
│   └── register.blade.php      (Register form + Google button)
├── checkout.blade.php          (Checkout form + cart summary)
└── payment/
    ├── midtrans.blade.php      (Midtrans Snap UI)
    ├── success.blade.php       (Success page)
    ├── failed.blade.php        (Failed page)
    └── pending.blade.php       (Pending page)

config/
└── services.php                (Google & other services config)
```

---

**All features are ready to use! Just configure the .env variables and run the migration.**
