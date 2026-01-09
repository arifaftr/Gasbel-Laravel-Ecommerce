Implementation notes and manual wiring steps

1) Install Socialite

   Run in project root:

   composer require laravel/socialite

2) Add environment variables to your `.env`:

   GOOGLE_CLIENT_ID=your-google-client-id
   GOOGLE_CLIENT_SECRET=your-google-client-secret
   GOOGLE_REDIRECT_URI=https://your-app.test/auth/google/callback

3) Add the Socialite provider (Laravel 8+ auto-discovers; no extra step usually needed).

4) Include the new routes in `routes/web.php` by adding the following line near top or bottom:

   require __DIR__.'/auth_custom.php';

5) Run migrations to add `google_id` column and apply schema changes:

   php artisan migrate

6) Notes on behavior

- Login attempts are rate limited: max 5 failed attempts per minute. A message is returned when limit exceeded.
- Google login will create a user automatically if the email doesn't exist, filling `name`, `email`, and `google_id`.
- After login, sessions are regenerated to prevent fixation and users are redirected with `intended()` behaviour (checkout protected route will redirect to login and return to checkout after successful login).

7) Optional: add `google_id` to `$fillable` in `app/Models/User.php` if you use mass assignment in other places.
