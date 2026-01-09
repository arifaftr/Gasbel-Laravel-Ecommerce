<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile | Gassbel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    :root {
      --primary: #0f766e;
      --primary-dark: #115e59;
      --accent: #34d399;
      --bg-light: #f8fafc;
      --text-muted: #64748b;
      --border: #e2e8f0;
    }

    body {
      background: var(--bg-light);
      font-family: 'Segoe UI', sans-serif;
    }

    .profile-card {
      border: none;
      border-radius: 1.25rem;
      box-shadow: 0 25px 50px rgba(15,118,110,0.15);
      overflow: hidden;
    }

    .profile-header {
      background: linear-gradient(135deg, #0f766e, #14b8a6, #34d399);
      color: white;
      padding: 2rem;
      text-align: center;
    }

    .profile-avatar {
      width: 96px;
      height: 96px;
      border-radius: 50%;
      background: rgba(255,255,255,0.25);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.5rem;
      font-weight: 600;
      margin: 0 auto 1rem;
    }

    .profile-body p {
      font-size: 1rem;
      margin-bottom: .75rem;
    }

    .profile-body span {
      color: var(--text-muted);
    }

    .profile-footer {
      background: #ffffff;
      border-top: 1px solid var(--border);
      padding: 1.25rem;
      display: flex;
      justify-content: space-between;
      gap: .75rem;
    }

    .btn-primary {
      background: var(--primary);
      border: none;
      border-radius: .75rem;
      padding: .5rem 1.25rem;
    }

    .btn-primary:hover {
      background: var(--primary-dark);
    }

    .btn-secondary {
      border-radius: .75rem;
    }

    .role-badge {
      background: var(--accent);
      color: #064e3b;
      font-size: .75rem;
      padding: .3rem .6rem;
      border-radius: 999px;
      font-weight: 600;
      margin-left: .5rem;
    }
  </style>
</head>

<body>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">

      <div class="card profile-card">
        <div class="profile-header">
          <div class="profile-avatar">
            {{ strtoupper(substr($user->name, 0, 1)) }}
          </div>
          <h4 class="mb-0">{{ $user->name }}</h4>
          <small>{{ $user->email }}</small>
        </div>

        <div class="card-body profile-body">
          <p><strong>Name</strong><br><span>{{ $user->name }}</span></p>
          <p><strong>Email</strong><br><span>{{ $user->email }}</span></p>
          <p>
            <strong>Role</strong><br>
            <span>
              {{ $user->is_admin ? 'Admin' : 'Customer' }}
              <span class="role-badge">
                {{ $user->is_admin ? 'ADMIN' : 'USER' }}
              </span>
            </span>
          </p>
        </div>

        <div class="profile-footer">
          <a href="{{ url('/') }}" class="btn btn-secondary w-100">Back to Store</a>
          @if($user->is_admin)
            <a href="{{ url('/admin') }}" class="btn btn-primary w-100">Go to Admin</a>
          @endif
        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
