Google OAuth Setup - Langkah-Langkah Lengkap

1. BUAT GOOGLE OAuth CREDENTIALS
   - Buka https://console.cloud.google.com/
   - Login dengan akun Google Anda
   - Buat project baru atau pilih existing project
   - Go to APIs & Services > Credentials
   - Click "Create Credentials" > "OAuth client ID"
   - Pilih "Web application"
   - Pada "Authorized redirect URIs", tambahkan:
     * http://ecommerce_filament1.test/auth/google/callback (untuk local development)
     * https://your-production-domain.com/auth/google/callback (untuk production)
   - Copy Client ID dan Client Secret

2. TAMBAHKAN KE .env FILE
   GOOGLE_CLIENT_ID=your_client_id_here
   GOOGLE_CLIENT_SECRET=your_client_secret_here
   GOOGLE_REDIRECT_URI=http://ecommerce_filament1.test/auth/google/callback

3. INSTALL SOCIALITE (jika belum)
   composer require laravel/socialite

4. PASTIKAN config/services.php SUDAH ADA ENTRY GOOGLE
   'google' => [
       'client_id' => env('GOOGLE_CLIENT_ID'),
       'client_secret' => env('GOOGLE_CLIENT_SECRET'),
       'redirect' => env('GOOGLE_REDIRECT_URI'),
   ],

5. JALANKAN MIGRATION (untuk kolom google_id)
   php artisan migrate

6. TEST GOOGLE LOGIN
   - Buka halaman login
   - Klik "Login with Google"
   - Jika error 400 Bad Request, pastikan:
     * Credentials sudah benar
     * Redirect URI di Google Console sesuai dengan di .env
     * GOOGLE_CLIENT_ID dan GOOGLE_CLIENT_SECRET sudah diisi di .env
     * Tidak ada typo di nama env variable

7. TROUBLESHOOTING
   Jika masih gagal:
   - Clear cache: php artisan config:cache
   - Clear config: php artisan config:clear
   - Restart web server
   - Check Laravel logs di storage/logs/laravel.log untuk error details
