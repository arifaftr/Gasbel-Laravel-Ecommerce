<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Gassbel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background:#f8fafc; font-family:'Segoe UI', sans-serif }
        .auth-card { max-width:720px; margin:4rem auto; display:flex; gap:1.5rem }
        .auth-left { flex:1; background:linear-gradient(135deg,#0f766e,#14b8a6); color:#fff; padding:2rem; border-radius:12px }
        .auth-right { flex:1; background:#fff; padding:2rem; border-radius:12px; box-shadow:0 12px 30px rgba(15,118,110,0.08) }

        .btn-register {
            border-radius: .75rem;
            padding: .65rem;
            font-weight: 600;
            background-color: #0f766e;
            border: none;
            color: white;
            transition: all .3s ease;
        }

        .btn-register:hover {
            background-color: #0f766e;
            box-shadow: 0 10px 25px rgba(15,118,110,0.35);
        }
    </style>
</head>
<body>
    <div class="container auth-card">
        <div class="auth-left d-flex flex-column justify-content-center align-items-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/gasbel.png') }}" alt="Gassbel Logo" style="width:260px; margin-bottom:20px;">
            </a>
            <p>Gabung sekarang dan nikmati promo eksklusif, pengiriman cepat, dan layanan terpercaya.</p>
        </div>
        <div class="auth-right">
            <h4 class="mb-3">Buat Akun</h4>

            @if($errors->any())
                <div class="alert alert-danger small">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('register.attempt') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label small">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <button class="btn btn-register w-100">Register</button>
            </form>

            <div class="my-3 text-center">OR</div>
            <div class="d-grid gap-2 mb-3">
                <a href="/auth/google" class="btn btn-outline-secondary">Register with Google</a>
            </div>

            <div class="text-center"><small>Sudah punya akun? <a href="{{ route('login') }}">Login</a></small></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
