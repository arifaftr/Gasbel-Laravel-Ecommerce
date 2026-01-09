<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Gassbel</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    :root {
      --primary: #0f766e;
      --primary-dark: #115e59;
      --bg-light: #f8fafc;
      --text-muted: #64748b;
    }

    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: var(--bg-light);
    }

    .login-wrapper {
      display: flex;
      min-height: 100vh;
    }

    .login-left {
      flex: 1;
      background: linear-gradient(135deg, #0f766e, #14b8a6, #34d399);
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 2rem;
      text-align: center;
    }

    .login-left p {
      font-size: 1.1rem;
      line-height: 1.6;
      opacity: .95;
    }

    .login-right {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #fff;
      padding: 2rem;
    }

    .login-card {
      width: 100%;
      max-width: 400px;
      border-radius: 1.25rem;
      box-shadow: 0 25px 50px rgba(15,118,110,.15);
      padding: 2rem;
    }

    .form-control {
      border-radius: .75rem;
      padding: .75rem 1rem;
    }

    .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 .2rem rgba(15,118,110,.25);
    }

    .btn-login {
      background-color: var(--primary);
      color: white;
      border-radius: .75rem;
      font-weight: 600;
    }

    .btn-login:hover {
      background-color: var(--primary-dark);
      box-shadow: 0 10px 25px rgba(15,118,110,.35);
    }

    .login-footer {
      text-align: center;
      font-size: .85rem;
      color: var(--text-muted);
      margin-top: 1rem;
    }

    @media (max-width: 992px) {
      .login-wrapper {
        flex-direction: column;
      }
      .login-left {
        height: 220px;
      }
    }
  </style>
</head>

<body>
<div class="login-wrapper">

  <!-- LEFT -->
  <div class="login-left">
    <a href="{{ url('/') }}">
      <img src="{{ asset('images/gasbel.png') }}" alt="Gassbel Logo" style="width:350px; margin-bottom:20px;">
    </a>
    <p>Belanja produk berkualitas dengan harga terbaik.<br>Aman, cepat, dan terpercaya.</p>
  </div>

  <!-- RIGHT -->
  <div class="login-right">
    <div class="login-card">

      <h3 class="text-center mb-2">Welcome Back</h3>
      <p class="text-muted text-center mb-4">Masuk untuk melanjutkan belanja</p>

      @if(session('status'))
        <div class="alert alert-success small text-center">{{ session('status') }}</div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger small text-center">
          {{ $errors->first() }}
        </div>
      @endif

      <form method="POST" action="{{ route('login.attempt') }}">
        @csrf

        <div class="mb-3">
          <label class="form-label small">Email</label>
          <input type="email" name="email" value="{{ old('email') }}"
                 class="form-control" placeholder="you@email.com" required autofocus>
        </div>

        <div class="mb-3">
          <label class="form-label small">Password</label>
          <div class="input-group">
            <input id="password" type="password" name="password"
                   class="form-control" placeholder="••••••••" required>

            <button type="button" id="togglePassword"
                    class="input-group-text bg-white"
                    aria-label="Toggle password">
              <!-- eye -->
              <svg id="eye" width="20" height="20" fill="none" viewBox="0 0 24 24"
                   stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5
                     c4.478 0 8.268 2.943 9.542 7
                     -1.274 4.057-5.064 7-9.542 7
                     -4.477 0-8.268-2.943-9.542-7z"/>
              </svg>

              <!-- eye off -->
              <svg id="eyeOff" width="20" height="20" fill="none" viewBox="0 0 24 24"
                   stroke="currentColor" class="d-none">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 3l18 18"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M10.58 10.58A3 3 0 0012 15"/>
              </svg>
            </button>
          </div>
        </div>

        <div class="d-flex justify-content-between mb-4">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label small" for="remember">Remember me</label>
          </div>
          <a href="{{ route('password.request') }}" class="small text-decoration-none">
            Forgot password?
          </a>
        </div>

        <button class="btn btn-login w-100">Login</button>
      </form>

      <div class="my-3 text-center small text-muted">OR</div>

      <a href="/auth/google" class="btn btn-outline-secondary w-100 mb-2">
        Login with Google
      </a>

      <div class="text-center mb-2">
          <small class="text-muted">Don't have an account? <a href="{{ route('register') }}">Register</a></small>
        </div>

      <div class="login-footer">
        &copy; {{ date('Y') }} Gassbel
      </div>

    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.getElementById('togglePassword');
  const input  = document.getElementById('password');
  const eye    = document.getElementById('eye');
  const eyeOff = document.getElementById('eyeOff');

  toggle.addEventListener('click', () => {
    const show = input.type === 'password';
    input.type = show ? 'text' : 'password';
    eye.classList.toggle('d-none', show);
    eyeOff.classList.toggle('d-none', !show);
  });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
