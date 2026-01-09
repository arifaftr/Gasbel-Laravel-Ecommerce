.env.example content for Midtrans configuration:

MIDTRANS_IS_PRODUCTION=false
MIDTRANS_SERVER_KEY=your_midtrans_server_key_here
MIDTRANS_CLIENT_KEY=your_midtrans_client_key_here

Steps to get Midtrans credentials:
1. Go to https://dashboard.sandbox.midtrans.com (for testing/sandbox)
2. Register or login with your account
3. Go to Settings > Access Keys
4. Copy the Server Key and Client Key
5. Add them to your .env file

Installation steps:
1. composer require midtrans/midtrans-php
2. Add the credentials to .env
3. Run: php artisan migrate (if not done yet)
4. Test the payment flow at http://your-app.test/checkout
